<?php

namespace Classes;

use \InvalidArgumentException as InvalidArgumentException;

class Money
{
    private int | float $amount;
    private Currency $currency;

    public function __construct(Currency $currency, float$amount)
    {
        $this->setAmountCurrency($currency, $amount);
    }

    public function setAmountCurrency(Currency $currency, float$amount)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmountCurrency()
    {
        return [$this->amount, $this->currency];
    }

    public function equals($obj)
    {
        if (($obj->currency == $this->currency) && ($obj->amount == $this->amount))
        {
            return true;
        } else{
            return false;
        }
    }

    public function add($obj)
    {
        if ($obj->currency == $this->currency) {
            $this->setAmountCurrency($this->currency, $this->amount + $obj->amount);
            return true;
        } else {
            throw new InvalidArgumentException("The currency is different and can't be added" . "<br>");
        }
    }
}

