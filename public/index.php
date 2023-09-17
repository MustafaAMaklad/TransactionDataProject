<?php

declare(strict_types = 1);  

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
define('UTILITIES_PATH', $root . 'utilities' . DIRECTORY_SEPARATOR);

require APP_PATH . 'app.php';
$files = getTransactionFiles(FILES_PATH);
$transactions = getTransactions($files);
// echo var_dump($transactions);

require UTILITIES_PATH . 'extract_transaction_attribute.php';
$amountAttribute = array_keys($transactions[0])[3];
$transactionsAmounts = extractTransactionAttributeValues($transactions, $amountAttribute);

require UTILITIES_PATH . 'parse_amount.php';
$amount = getParsedTransactionAmounts($transactionsAmounts);

require UTILITIES_PATH . 'calculate_totals.php';
$totalIncome = getTotalIncome($amount);
$totalExpense = getTotalExpense($amount);
$netTotal= getNetTotal($totalIncome, $totalExpense);

require UTILITIES_PATH . 'format_date.php';
require UTILITIES_PATH . 'format_amount.php';
require VIEWS_PATH . 'transactions.php';