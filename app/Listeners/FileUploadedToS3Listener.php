<?php

namespace App\Listeners;

use App\Events\FileUploadedToS3;
use Illuminate\Contracts\Queue\ShouldQueue;

class FileUploadedToS3Listener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  FileUploadedToS3  $event
     * @return void
     */
    public function handle(FileUploadedToS3 $event)
    {
        // Registre as informações do arquivo em um sistema de log
        \Log::info("Arquivo enviado para o S3: {$event->filePath}, Tamanho: {$event->fileSize} bytes");
    }
}
