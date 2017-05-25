<?php

namespace OwenMelbz\HttpsEnforcement;

class EnforcementAgency {

    private function __construct()
    {
        // Please initialise via openForBusiness.
    }

    public static function openForBusiness()
    {
        return new static(new EnforcementAgency);
    }

    public function isRequestSecured()
    {

    }

    public function isEnabled()
    {

    }

    public function shouldRedirect()
    {

    }
}
