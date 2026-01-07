<?='<?php'?>


namespace Processors;

use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;

class {{ $className }} implements ItemProcessorInterface
{
    use Configurable;

    /**
     * Process the scraped item.
     */
    public function processItem(ItemInterface $item): ItemInterface
    {
        // TODO: Process, validate, or transform the item
        
        return $item;
    }
}
