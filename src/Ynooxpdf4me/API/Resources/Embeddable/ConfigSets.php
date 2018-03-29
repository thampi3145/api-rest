<?php

namespace Ynooxpdf4me\API\Resources\Embeddable;

use Ynooxpdf4me\API\Traits\Resource\Create;
use Ynooxpdf4me\API\Traits\Resource\Update;

/**
 * Class ConfigSets
 * Requires web_widget:write scoped oauth token
 */
class ConfigSets extends ResourceAbstract
{
    use Create;
    use Update;

    /**
     * {@inheritdoc}
     */
    protected $objectName = 'config_set';

    /**
     * {@inheritdoc}
     */
    protected $objectNamePlural = 'config_sets';
}
