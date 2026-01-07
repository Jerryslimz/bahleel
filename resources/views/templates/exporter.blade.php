<?='<?php'?>


namespace Exporters;

use App\Exporters\ExporterInterface;
use Illuminate\Support\Collection;

class {{ $className }} implements ExporterInterface
{
    /**
     * Export data to the specified format.
     */
    public function export(Collection $data, string $outputPath): bool
    {
        // TODO: Implement export logic
        
        return true;
    }

    /**
     * Get the file extension for this exporter.
     */
    public function getExtension(): string
    {
        return '{{ $extension ?? 'txt' }}';
    }
}
