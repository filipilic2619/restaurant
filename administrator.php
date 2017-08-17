<?php
session_start();
if(isset($_SESSION["admin"]))
{
    header('Location: admin.php');
}

?>

<html>
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <title>Administrator prijava</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.2.8/interact.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery.datetimepicker.full.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style1.css">
    <script src="js/login.js"></script>
    <link rel="STYLESHEET" type="text/css" href="css/pwdwidget.css" />
    <script src="js/pwdwidget.js" type="text/javascript"></script>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</head>
<body style="overflow: hidden">
<div id="providnaslikaadmin"></div>
<div id="loginfadmin">
    <img src="images/kapa.png" id="naslovprijava">
    <div id="forma">

        <label for="username">Korisničko ime:</label>
        <input type="text" id="username">
        <label for="password">Lozinka:</label>
        <input type="password" id="password">
        <h6 id="neispravni">Neispravni podaci</h6>
        <button class="readmore" id="prijava12">Prijavi se</button>

    </div>

</div>
</body>

<script>

    $("#prijava12").click(function() {
        $.ajax({
            type: 'POST',
            url: 'adminlogin.php',
            data: {username: $("#username").val(), password: $("#password").val()},
            success: function (data) {
                if (data==0)
                {
                    $("#neispravni").fadeIn( 500, function() {});
                } else {
                    location.reload();
                }
            }


        });
    });


</script>
</html>
