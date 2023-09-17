<?php

declare(strict_types=1);

function parseTransactionAmount(string $strAmount): float {
  $amount = (float) str_replace(['$', ','], ['', ''], $strAmount);
  return $amount;
}

function getParsedTransactionAmounts(array $amounts): array {
  $parsedAmounts = [];

  foreach ($amounts as $amount) {
    array_push($parsedAmounts, parseTransactionAmount($amount));
  }
  return $parsedAmounts;
}