<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileUploadedToS3
{
    use Dispatchable, SerializesModels;

    public $filePath;
    public $fileSize;
    /**
     * Create a new event instance.
     */
    public function __construct($filePath, $fileSize)
    {
        $this->filePath = $filePath;
        $this->fileSize = $fileSize;
    }
  
}
