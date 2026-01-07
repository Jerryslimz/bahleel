<?php

namespace App\Exporters;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class CsvExporter implements ExporterInterface
{
    /**
     * Export data to CSV format.
     */
    public function export(Collection $data, string $outputPath): bool
    {
        if ($data->isEmpty()) {
            return false;
        }

        $handle = fopen($outputPath, 'w');

        if ($handle === false) {
            return false;
        }

        // Write headers from first item
        $firstItem = $data->first();
        $headers = array_keys($firstItem);
        fputcsv($handle, $headers);

        // Write data rows
        foreach ($data as $item) {
            fputcsv($handle, array_values($item));
        }

        fclose($handle);

        return true;
    }

    /**
     * Get file extension.
     */
    public function getExtension(): string
    {
        return 'csv';
    }
}
