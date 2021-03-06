<?php

namespace Ynooxpdf4me\API\Traits\Resource;

/**
 * Trait ResourceName
 **/

trait ResourceName
{
    /**
     * Appends the prefix to resource names
     * @return string
     */
    protected function getResourceNameFromClass()
    {
        $resourceName = parent::getResourceNameFromClass();

        return $this->prefix . $resourceName;
    }
}
