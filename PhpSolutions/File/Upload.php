<?php 

namespace PhpSolutions\File;

class Upload
{
    /**
     * Destination of the folder to upload to
     * @var string
     */
    protected $destination;

    /**
     * Maximum file size
     * @var integer
     */ 
    protected $max = 5120000;
    
    /**
     * Error Messages
     * @var array
     */
    protected $mesages = [];

    /**
     * Controls whether the MIME type should be checked.
     * @var boolean
     */
    public $typeCheckingOn = true;
    
    /**
     * Array of image MIME types that are allowed
     * @var array
     */
    protected $permitted = [
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/jpg'
    ];

    /**
     * Initializes the object of the class
     * @param string $path path to the destination where the file is being
     * uploaded
     */
    public function __construct($path) 
    {
        // Checkes if the path is a directory and the directory has permissions to write
        if (!is_dir($path) || !is_writable($path)) 
        {
            // Backslash in front indicates that a core PHP command is to be used rather than one defined
            // within the namespace.
            throw new \Exception("$path must be a valid, writable directory.");
        }

        $this->destination = $path;
    }

    /**
     * Takes the first element in the $_FILES array regardless of the name used in the form.
     */
    public function upload() 
    {
        $uploaded = current($_FILES);

        if ($this->checkFile($uploaded))
        {
            $this->moveFile($uploaded);
        }
    }

    /**
     * Checks if the file is Ok and all the rules are being followed
     * @param  string $file
     * @return bool       
     */
    protected function checkFile($file)
    {
        $accept = true;
        
        if ($file['error'] != 0)
        {
            $this->getErrorMessage($file);

            // Stop checking if no file submitted
            if ($file['error'] == 4)
            {
                return false;
            }
            else 
            {
                $accept = false;
            }
        }

        if (!$this->checkSize($file))
        {
            $accept = false;
        }

        if ($this->typeCheckingOn) 
        {    
            if (!$this->checkType($file))
            {
                $accept = false;
            }
        }

        return $accept;
    }

    /**
     * If the file passes the series of tests, the conditional statement in the
     * upload() method passes the file to another internal method called
     * moveFile(), which is basically a wrapper for the move_upload_file()
     * function.
     * @param  [type] $file [description]
     * @return [type]       [description]
     */
    protected function moveFile($file)
    {
        $success = move_uploaded_file($file['tmp_name'], 
            $this->destination . $file['name']);

        if ($success)
        {
            $result = $file['name'] . ' was uploaded successfully';
            $this->messages[] = $result;
        }
        else 
        {
            $this->messages[] = 'Could not upload ' . $file['name'];
        }
    }

    /**
     * Public get method that returns messages array
     * @return array Messages from the upload
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Addes error messages to the messages array that corresponds each error
     * @param  array $file file that is being uploaded
     */
    protected function getErrorMessage($file)
    {
        switch ($file['error']) {
            case 1:
            case 2:
                $this->messages[] = $file['name'] . ' is too big: (max: ' . $this->getMaxSize() . ').';
                break;
            
            case 3:
                $this->messages[] = $file['name'] . ' was only partially uploaded.';
                break;
            case 4:
                $this->messages[] = 'No file submitted';
                break;
            default:
                $this->messages[] = 'Sorry, there was a problem uploading ' . $file['name'];
                break;
        }
    }

    /**
     * Method for changing the maximum permitted size needs to check that the
     * submitted value is a number and assign it to the $max property.
     * @param int $num maximum size
     */
    public function setMaxSize($num)
    {
        if (is_numeric($num) && $num > 0)
        {
            $this->max = (int) $num;
        }
    }

    /**
     * Checks the size of the file and adds appropriet error message to the
     * error message array
     * @param  array $file
     * @return bool       
     */
    protected function checkSize($file) 
    {
        if ($file['error'] == 1 || $file['error'] == 2)
        {
            return false;
        }
        elseif ($file['size'] == 0)
        {
            $this->messages[] = $file['name'] . ' is an empty file';
            return false;
        }
        elseif ($file['size'] > $this->max)
        {
            $this->messages[] = $file['name'] . ' exceeds the maximum 
                size for a file (' . $this->getMaxSize() . ')';
            return false;
        }
        else 
        {
            return true;
        }
    }

    /**
     * Checks if $file MIME type is in permitted array. if it is it returns
     * true, else it returns false
     * @param  array $file
     * @return bool       
     */
    protected function checkType($file)
    {
        if (in_array($file['type'], $this->permitted))
        {
            return true;
        }
        else 
        {
            $this->messages[] = $file['name'] . ' is not permitted type of file.';
            return false;
        }
    }

    /**
     * Changes typeCheckingOn to flase so all types of files can be uploaded
     */
    protected function allowAllTypes() 
    {
        $this->typeCheckingOn = false;
    }

    /**
     * Converts raw number of bytes stored in $max into a friendlier format.
     * @return string int of KB with a 'KB' added in the end
     */
    public function getMaxSize()
    {
        return number_format($this->max/1024, 1) . ' KB';
    }



}