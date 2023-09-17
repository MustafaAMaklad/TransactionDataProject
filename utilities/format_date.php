<?php

declare(strict_types=1);
function formatTransactionDate(string $strDate): string{
  $date = date_create($strDate);
  $fomratedDate = date_format($date, 'M d, Y');
  return $fomratedDate;
}