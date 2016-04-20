<?php

namespace WebservicesNl\Connector\Platform;

/**
 * AbstractConfig.
 *
 * Abstract Platform config object.
 * Holds all data for connecting to any platform exposed through the Webservices API.
 */
abstract class AbstractConfig implements PlatformConfigInterface
{
    const PLATFORM_NAME = 'abstract';

    /**
     * {@inheritdoc}
     */
    public function getClassName($FQCN = false)
    {
        return ($FQCN === false) ?
            basename(str_replace('\\', DIRECTORY_SEPARATOR, get_called_class())) : get_called_class();
    }

    /**
     * {@inheritdoc}
     */
    abstract public function loadFromArray(array $settings = []);

    /**
     * {@inheritdoc}
     */
    public function getPlatformName()
    {
        return static::PLATFORM_NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}
