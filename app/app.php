<?php
// This file includes all business logic code
declare(strict_types=1);

function getTransactionFiles(string $dirPath): array{

  $files = [];

  foreach (scandir($dirPath) as $file) {
    if (is_dir($file)) {
      continue;
    }
    $files[] = $dirPath . $file;
  }

  return $files;
}

function getTransactions(array $files): array {
  $transactionsArr = [];
  foreach ($files as $file) {
    $transactionsArr = array_merge($transactionsArr, getTransactionDataFromFile($file));
  }
  return $transactionsArr;
}

function getTransactionDataFromFile(string $filePath): array{
  if (!file_exists($filePath)){
    echo 'No Available Data';
    return[];
  }

  $data = [];
  $file = fopen($filePath, 'r');

  fgetcsv($file); //skip first line
  
  while (($line = fgetcsv($file)) !== false) {
    array_push($data, getTransactionLine($line));
  }
 
  return $data;
}
function getTransactionLine($line): array {
  return [
    'date' => $line[0],
    'check' =>$line[1],
    'descreption' =>$line[2],
    'amount' => $line[3]
  ];
}