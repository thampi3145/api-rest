<?php

namespace Ynooxpdf4me\API\Resources\Core;

use Ynooxpdf4me\API\Exceptions\MissingParametersException;
use Ynooxpdf4me\API\Exceptions\ResponseException;
use Ynooxpdf4me\API\Http;
use Ynooxpdf4me\API\Resources\ResourceAbstract;
use Ynooxpdf4me\API\Traits\Utility\InstantiatorTrait;

/**
 * The Pdf class exposes key methods for document
 * @method TicketComments comments()
 * @method TicketForms forms()
 * @method Tags tags()
 * @method TicketAudits audits()
 * @method Attachments attachments()
 * @method TicketMetrics metrics()
 */
class Pdf4me extends ResourceAbstract
{
    use InstantiatorTrait;


    /**
     * @var array
     */
    protected $lastAttachments = [];

    

    /**
     * Wrapper for common GET requests
     *
     * @param       $route
     * @param array $params
     *
     * @return \stdClass | null
     * @throws ResponseException
     * @throws \Exception
     */
    private function sendGetRequest($route, array $params = [])
    {
        $response = Http::send(
            $this->client,
            $this->getRoute($route, $params),
            ['queryParams' => $params]
        );

        return $response;
    }

    /**
     * Declares routes to be used by this resource.
     */
    protected function setUpRoutes()
    {
        parent::setUpRoutes();

        $this->setRoutes([
            'jobConfig'           => 'job/jobConfigs',
            'pdfOptimize'         => 'Pdf/Optimize',
        ]);
    }
    
    /**
     * To get pdfoptimizater
     */
    public function pdfOptimize(array $params)
    {
        $route = $this->getRoute(__FUNCTION__, $params);
        return $this->client->post(
            $route,
            $params
        );
    }
    
    /**
     * To get jobconfig parameter
     */
    public function jobConfig()
    {
        $response = $this->client->get($this->getRoute(__FUNCTION__));
        return $response;
    }

}
