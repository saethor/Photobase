<?php

namespace PhpSolutions\Image;

use PhpSolutions\File\Upload;
use PhpSolutions\Database\DatabaseManager;

require_once __DIR__ . '/../Database/DatabaseManager.php';
require_once __DIR__ . '/../File/Upload.php';
require_once 'Thumbnail.php';

/**
 * Class that creates thumbnail while uploading
 */
Class ThumbnailUpload extends Upload
{   
    /**
     * Destination of the thumbnail
     * @var string
     */
    protected $thumbDestination;
    
    /**
     * If original image is suposed to be deleted after the thumbnail has been
     * generated
     * @var bool
     */
    protected $deleteOriginal;
    
    /**
     * Preferd suffix.
     * @var string
     */
    protected $suffix = '_thb';

    /**
     * Array containing all of the uploaded images
     * @var [type]
     */
    protected $uploadedImages = [];

    /**
     * Constructor for the object that inizializes the variables above
     * @param  string  $path           Sets the parent class constructor
     * @param  boolean $deleteOriginal 
     */
    public function __constructor($path, $deleteOriginal = false)
    {
        parent::__constructor($path);
        $this->thumbDestination = $path;
        $this->deleteOriginal = $deleteOriginal;
    }

    /**
     * Sets the destination for the thumbnail. If error its throws a exception!
     * @param string $path String to the thumbnail directory
     */
    public function setThumbDestination($path)
    {
        if (!is_dir($path) || !is_writable($path))
        {
            throw new \Exception("{$path} must be a valid, writable directory.");
        }
        $this->thumbDestination = $path;
    }

    /**
     * Sets the suffix varible for the thumbnail. If nothing is inputed it sets
     * it to a empty string.
     * @param string $suffix Overrides the default suffix
     */
    public function setThumbSuffix($suffix)
    {
        if (preg_match('/\w+/', $suffix))
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
     * Overrides the allowAllTypes from the parents class and disables typeCheckingOn function
     * @param  boolean $suffix  Has to bee, else it throws a strict error
     */
    public function allowAllTypes($suffix = true) 
    {
        $this->typeCheckingOn = true;
    }

    /**
     * Uses the thumbnail class to create a new Thumbnail
     * @param  string $image Path to the uploaded image
     */
    protected function createThumbnail($image)
    {
        $thumb = new Thumbnail($image);
        $thumb->setDestination($this->thumbDestination);
        $thumb->setSuffix($this->suffix);
        $thumb->create();
        $messages = $thumb->getMessages();
        $this->messages = array_merge($this->messages, $messages);
    }

    /**
     * Overrides the movefile method from the parent class. 
     * @param  string $file String to the file that is suposed to be moved
     */
    protected function moveFile($file)
    {
        $filename = isset($this->newName) ? $this->newName : $file['name'];

        $success = move_uploaded_file($file['tmp_name'], 
            $this->destination . $filename);

        if ($success)
        {
            // Add a emssage only if the original image is not deleted
            if (!$this->deleteOriginal)
            {    
                $result = $file['name'] . ' was uploaded successfully';
                if (!is_null($this->newName))
                {
                    $result .= ', and was renamed ' . $this->newName;
                }
                $this->messages[] = $result;
            }
            // Create a thumbnail from the uploaded image
            $this->createThumbnail($this->destination . $filename);

            // Adds the path to the image to the database
            $this->dbmanager = new DatabaseManager('tsuts.tskoli.is','0505943279_picturebase','0505943279','saethor94');
            $this->dbmanager->newImageInfo(null, $this->destination . $filename, null, 1);
            $this->uploadedImages[] = $this->destination . $filename;


            // Delete the uploaded image if required
            if ($this->deleteOriginal)
            {
                unlink($this->destination . $filename);
            }

        }
        else 
        {
            $this->messages[] = 'Could not upload ' . $file['name'];
        }
    }

    public function returnImages()
    {
        return $this->uploadedImages;
    }
}   