<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

  <title>Transactions</title>
</head>

<body>
  <h1 class="text-center">Transaction Data</h1>
  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Date</th>
          <th>Check#</th>
          <th>Description</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <!-- PHP Code -->
        <?php if (!empty($transactions)): ?>
          <?php foreach ($transactions as $transaction): ?>
            <tr>
              <td>
                <?= formatTransactionDate($transaction['date']) ?>
              </td>
              <td>
                <?= $transaction['check'] ?>
              </td>
              <td>
                <?= $transaction['descreption'] ?>
              </td>
              <td>
                <?php if (parseTransactionAmount($transaction['amount']) < 0): ?>
                  <span style="color: red;">
                    <?= $transaction['amount'] ?>
                  </span>
                <?php elseif (parseTransactionAmount($transaction['amount']) > 0): ?>
                  <span style="color: green;">
                    <?= $transaction['amount'] ?>
                  </span>
                <?php else: ?>
                  <?= $transaction['amount'] ?>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        <!-- PHP Code -->
      </tbody>

      <tfoot class="table-borderless">
        <tr class="table-success">
          <td></td>
          <td></td>
          <th>Total Income: </th>
          <td>
            <?= foramtTransactionAmount($totalIncome) ?>
          </td>
        </tr>
        <tr class="table-danger">
          <td></td>
          <td></td>
          <th>Total Income: </th>
          <td>
            <?= foramtTransactionAmount($totalExpense) ?>
          </td>
        </tr>
        <tr class="table-primary">
          <td></td>
          <td></td>
          <th>Net Total: </th>
          <td>
            <?= foramtTransactionAmount($netTotal) ?>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
  <script src="../bootstrap/js/bootstrap.js"></script>
</body>

</html>