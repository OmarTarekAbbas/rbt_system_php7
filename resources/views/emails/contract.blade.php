<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello Sir , </h2>
		<p> The contract are renewed automatic  </p>
		<table width="600" cellpadding="0" cellspacing="1" border="0" bgcolor="#CCCCCC">
        <tr>
            <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="font-weight: bold;color:#000;font-size:18px">
                Contract Name
            </td>
            <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="font-weight: bold;color:#000;font-size:18px">
                Contract start Date
            </td>
            <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="font-weight: bold;color:#000;font-size:18px">
                Contract End Date
            </td>
            <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="font-weight: bold;color:#000;font-size:18px">
                Contract Url
            </td>
        </tr>
        <tr>
            <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
              {{ $contractRenew->contract->contract_code . ' ' . $contractRenew->contract->contract_label }}
            </td>
            <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
              {{ $contractRenew->renew_start_date }}
            </td>
            <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
              {{ $contractRenew->renew_expire_date }}
            </td>
            <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
              {{ $url }}
            </td>
        </tr>
    </table>
		<p> Thank You </p>
    <br />
    <br />
	</body>
</html>
