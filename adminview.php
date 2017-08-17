<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drag Drop Demo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.2.8/interact.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/main.js"></script>

    <style>

    #tabela1 th, td {
       width: 80px;
        text-align: center;

    }

    #tabela1{
        border-collapse:collapse;
    }

    tr  {
        border-bottom: 1px solid white;

    }



        .zeleno {
            background-color: #00806f;
        }

        .crveno {
            background-color: #ff4781;
        }

    </style>
</head>
<body>



<div id="tabela">

</div>


</body>

<script>

    $( document ).ready(function() {
             $.ajax({
                 type: 'POST',
                 url: 'view.php',
                 data: {datum: "2017-08-11"},
                 success: function(data) {

                $("#tabela").html(data);
            }
        });


    });

</script>
</html>