<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello Admin , </h2>
		<p> You have new Revenu mail from  </p>
		<table width="600" cellpadding="0" cellspacing="1" border="0" bgcolor="#CCCCCC">
            <tr>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="font-weight: bold;color:#000;font-size:18px">
                    Contract Name
                </td>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF"  style="font-weight: bold;color:#000;font-size:18px">
                    Year
                </td>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF"  style="font-weight: bold;color:#000;font-size:18px">
                    Month
                </td>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF"  style="font-weight: bold;color:#000;font-size:18px">
                    Amount
                </td>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF"  style="font-weight: bold;color:#000;font-size:18px">
                    Currency
                </td>
            </tr>

            <tr>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
                    {{ $revenu->contract->contract_code . ' ' . $revenu->contract->contract_label }}
                </td>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
                    {{$revenu->year}}
                </td>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
                    {{$revenu->month}}
                </td>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
                    {{$revenu->amount}}
                </td>
                <td width="600" valign="top" align="center" bgcolor="#FFFFFF" style="color:#000;font-size:16px">
                    {{$revenu->currency->title}}
                </td>
            </tr>
        </table>
		<p> Thank You </p><br /><br />

	</body>
</html>
