<?php

namespace PhpSolutions\Image;

use PhpSolutions\File\Upload;

require_once __DIR__ . '/../File/Upload.php';
require_once 'Thumbnail.php';

Class ThumbnailUpload extends Upload
{
    protected $thumbDestination;
    protected $deleteOriginal;
    protected $suffix = '_thb';

    public function __constructor($path, $deleteOriginal = false)
    {
        parent::__constructor($path);
        $this->thumbDestination = $path;
        $this->deleteOriginal = $deleteOriginal;
    }
}