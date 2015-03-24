<?php 

namespace PhpSolutions\Image;

class Thumbnail 
{
    /**
     * Orginal image
     * @var image
     */
    protected $original;
    
    /**
     * Original image width
     * @var double
     */ 
    protected $originalWidth;
    
    /**
     * Original image height;
     * @var double
     */
    protected $originalHeight;
    
    /**
     * Name of the image with out extension
     * @var string
     */
    protected $basename;
    
    /**
     * Width of the thumbnail
     * @var double
     */
    protected $thumbWidth;
    
    /**
     * Height of the thumbnail
     * @var double
     */
    protected $thumbHeight;
    
    /**
     * Max size of the thumbnail, default 120px
     * @var integer
     */
    protected $maxSize = 120;
    
    /**
     * Contains result form error check
     * @var boolean
     */
    protected $canProcess = false;
    
    /**
     * MIME type of the image
     * @var string
     */
    protected $imageType;
    
    /**
     * Where thumbnail is being saved
     * @var string
     */
    protected $destination;
    
    /**
     * Suffix that is being appended to the image name
     * @var string
     */
    protected $suffix = '_thb';
    
    /**
     * Messaes form proccessing the image
     * @var array
     */
    protected $messages = [];

    /**
     * Constructor for the object. Checks if the image is a file and is
     * readable. Initializes then the variables defined above
     * @param string $image String to the image location.
     */ 
    public function __construct($image)
    {
        if (is_file($image) && is_readable($image))
        {
            $details = getimagesize($image);
        }
        else 
        {
            $details = null;
            $this->messages[] = "Cannot open {$image}.";
        }

        // If getimagesize() returns an array,  it looks lika an image
        if (is_array($details)) 
        {
            $this->original = $image;
            $this->originalWidth = $details[0];
            $this->originalHeight = $details[1];
            $this->basename = pathinfo($image, PATHINFO_FILENAME);

            // check the MIME type
            $this->checkType($details['mime']);           
        }
        else
        {
            $this->messages[] = "{$image} doesn't appear to be an image";
        }
    }

    /**
     * Sets the destination where the thumbnail is suposed to be saved
     * @param string $destination String to the folder where thumbnail is being
     * saved
     */
    public function setDestination($destination)
    {
        if (is_dir($destination) && is_writable($destination))
        {
            // Get last character
            $last = substr($destination, -1);

            // add a trail slash if missing
            if ($last == '/' || $last == '\\')
            {
                $this->destination = $destination;
            }
            else 
            {
                $this->destination = $destination . DIRECTORY_SEPARATOR;
            }
        }
        else 
        {
            $this->messages[] = "Cannot write to {$destination}.";
        }
    }

    /**
     * Sets the max size for the thumbnail
     * @param int $size Integer for the max size of the image
     */
    public function setMaxSize($size) 
    {
        if (is_numeric($size))
        {
            $this->maxSize = abs($size);
        }
    }

    /**
     * Sets the suffix for thumbnail. Default suffix is _thb. Starts by checking
     * if there is any input. if there is checks if there is a underscore befor
     * the suffix. if not it adds it. if there is not input it sets the suffix
     * to a empty string
     * @param string $suffix 
     */
    public function setSuffix($suffix)
    {
        if (preg_match('/^\w+$/', $suffix))
        {
            if (strpos($suffix, '_') !== 0)
            {
                $this->suffix = '_' . $suffix;
            }
            else 
            {
                $this->suffix = $suffix;
            }
        }
        else 
        {
            $this->suffix = '';
        }
    }

    /**
     * Runs every function that needs to be runed so the thumbnails is created
     */
    public function create()
    {
        if ($this->canProcess && $this->originalWidth != 0)
        {
            $this->calculateSize($this->originalWidth, $this->originalHeight);
            $this->createThumbnail();
        }
        elseif ($this->originalWidth == 0) 
        {
            $this->messages[] = 'Cannot determine size of ' . $this->original;
        }
    }

    /**
     * Tests the class if everything is OK.
     */
    // public function test()
    // {
    //     echo 'File: ' . $this->original . '<br/>';
    //     echo 'Original width: ' . $this->originalWidth . '<br>';
    //     echo 'Original height: ' . $this->originalHeight . '<br>';
    //     echo 'Base name :' . $this->basename . '<br>';
    //     echo 'Image Type: ' . $this->imageType . '<br>';
    //     echo 'Destination: ' . $this->destination . '<br>';
    //     echo 'Max size: ' . $this->maxSize . '<br>';
    //     echo 'Suffix: ' . $this->suffix . '<br>';
    //     echo 'Thumb width: ' . $this->thumbWidth . '<br>';
    //     echo 'Thumb height ' . $this->thumbHeight . '<br>';

    //     if ($this->messages)
    //     {
    //         print_r($this->messages);
    //     }
    // }
    
    /**
     * Returns the messages generated throught the class
     * @return array Array of messages
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Checks the MIME type of the image and compares them through the allowed
     * mimes
     * @param  string $mime
     */
    protected function checkType($mime) 
    {
        $mimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($mime, $mimeTypes))
        {
            $this->canProcess = true;

            // Extract the characters after 'image/'
            $this->imageType = substr($mime, 6);
        }
    }

    /**
     * Calculates the size of the thumbnail based of original image ratio
     * @param  int  $width  With of the original image
     * @param  int  $height Heigh of the original image
     */
    protected function calculateSize($width, $height)
    {
        if ($width <= $this->maxSize && $height <= $this->maxSize)
        {
            $ratio = 1;
        }
        elseif ($width > $height)
        {
            $ratio = $this->maxSize/$width;
        }
        else
        {
            $ratio = $this->maxSize/$height;
        }

        $this->thumbWidth = round($width * $ratio);
        $this->thumbHeight = round($height * $ratio);
    }

    /**
     * Creates the neccesary resource for the thumbnail
     * @return [type] [description]
     */
    protected function createImageResource() 
    {
        if ($this->imageType == 'jpeg')
        {
            return imagecreatefromjpeg($this->original);
        }
        elseif ($this->imageType == 'png')
        {
            return imagecreatefrompng($this->original);
        }
        elseif ($this->imageType == 'gif')
        {
            return imagecreatefromgif($this->original);
        }
    }

    /**
     * Runs the right function to create the thumbnail, sets the quality for the
     * thumbnail and frees up the memory from the image resource
     */
    protected function createThumbnail()
    {
        $resource = $this->createImageResource();
        $thumb = imagecreatetruecolor($this->thumbWidth, $this->thumbHeight);
        imagecopyresampled($thumb, $resource, 0, 0, 0, 0, $this->thumbWidth, 
            $this->thumbHeight, $this->originalWidth, $this->originalHeight);
        $newname = $this->basename . $this->suffix;

        if ($this->imageType == 'jpeg')
        {
            $newname .= '.jpeg';
            $success = imagejpeg($thumb, $this->destination . $newname, 100);
        }
        elseif ($this->imageType == 'png')
        {
            $newname .= '.png';
            $success = imagepng($thumb, $this->destination . $newname, 0);
        }
        elseif ($this->imageType == 'gif')
        {
            $newname .= '.gif';
            $success = imagegif($thumb, $this->destination . $newname);
        }

        if ($success)
        {
            $this->messages[] = "{$newname} created successfully.";
        }
        else 
        {
            $this->messages[] = "Couldn't create a thumbnail for " . 
                basename($this->original);
        }

        imagedestroy($resource);
        imagedestroy($thumb);
    }
}