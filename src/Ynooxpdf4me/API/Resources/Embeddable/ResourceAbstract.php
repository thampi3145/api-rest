<?php

namespace Ynooxpdf4me\API\Resources\Embeddable;

use Ynooxpdf4me\API\Traits\Resource\ResourceName;

/**
 * Abstract class for Embeddable resources
 */
abstract class ResourceAbstract extends \Ynooxpdf4me\API\Resources\ResourceAbstract
{
    use ResourceName;

    /**
     * @var string
     **/
    protected $prefix = 'embeddable/api/';

    /**
     * @var string
     */
    protected $apiBasePath = '';
}
