<?php

namespace Ynooxpdf4me\API\Resources;

use Ynooxpdf4me\API\HttpClient;
use Ynooxpdf4me\API\Resources\Embeddable\ConfigSets;
use Ynooxpdf4me\API\Traits\Utility\ChainedParametersTrait;
use Ynooxpdf4me\API\Traits\Utility\InstantiatorTrait;

/**
 * This class serves as a container to allow $this->client->embeddable
 *
 * @method ConfigSets configSets()
 */
class Embeddable
{
    use ChainedParametersTrait;
    use InstantiatorTrait;

    public $client;

    /**
     * Sets the client to be used
     *
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public static function getValidSubResources()
    {
        return [
            'configSets' => ConfigSets::class,
        ];
    }
}
