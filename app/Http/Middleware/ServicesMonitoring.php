<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ServicesMonitoring
{
    public function handle(Request $request): Request
    {       
        if($this->isRequestMonitored($request)){
           $this->logExternalRequest($request);
        }
        return $request;
    }

    private function isRequestMonitored(Request $request)
    {
        $host = $request->getUri()->getHost();
        return strpos($host, 'google.com') !== false;
    }

    protected function logExternalRequest($request)
    {
        Log::info('Teste3', [
            'method' => $request->getMethod(),
            'url' => $request->getUri()->getHost(),
            'headers'=> $request->getHeaders(),
        ]);
    }
}
