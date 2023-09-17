<?php

declare(strict_types=1);


function getTotalIncome(array $amounts): float {
  $income = 0;
  foreach ($amounts as $amount) {
    if ($amount > 0) {
      $income += $amount;
    }
  }
  return $income;
}

function getTotalExpense(array $amounts): float {
  $expense = 0;
  foreach ($amounts as $amount) {
    if ($amount < 0) {
      $expense += $amount;
    }
  }
  return $expense;
}

function getNetTotal(float $income, float $expense): float {
  $net = $income + $expense;
  return $net;
}