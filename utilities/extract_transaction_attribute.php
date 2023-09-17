<?php

declare(strict_types=1);

function extractTransactionAttributeValues(array $transactionArray, string $attributeName) :array{
  $amountArray = [];
  foreach ($transactionArray as $transaction) {
    array_push($amountArray, $transaction[$attributeName]);
  }
  return $amountArray;
}