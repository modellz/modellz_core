<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Mailer</title>

</head>

<body style="max-width:650px; margin:5%; border-bottom:5px solid #EC027B; border-radius:3px; -moz-box-shadow: 3.5px 6.062px 7px 0px rgba(14, 15, 15, 0.14); -webkit-box-shadow: 3.5px 6.062px 7px 0px rgba(14, 15, 15, 0.14); box-shadow: 3.5px 6.062px 7px 0px rgba(14, 15, 15, 0.14);">
<div style="font-family: 'Poppins', sans-serif; font-size:14px; background-color:#F0F0F0; padding:50px;">

    <div style="text-align:center;"><img src="http://modellz.com/images/modellz-logo.png" id="newlogo_white" width="300px" alt="Modellz"> </div>
    <div style="color:#444444; margin-top:2%;"> Dear {{ $name }},</div>
    <div style="color:#444444; margin-top:2%;">Please click below link for your account activation or copy the below link and paste in  browser</div><br />
    <div style="padding:20px 0px 20px 0px;">
        <button type="button" style="background-color:#EC027B;padding: 20px; border:0px; border-radius:5px; margin-left:auto;margin-right:auto;display:block; font-size:18px;">
            <a href="{{ 'http://192.168.1.9/public/register/api/'.$name.'/'.$token}}" >Activate Me</a>
        </button>
    </div><br />
    <div style="color:#EC027B;">Link : <a href="{{ 'http://192.168.1.9/public/register/api/'.$name.'/'.$token }}">{{'http://192.168.1.9/public/register/api/'.$name.'/'.$token}}</a></div><br />
    <div style="color:#EC027B;">Email : {{ $email }}</div><br />
    <div style="color:#EC027B;">Phone: {{ $phone }}</div><br />
    <hr>
    <div style="color:#444444; text-align: center; text-decoration:none;"> Any help : <a href="mailto:support@modellz.com">support@modellz.com</a>  |  Call to : +91 79000 83000</div>
</div>

</body>
</html>