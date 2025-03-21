<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{ config('app.name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">

{{ $head ?? '' }}
</head>
<body style="margin: 0; padding: 0;">

<table role="presentation" width="100%" cellspacing="0" cellpadding="0"
        style="background-color: #051F31; padding: 40px 0;">
<tr>
<td align="center">
<table role="presentation" width="600" cellspacing="0" cellpadding="0" align="center"
                    style="background-color: white; margin: 0 auto; position: relative;">
{{ $header ?? '' }}

<!-- Email Body -->
<tr>
<td  width="100%" cellpadding="0" cellspacing="0" >
<table cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
</td>
</tr>
</table>
</td>
</tr>

{{ $footer ?? '' }}
</table>
</td>
</tr>
</table>
</body>
</html>
