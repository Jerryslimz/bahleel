<?='<?php'?>


namespace Spiders;

use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;

class {{ $className }} extends BasicSpider
{
    /**
     * Starting URLs for the spider.
     * 
     * @var array<string>
     */
    public array $startUrls = [
@foreach($startUrls as $url)
        '{{ $url }}',
@endforeach
    ];

@if(!empty($downloaderMiddleware))
    /**
     * Downloader middleware for this spider.
     * 
     * @var array
     */
    public array $downloaderMiddleware = [
@foreach($downloaderMiddleware as $middleware)
        {{ $middleware }},
@endforeach
    ];

@endif
@if(!empty($itemProcessors))
    /**
     * Item processors for this spider.
     * 
     * @var array
     */
    public array $itemProcessors = [
@foreach($itemProcessors as $processor)
        {{ $processor }},
@endforeach
    ];

@endif
@if(isset($concurrency))
    /**
     * Number of concurrent requests.
     */
    public int $concurrency = {{ $concurrency }};

@endif
@if(isset($requestDelay))
    /**
     * Delay between requests (in seconds).
     */
    public int $requestDelay = {{ $requestDelay }};

@endif
    /**
     * Parse the response and extract data.
     */
    public function parse(Response $response): \Generator
    {
@if(!empty($fields))
@foreach($fields as $field => $selector)
        ${{ $field }} = $response->filter('{{ $selector }}')->text();
@endforeach

        yield $this->item([
@foreach($fields as $field => $selector)
            '{{ $field }}' => ${{ $field }},
@endforeach
        ]);
@else
        // TODO: Extract data from response
        $title = $response->filter('h1')->text();

        yield $this->item([
            'title' => $title,
            'url' => $response->getRequest()->getUri(),
        ]);
@endif
    }
}
