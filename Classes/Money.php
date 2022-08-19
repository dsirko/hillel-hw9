<?php

namespace Classes;

use \InvalidArgumentException as InvalidArgumentException;

class Money
{
    private int | float $amount;
    private Currency $currency;

    public function __construct(Currency $currency, float $amount)
    {
        $this->currency = $currency;
        $this->setAmount($amount);
    }

    public function setAmount(float $amount)
    {
        $this->amount = $amount;
    }

    public function getAmountCurrency()
    {
        return [$this->amount, $this->currency];
    }

    public function equals(Currency $obj) :bool
    {
        return ($obj->currency == $this->currency) && ($obj->amount == $this->amount);
    }

    public function add($obj) :bool
    {
        if ($obj->currency == $this->currency) {
            $this->setAmountCurrency($this->currency, $this->amount + $obj->amount);
            return true;
        } else {
            throw new InvalidArgumentException("The currency is different and can't be added" . "<br>");
        }
    }
}
