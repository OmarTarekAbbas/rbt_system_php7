<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
</head>
<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>

<body>
  <p><strong>Dears,</strong> <br>contract are renewed automatic</p>
  <table cellpadding="10">
    <thead>
      <tr>
        <th>Contract Name</th>
        <th>Contract start Date</th>
        <th>Contract end Date</th>
        <th>Contract Url</th>
      </tr>
    </thead>
    <tr>
      <td>{{ $contractRenew->contract->contract_code . ' ' . $contractRenew->contract->contract_label }}</td>
      <td>{{ $contractRenew->renew_start_date }}</td>
      <td>{{ $contractRenew->renew_expire_date }}</td>
      <td>{{ $url }}</td>
    </tr>
  </table>

</body>

</html>
