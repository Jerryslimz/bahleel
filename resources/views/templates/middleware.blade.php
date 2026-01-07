<?='<?php'?>


namespace Middlewares;

@if($type === 'request')
use RoachPHP\Downloader\Middleware\RequestMiddlewareInterface;
use RoachPHP\Http\Request;
@else
use RoachPHP\Downloader\Middleware\ResponseMiddlewareInterface;
use RoachPHP\Http\Response;
@endif
use RoachPHP\Support\Configurable;

class {{ $className }} implements {{ $type === 'request' ? 'RequestMiddlewareInterface' : 'ResponseMiddlewareInterface' }}
{
    use Configurable;

@if($type === 'request')
    /**
     * Handle the outgoing request.
     */
    public function handleRequest(Request $request): Request
    {
        // TODO: Modify request before it's sent
        
        return $request;
    }
@else
    /**
     * Handle the incoming response.
     */
    public function handleResponse(Response $response): Response
    {
        // TODO: Process response after it's received
        
        return $response;
    }
@endif
}
