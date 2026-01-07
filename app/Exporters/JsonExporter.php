<?php

namespace App\Exporters;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class JsonExporter implements ExporterInterface
{
    /**
     * Export data to JSON format.
     */
    public function export(Collection $data, string $outputPath): bool
    {
        $json = $data->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return File::put($outputPath, $json) !== false;
    }

    /**
     * Get file extension.
     */
    public function getExtension(): string
    {
        return 'json';
    }
}
