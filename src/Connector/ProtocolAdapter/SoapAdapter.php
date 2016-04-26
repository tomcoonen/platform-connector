<?php

namespace WebservicesNl\Connector\ProtocolAdapter;

use WebservicesNl\Common\Exception\Server\NoServerAvailableException;
use WebservicesNl\Connector\Client\ClientInterface;
use WebservicesNl\Protocol\Soap\Client\SoapClient;

/**
 * SoapAdapter.
 *
 * Soap protocol adapter for a ConnectorInterface to connect to the Webservices API.
 *
 * @codeCoverageIgnore This is a silly proxy class
 */
class SoapAdapter extends AbstractAdapter
{
    /**
     * {@inheritdoc}
     *
     * @param string $functionName name of the function call
     * @param mixed  $args         arguments for the function call
     *
     * @throws NoServerAvailableException
     * @return mixed
     * @throws \SoapFault
     * @throws \Exception
     */
    public function call($functionName, $args)
    {
        $class = ['\SoapClient', $functionName];
        if (is_callable($class, true) === true) {
            return $this->getClient()->{$functionName}($args);
        }

        return $this->getClient()->__soapCall($functionName, $args);
    }

    /**
     * {@inheritdoc}
     *
     * @return SoapClient|ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }
}