<?php

namespace Alireza5014\Bigbluebutton\Services;

use Alireza5014\Parameters\HooksCreateParameters;
use Alireza5014\Parameters\HooksDestroyParameters;

trait InitHooks
{
    /**
     * @param  array  $parameters
     *
     * require fields
     * callbackURL
     *
     * optional fields
     * meetingID
     * getRaw
     * @return HooksCreateParameters
     */
    public function initHooksCreate(array $parameters)
    {
        $parameters = Fluent($parameters);
        $hooksCreate = new HooksCreateParameters($parameters->get('callbackURL'));
        if ($parameters->meetingID) {
            $hooksCreate->setMeetingId($parameters->meetingID);
        }
        $hooksCreate->setGetRaw($parameters->get('getRaw', false));

        return $hooksCreate;
    }

    /**
     * @param  mixed  $parameters
     * @return HooksDestroyParameters
     */
    public function initHooksDestroy($parameters)
    {
        $hooksID = '';
        if (is_array($parameters)) {
            $hooksID = Fluent($parameters)->get('hooksID');
        } else {
            $hooksID = $parameters;
        }

        return new HooksDestroyParameters($hooksID);
    }
}
