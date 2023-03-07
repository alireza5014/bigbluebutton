<?php

namespace Alireza5014\Bigbluebutton;

use Alireza5014\BigBlueButtonPHP as BigBlueButtonParent;
use Alireza5014\Util\UrlBuilder;
use Illuminate\Support\Str;
use PHPUnit\Framework\MockObject\Api;

class Bigbluebutton extends BigBlueButtonParent
{
    /**
     * Bigbluebutton constructor.
     * Allows to set url and secret as parameter, otherwise use values in env.
     *
     * @param $bbbServerBaseUrl API Base Url
     * @param $securitySecret API Server secret
     */
    public function __construct($bbbServerBaseUrl, $securitySecret)
    {
        $this->bbbServerBaseUrl = Str::finish(trim($bbbServerBaseUrl), '/');
        $this->securitySecret = trim($securitySecret);
        $this->urlBuilder = new UrlBuilder($this->securitySecret, $this->bbbServerBaseUrl);
    }
}
