<?php

namespace Decorator;

$text_object = new PlainText();
$text_object->setText("Decorator Pattern");

$text_object = new DoubleByteText($text_object);
$text_object = new UpperCaseText($text_object);

echo $text_object->getText();