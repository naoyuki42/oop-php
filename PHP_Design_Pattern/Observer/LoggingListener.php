<?php

namespace Observer;

class LoggingListener implements CartListener
{
    public function update(Cart $cart): void
    {
        echo $cart->getItems() . "\n";
    }
}