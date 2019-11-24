<?php
require('Calculator.php');
$calculator = new Calculator();
$sum = $calculator->add('123456789', '987654321');
print_r($sum);