<?php

namespace Classes;

use \InvalidArgumentException as InvalidArgumentException;

class Currency
{
    private string $isoCode;

    protected array $codes = ['EUR', 'USD', 'UAH'];

    public function __construct($isoCode)
    {
          $this->setIsoCode($isoCode);
    }

    private function findIso(string $isoCode) :bool
    {
        return in_array($isoCode, $this->codes);
    }

    public function setIsoCode($isoCode)
    {
        if ($this->findIso($isoCode))
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

    public function equals(Currency $obj) :bool
    {
        return $obj->isoCode == $this->isoCode;
    }
}

