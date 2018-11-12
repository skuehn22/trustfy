<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>trustyfy.com</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;" bgcolor="#ffffff">

<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
    <tr>
        <td style="text-align: center;">
            <br><br>
            <a href="http://www.trustfy.com" style="text-decoration:none;" target="_blank">
                <img src="http://mvp.dev-basti.de/images/trustfy.jpg" width="115" alt="trustfy.com">
            </a>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            Hallo, <br>
            You're getting this e-mail from: {{ $rating->name  }}
            <br><br>
            <p>
                He would be happy if you would leave him a short evaluation of his last work with you.
            </p>
            <a href="http://mvp.dev-basti.de/open-rating?hash={{$rating->session}}">Link to rate</a>

        </td>
    </tr>
</table>

</body>
</html>
