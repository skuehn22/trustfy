<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>trustyfy.com</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        body{
            color:#0f0f0f;
        }

    </style>
</head>

<body style="color: #0f0f0f; text-align: center;  margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;" bgcolor="#fff">
<br><br>
<table align='center' style="color: #0f0f0f; padding:25px; min-width:320px; border-radius: 5px; border: 2px solid #d4d4d4;" width="45%" cellspacing="0" cellpadding="0" bgcolor="#fff">
    <tr>
        <td style="text-align: center;">
            <br><br>
            <a href="http://www.trustfy.io" style="text-decoration:none;" target="_blank">
                <span style="color:#1e8033; font-size:34px; font-weight: 800; ">trustfy.io</span>
            </a>
        </td>
    </tr>
    <tr>
        <td style="text-align: left;">
            <br><br>
            <span style="color: #535353;font-family: Arial, Helvetica, sans-serif;font-size: 14px;">
            Hallo {{$rating->name_client}}, <br> <br>
            You're getting this e-mail from: {{ $rating->name  }}
            <br><br>
            <p>
                We would be happy if you would leave a short evaluation of the last work with you.
            </p>
            <p>
                Message:<br><br>
                {{ $rating->description  }}
            </p>
                <br>
            <a style="color: #1e8033;"  href="http://mvp.dev-basti.de/open-rating?hash={{$rating->session}}">Link to rate</a>
            </span>
        </td>
    </tr>
    <tr>
        <td style="text-align: left;">
            <span style="color: #535353;font-family: Arial, Helvetica, sans-serif;font-size: 14px;">
            <p><br>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </span>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <br><br>
            <span style="color: #9e9e9e;font-family: Arial, Helvetica, sans-serif;font-size: 14px;">
            <p>&copy; <a href="http://www.trustfy.io" style="color: #1e8033; text-decoration: none; ">trustfy.io</a> 2018. All Rights Reserved. <br> <br></p>
            </span>
        </td>
    </tr>
</table>

</body>
</html>
