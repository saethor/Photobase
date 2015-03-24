<?php 

namespace PhpSolutions\Image;

class Thumbnail 
{
    protected $original;
    protected $originalWidth;
    protected $originalHeight;
    protected $basename;
    protected $thumbWidth;
    protected $thumbHeight;
    protected $maxSize = 120;
    protected $canProcess = false;
    protected $imageType;
    protected $destination;
    protected $suffix = '_thb';
    protected $messages = [];

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

    public function setMaxSize($size) 
    {
        if (is_numeric($size))
        {
            $this->maxSize = abs($size);
        }
    }

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
    
    public function getMessages()
    {
        return $this->messages;
    }

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