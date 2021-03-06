<?php

namespace Ynooxpdf4me\API\Exceptions;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;

/**
 * Class ApiResponseException
 *
 * @package Ynooxpdf4me\API\Exceptions
 */
class ApiResponseException extends \Exception
{
    /**
     * @var array
     */
    protected $errorDetails = [];

    public function __construct(RequestException $e)
    {
        $message = $e->getMessage();

        if ($e instanceof ClientException) {
            $response           = $e->getResponse();
            $responseBody       = $response->getBody()->getContents();
            $this->errorDetails = $responseBody;
            $message .= ' [details] ' . $this->errorDetails;
        } elseif ($e instanceof ServerException) {
            $message .= ' [details] Ynooxpdf4me may be experiencing internal issues or undergoing scheduled maintenance.';
        } elseif (! $e->hasResponse()) {
            $request = $e->getRequest();
            // Unsuccessful response, log what we can
            $message .= ' [url] ' . $request->getUri();
            $message .= ' [http method] ' . $request->getMethod();
            $message .= ' [body] ' . $request->getBody()->getContents();
        }

        parent::__construct($message, $e->getCode(), $e);
    }

    /**
     * Returns an array of error fields with descriptions.
     * @return array
     */
    public function getErrorDetails()
    {
        return $this->errorDetails;
    }
}
