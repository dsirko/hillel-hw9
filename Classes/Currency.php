<?php

namespace Classes;

use \InvalidArgumentException as InvalidArgumentException;

class Currency
{
    private string $isoCode;

    public function __construct($isoCode)
    {
          $this->setIsoCode($isoCode);
    }

    private function findIso($isoCode) :bool
    {
        $codes = array('EUR', 'USD', 'UAH');
        foreach ($codes as $code) {
            if ($code == $isoCode) {
                return true;
            }
        }
        return false;
    }

    public function setIsoCode($isoCode)
    {
        if ($this->findIso($isoCode) == 'true')
        {
            $this->isoCode = $isoCode;
        } else {
            throw new InvalidArgumentException("The isoCode doesn't exist" . "<br>");
        }
    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }

    public function equals($obj) :bool
    {
        if ($obj->isoCode == $this->isoCode) {
            return true;
        } else {
            return false;
        }
    }
}

