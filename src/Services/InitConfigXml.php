<?php

namespace Alireza5014\Bigbluebutton\Services;

use Alireza5014\Parameters\SetConfigXMLParameters;

trait InitConfigXml
{
    /**
     * @param  array  $parameters
     *
     * require fields
     * xml
     * meetingID
     * @return SetConfigXMLParameters gXMLParameters
     *
     * @throws \Exception
     */
    public function initSetConfigXml(array $parameters)
    {
        $parameters = Fluent($parameters);
        $configXml = new SetConfigXMLParameters($parameters->get('meetingID'));
        $rawXml = $parameters->xml;
        if (! $parameters->xml instanceof \SimpleXMLElement) {
            try {
                $rawXml = new \SimpleXMLElement($parameters->xml);
            } catch (\Exception $e) {
                throw new \Exception('Could not parse payload as XMl');
            }
        }

        $configXml->setRawXml($rawXml);

        return $configXml;
    }
}
