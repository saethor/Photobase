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
    protected $max = 51200;
    
    /**
     * Error Messages
     * @var array
     */
    protected $mesages = [];
    
    /**
     * Array of image MIME types that are allowed
     * @var array
     */
    protected $permitted = [
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png'
    ];

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
     * Checks if the file is Ok
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

        if (!$this->checkType($file))
        {
            $accept = false;
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



}