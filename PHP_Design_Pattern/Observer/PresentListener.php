<?php

namespace Observer;

class PresentListener implements CartListener
{
    private static const PRESENT_TARGET_ITEM = "30:クッキーセット";
    private static const PRESENT_ITEM = "99:プレゼント";

    public function update(Cart $cart): void
    {
        if ($cart->hasItem(self::PRESENT_TARGET_ITEM && !$cart->hasItem(self::PRESENT_ITEM))) {
            $cart->addItem(self::PRESENT_ITEM);
        }
        if (!$cart->hasItem(self::PRESENT_TARGET_ITEM) && $cart->hasItem(self::PRESENT_ITEM)) {
            $cart->removeItem(self::PRESENT_TARGET_ITEM);
        }
    }
}