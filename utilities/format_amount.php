<?php 

declare(strict_types=1);

function foramtTransactionAmount(float $amount) :string{
  $formattedAmount = '$' . number_format($amount, 2, '.', ',');
  return $formattedAmount;
}