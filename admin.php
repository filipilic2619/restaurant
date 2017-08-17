<?php
session_start();
if(!isset($_SESSION["admin"]))
{
    header('Location: administrator.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <title>Title</title>
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
<body>

<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container-fluid">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">LOGO</a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
            <ul class="nav navbar-nav">

                <li><a id="prijavadugme">Odjava</a></li>

            </ul>

        </div>
    </div>

</nav>







<div class="row">
    <div class="bigtitle" id ="prikaziReza">
        <div class="container">
            <div class="line"></div>
            <h4>Raspored stolova</h4>

        </div>
    </div>
</div>

<div class="row" id="rezza">

    <div class="col-sm-12 sub2 raspored"  >

        <div id="buttons" class="defaultbuttons">

        <div id="btn1" class="buttonsto"><img src="images/2.png" height="50"></div>
        <div id="btn5" class="buttonsto"><img src="images/2r.png" height="50"></div>
        <div id="btn2" class="buttonsto"><img src="images/4.png" height="50"></div>
        <div id="btn3" class="buttonsto"><img src="images/6.png" height="50"></div>
        <div id="btn6" class="buttonsto"><img src="images/6r.png" height="50"></div>
        <div id="btn4" class="buttonsto"><img src="images/8.png" height="50"></div>
        <div id="btn7" class="buttonsto"><img src="images/8r.png" height="50"></div>
        </div>
        <div id="demo" class="defaultbuttons">

        </div>

        <div id="sacuvaj" >Uredi</div>

    </div>

</div>

<div class="row">
    <div class="bigtitle" id ="prikaziReza1">
        <div class="container">
            <div class="line"></div>
            <h4>Prikaz rezervacija</h4>

        </div>
    </div>
</div>

<div class="row" id="rezza1" hidden>

    <div class="col-sm-12 sub2"  >

        <div id="legenda">
            <div id="slobodni" class="legendaelement"><span id="dcolor"></span>Dostupni</div>

            <div id="rezervisani" class="legendaelement"><span id="rcolor"></span>Rezervisani</div>
        </div>
        <div id="demo1">

        </div>
        <div id="kalendaricon">
            <img src="images/calendar.png"  onmouseover="this.src='images/calendar1.png';" onmouseout="this.src='images/calendar.png';" width="25" height="25">
        </div>

        <div id = "overlaydemo" class="overlay">
            <div id="kalendar">
                <h4>Izaberite datum i vreme rezervacije</h4>
                <input type="text" id="datetimepicker3"/>
                <button class="readmore" id="dostupnost">Proveri rezervacije</button>
            </div>

        </div>
        <div id = "overlayrez" class="overlay">
            <div id="rezervacijacomf">
                <h2 id="naslovcomf" class="detaljinaslov"></h2>

                    <label class="labela" for="imeiprezime">Ime i prezime:</label>
                    <input type="text" id="imeiprezime" disabled>
                    <label class="labela" for="emailadresa">E-mail adresa:</label>
                    <input type="text" id="emailadresa" disabled>
                    <label class="labela" for="brojtelefona">Broj telefona:</label>
                    <input type="text" id="brojtelefona" disabled>
                <button class="readmore" id="uredu">U redu</button>

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="bigtitle" id ="prikaziReza2">
        <div class="container">
            <div class="line"></div>
            <h4>Vremenska linija</h4>

        </div>
    </div>
</div>

<div class="row" id="rezza2" hidden>

    <div class="col-sm-12 sub2"  >
        <div id="demo2"></div>

        <div id="kalendaricon1">
            <img src="images/calendar.png"  onmouseover="this.src='images/calendar1.png';" onmouseout="this.src='images/calendar.png';" width="25" height="25">
        </div>

        <div id = "overlaydemo2" class="overlay">
            <div id="kalendar1">
                <h4>Izaberite datum i vreme rezervacije</h4>
                <input type="text" id="datetimepicker4"/>
                <button class="readmore" id="dostupnost1">Proveri rezervacije</button>
            </div>

        </div>

    </div>



</div>


</div>


<a href="#" class="backtotop">Back</a>


</body>

<script>
    var idstola;
    var clglob;
    $("#btn1").click(function() {
        var a;
        if($(".draggable").length==0)
        {
            a=0;
        } else
        {
            a=parseInt($(".draggable").last().attr('id').substring(1))+1;
        }
        console.log(a);
        $("#demo").append("<div class='draggable ' id='s" + a  + "' data-b='2' data-x='0'  data-y='0'><img src='images/2.png' height='70' alt=''></div>")

    });

    $("#btn2").click(function() {
        var a;
        if($(".draggable").length==0)
        {
            a=0;
        } else
        {
            a=parseInt($(".draggable").last().attr('id').substring(1))+1;
        }
        $("#demo").append("<div class='draggable ' id='s" + a  + "' data-b='4' data-x='0'  data-y='0'><img src='images/4.png' height='110' alt=''></div>")
    });

    $("#btn3").click(function() {
        var a;
        if($(".draggable").length==0)
        {
            a=0;
        } else
        {
            a=parseInt($(".draggable").last().attr('id').substring(1))+1;
        }
        $("#demo").append("<div class='draggable ' id='s" + a  + "' data-b='6' data-x='0'  data-y='0'><img src='images/6.png' height='110' alt=''></div>")
    });

    $("#btn4").click(function() {
        var a;
        if($(".draggable").length==0)
        {
            a=0;
        } else
        {
            a=parseInt($(".draggable").last().attr('id').substring(1))+1;
        }
        $("#demo").append("<div class='draggable ' id='s" + a  + "' data-b='8' data-x='0'  data-y='0'><img src='images/8.png' height='90' alt=''></div>")
    });

    $("#btn5").click(function() {
        var a;
        if($(".draggable").length==0)
        {
            a=0;
        } else
        {
            a=parseInt($(".draggable").last().attr('id').substring(1))+1;
        }
        $("#demo").append("<div class='draggable ' id='s" + a  + "' data-b='2r' data-x='0'  data-y='0'><img src='images/2r.png' width='70' alt=''></div>")
    });


    $("#btn6").click(function() {
        var a;
        if($(".draggable").length==0)
        {
            a=0;
        } else
        {
            a=parseInt($(".draggable").last().attr('id').substring(1))+1;
        }
        $("#demo").append("<div class='draggable ' id='s" + a  + "' data-b='6r' data-x='0'  data-y='0'><img src='images/6r.png' width='110 alt=''></div>")
    });

    $("#btn7").click(function() {
        var a;
        if($(".draggable").length==0)
        {
            a=0;
        } else
        {
            a=parseInt($(".draggable").last().attr('id').substring(1))+1;
        }
        $("#demo").append("<div class='draggable ' id='s" + a  + "' data-b='8r' data-x='0'  data-y='0'><img src='images/8r.png' width='90 alt=''></div>")
    });

    $("#sacuvaj").click(function() {

        if ($("#sacuvaj").text()=="Uredi")
        {
            $("#demo").css("pointer-events", "auto");
            $(".buttonsto").css("pointer-events", "auto");
            $("#sacuvaj").html("Sačuvaj");
            $("#demo").toggleClass("raspored1");
            $("#buttons").toggleClass("defaultbuttons");
            $("#demo").toggleClass("defaultbuttons");
        }
        else
        {

            var niz = new Array();
            $('.draggable').each(function() {

                var json1 = new Object();
                json1.id = $(this).attr("id");
                json1.vrsta = $(this).attr("data-b");
                json1.x = $(this).attr("data-x");
                json1.y = $(this).attr("data-y");
                niz.push(json1);
            });

            var jsonNiz = JSON.parse(JSON.stringify(niz));

            $.ajax({
                type: 'POST',
                url: 'raspored.php',
                data: {niz: jsonNiz},
                success: function(data) {

                }
            });
            $("#sacuvaj").html("Uredi");
            $("#demo").css("pointer-events", "none");
            $(".buttonsto").css("pointer-events", "none");
            $("#demo").toggleClass("raspored1");
            $("#buttons").toggleClass("defaultbuttons");
            $("#demo").toggleClass("defaultbuttons");
        }
    });


    $( document ).ready(function() {

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.backtotop').fadeIn();
            } else {
                $('.backtotop').fadeOut();
            }
        });

        $('.backtotop').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        $("#demo").css("pointer-events", "none");
        $(".buttonsto").css("pointer-events", "none");
        var mere = [];
        mere["2"] = "width='113' height='70'";
        mere["4"] = "width='109' height='110'";
        mere["6"] = "width='159' height='110'";
        mere["8"] = "width='157' height='90'";
        mere["2r"] = "width='70' height='117'";
        mere["6r"] = "width='110' height='163'";
        mere["8r"] = "width='90' height='161'";
        $.ajax({
            url: 'ucitajraspored.php',
            success: function(data) {

                var obj = jQuery.parseJSON(data);
                $.each(obj, function(key,value) {

                    $("#demo").append("<div class='draggable ' id='" + value.id  + "' data-b='" + value.vrsta  + "'  data-x='" + value.x  + "' data-y='" + value.y  + "' style='transform: translate(" + value.x + "px, " + value.y + "px)'><img src='images/" + value.vrsta  + ".png' " + mere[value.vrsta] + "></div>")

                });
            }
        });

        $('#datetimepicker3').datetimepicker({
            value:new Date(),

            onshow:ucitaj()

        })

        $('#datetimepicker4').datetimepicker({
            value:new Date(),

            onshow:ucitaj()

        })

        $( "#demo1" ).contextmenu(function(event) {
            event.preventDefault();
            $('#overlaydemo').stop().slideToggle('slow');
        });

        $( "#demo2" ).contextmenu(function(event) {
            event.preventDefault();
            $('#overlaydemo2').stop().slideToggle('slow');
        });


        $( "#overlaydemo" ).contextmenu(function(event) {
            event.preventDefault();
            $('#overlaydemo').stop().slideToggle('slow');
        });

        $( "#overlaydemo2" ).contextmenu(function(event) {
            event.preventDefault();
            $('#overlaydemo2').stop().slideToggle('slow');
        });

        $("#prikaziReza").click(function(){
            if($("#rezza").css("display")=="none")
            {
                $('#rezza').stop().slideToggle('slow');
                $('#rezza1').stop().slideUp('slow');
                $('#rezza2').stop().slideUp('slow');
            }


        });

        $("#uredu").click(function(){

                $('#overlayrez').stop().slideToggle('slow');



        });


        $("#prikaziReza1").click(function(){
            $("#demo1").empty();
            if($("#rezza1").css("display")=="none")
            {
                $.ajax({
                    url: 'ucitajraspored.php',
                    success: function(data) {

                        var obj = jQuery.parseJSON(data);
                        $.each(obj, function(key,value) {

                            $("#demo1").append("<div class='nondraggable ' onclick='info(this)' name='" + value.id  + "' data-b='" + value.vrsta  + "'  data-x='" + value.x  + "' data-y='" + value.y  + "' style='transform: translate(" + value.x + "px, " + value.y + "px)'><img src='images/" + value.vrsta  + ".png' " + mere[value.vrsta] + "></div>")

                        });
                    }
                });
                 provera($('#datetimepicker3'));
                $('#rezza1').stop().slideToggle('slow');
                $('#rezza').stop().slideUp('slow');
                $('#rezza2').stop().slideUp('slow');
            }

        });

        $("#prikaziReza2").click(function(){
            if($("#rezza2").css("display")=="none")
            {
                $('#rezza2').stop().slideToggle('slow');
                $('#rezza1').stop().slideUp('slow');
                $('#rezza').stop().slideUp('slow');
            }



           vremenskalinija($('#datetimepicker4').val());

        });

        $( "#dostupnost" ).click(function(event) {
            event.preventDefault();
            $('#overlaydemo').stop().slideToggle('slow');
        });

        $( "#dostupnost1" ).click(function(event) {
            event.preventDefault();
            $('#overlaydemo2').stop().slideToggle('slow');
        });


        $( "#kalendaricon" ).click(function(event) {
            event.preventDefault();
            $('#overlaydemo').stop().slideToggle('slow');
        });

        $( "#kalendaricon1" ).click(function(event) {
            event.preventDefault();
            $('#overlaydemo2').stop().slideToggle('slow');
        });

        $("#prijavadugme").click(function() {
            $.ajax({
                url: 'logout.php',

                success: function (data) {

                        location.reload();

                }


            });
        });
    });

    var rV=podaciRv().split(",");

    function ucitaj() {
        var neradni=[];
        for (var i =0; i < rV.length; i++)
        {
            if (rV[i]=="0")
            {
                neradni.push(i);
            }
        }

        neradan(neradni);
        logic(new Date().getDay());

    }
    function logic(dan) {




        if(rV[dan]=="0")
        {
            $('#datetimepicker3').datetimepicker({
                timepicker:false
            });
        } else {
            $('#datetimepicker3').datetimepicker({
                timepicker:true
            });
            radnoVreme(convertRv(rV[dan]));
        }



    }

    function vremenskalinija(datum)
    {

        $.ajax({
            type: 'POST',
            url: 'view.php',
            data: {datum: datum},
            success: function(data) {

                $("#demo2").html(data);
            }
        });
    }

    function convertRv(rv) {
        var rtn=[];
        for (var i=rv.split("-")[0]; i<=rv.split("-")[1]; i++)
        {
            rtn.push(i + ":00");
        }
        return rtn;
    }

    function podaciRv()
    {
        var a;
        $.ajax({

            url: 'radnovreme.php',
            async: false,
            success: function (data) {
                a=data;
            }

        });

        return a;
    }

    function neradan(niz) {

        $('#datetimepicker3').datetimepicker({
            disabledWeekDays:niz,
            timepicker:false


        });

        $('#datetimepicker4').datetimepicker({
            disabledWeekDays:niz,
            timepicker:false


        });
    }

    function info(id1) {
        var id=id1.getAttribute("name");

        var datum = $('#datetimepicker3').val().split(' ')[0];
        var datumf = datum.split("/")[2] + "." + datum.split("/")[1] + "." + datum.split("/")[0] + ".";
        var vreme = $('#datetimepicker3').val().split('/').join('-') + ":00";
        var vremef = $('#datetimepicker3').val().split(' ')[1];
        var brojosoba = $("#" + id).attr("data-b").substr(0,1);
        var slovima = [];
        slovima["2"] = "dve osobe";
        slovima["4"] = "četiri osobe";
        slovima["6"] = "šest osoba";
        slovima["8"] = "osam osoba";

        if($(id1).hasClass("rez")==true)
        {
            $('#naslovcomf').html("Detalji o rezervaciji stola za " + slovima[brojosoba] + " " + datumf + " u " + vremef + ":");
            $('#overlayrez').stop().slideToggle('slow');
            $.ajax({
                type: 'POST',
                url: 'info.php',
                data: {vreme: vreme, sto:id},
                success: function(data) {
                    $("#imeiprezime").val(data.split(";")[0]);
                    $("#emailadresa").val(data.split(";")[1]);
                    $("#brojtelefona").val(data.split(";")[2]);
                }
            });

        }





    }



    $('#datetimepicker3').datetimepicker({
        inline:true,
        dayOfWeekStart:1


    });

    $('#datetimepicker4').datetimepicker({
        inline:true,
        dayOfWeekStart:1,
        timePicker:false


    });

    $('#datetimepicker3').datetimepicker({
        timepicker:true,

        minDate:'0',
        onChangeDateTime:function(dp,$input){

            logic(dp.getDay());
            provera($input);




        }
    });

    $('#datetimepicker4').datetimepicker({
        minDate:'0',
        format: 'Y-m-d',
        onChangeDateTime:function(dp,$input){

          vremenskalinija($input.val());




        }
    });



    function provera($input) {


        if (new Date($input.val()) < new Date())
        {
            $('.nondraggable').each(function() {

                $(this).addClass("dis");

            });
        } else {
            $('.nondraggable').each(function() {

                $(this).removeClass("rez");

            });
        }

        var vreme=$input.val().split('/').join('-') + ":00";
        $.ajax({
            type: 'POST',
            url: 'rezervisani.php',
            data: {vreme: vreme},
            success: function(data) {
                var niz = data.split(',');




                for (var i in niz) {

                    $("[name='" + niz[i] + "']").addClass("rez");
                }
            }
        });

    }


    function radnoVreme(niz) {

        $('#datetimepicker3').datetimepicker({

            allowTimes:niz


        });
    }

</script>


</html>