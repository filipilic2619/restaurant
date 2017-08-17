
var idstola;
var clglob;

function passwordStrength()
{

    var password = $("#password1").val();

    var score   = 0;

    if (password.length > 6) {score++;}

    if ( ( password.match(/[a-z]/) ) &&
        ( password.match(/[A-Z]/) ) ) {score++;}

    if (password.match(/\d+/)){ score++;}

    if ( password.match(/[^a-z\d]+/) )	{score++};

    if (password.length > 12){ score++;}





    if(password.length < 1){
        $("#progress").css("display", "none");
    }
    else if(score<3){
        $("#progress").css("display", "block");
        $("#progress1").css("width", "33%");
        $("#progress1").css("background", "#cc0600");

    }
    else if(score<4){
        $("#progress").css("display", "block");
        $("#progress1").css("width", "66%");
        $("#progress1").css("background", "#cc7000");
    }
    else if(score>=4){
        $("#progress").css("display", "block");
        $("#progress1").css("width", "100%");
        $("#progress1").css("background", "#00cc04");

    }





}


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

                $("#demo").append("<div class='nondraggable dis' onclick='rezervisi(this.id, this.className)' id='" + value.id  + "' data-b='" + value.vrsta  + "'  data-x='" + value.x  + "' data-y='" + value.y  + "' style='transform: translate(" + value.x + "px, " + value.y + "px)'><img src='images/" + value.vrsta  + ".png' " + mere[value.vrsta] + "></div>")
            });
        }
    });

    $.datetimepicker.setLocale('sr-YU');
    $('#datetimepicker3').datetimepicker({
        value:new Date(),

        onshow:ucitaj()

    })


    $("#prikaziRez").click(function(){
        $('#rezz').stop().slideToggle('slow');
    });

    $( "#demo" ).contextmenu(function(event) {
        event.preventDefault();
        $('#overlaydemo').stop().slideToggle('slow');
    });


    $( "#overlaydemo" ).contextmenu(function(event) {
        event.preventDefault();
        $('#overlaydemo').stop().slideToggle('slow');
    });

    $( "#kalendaricon" ).click(function(event) {
        event.preventDefault();
        $('#overlaydemo').stop().slideToggle('slow');
    });

    $( "#dostupnost" ).click(function(event) {
        event.preventDefault();
        $('#overlaydemo').stop().slideToggle('slow');
    });

    $("#comfyes").click(function(){

        id=idstola;
        cl=clglob;


        var vreme = $('#datetimepicker3').val().split('/').join('-') + ":00";



        $.ajax({
            type: 'POST',
            url: 'rezervisi.php',
            data: {vreme: vreme, sto: id},
            success: function (data) {

                $("#" + id).addClass("dis");
                $("#" + id).addClass("rez");
            }


        });


        $('#overlayrez').stop().slideToggle('slow');
    });

    $("#comfno").click(function(){
        $('#overlayrez').stop().slideToggle('slow');
    });

    $("#comfyes1").click(function(){

        id=idstola;
        cl=clglob;
        var vreme = $('#datetimepicker3').val().split('/').join('-') + ":00";

        otkazi(id, vreme);


        $('#overlayrez1').stop().slideToggle('slow');
    });

    $("#comfno1").click(function(){
        $('#overlayrez1').stop().slideToggle('slow');
    });

    $("#pocetnamenu").click(function() {
        $('html, body').animate({
            scrollTop: $("body").offset().top

        }, 1000);
        $("#restoranmenu").removeClass( "active");
        $("#rezervacijemenu").removeClass( "active");
        $("#pocetnamenu").addClass( "active");



    });

    $("#restoranmenu").click(function() {
        $('html, body').animate({
            scrollTop: $("#restoran").offset().top
        }, 1000);
        $("#pocetnamenu").removeClass( "active");
        $("#rezervacijemenu").removeClass( "active");
        $("#restoranmenu").addClass( "active");

    });

    $("#rezervacijemenu").click(function() {
        $('#rezz').stop().slideDown('slow');
        $('html, body').animate({
            scrollTop: $("#prikaziRez").offset().top
        }, 1000);
        $("#pocetnamenu").removeClass( "active");
        $("#restoranmenu").removeClass( "active");
        $("#rezervacijemenu").addClass( "active");

    });

    $(window).scroll(function () {
        if ($(this).scrollTop() < 400)
        {
            $("#restoranmenu").removeClass( "active");
            $("#rezervacijemenu").removeClass( "active");
            $("#pocetnamenu").addClass( "active");

        }
        else if ($(this).scrollTop() > 400 && $(this).scrollTop() < 900)
        {
            $("#pocetnamenu").removeClass( "active");
            $("#rezervacijemenu").removeClass( "active");
            $("#restoranmenu").addClass( "active");

        }
        else if ($(this).scrollTop() > 900)
        {
            $("#pocetnamenu").removeClass( "active");
            $("#restoranmenu").removeClass( "active");
            $("#rezervacijemenu").addClass( "active");

        }
    });

    $("#prijavadugme").click(function() {
        if ($(this).html()=="Prijava")
        {


            document.location.href="#top";
            $("body").css("overflow", "hidden");
            $( "#providnaslika" ).fadeIn( 1000, function() {});
            $( "#loginf" ).fadeIn( 1000, function() {});
        }

        else
        {
            $.ajax({
                url: 'logout.php',

                success: function (data) {
                    location.reload();
                }


            });
        }
    });

    $("#odustani").click(function() {
        $("body").css("overflow", "auto");
        $("body").css("overflow-x", "hidden");
        $( "#providnaslika" ).fadeOut( 1000, function() {});
        $( "#loginf" ).fadeOut( 1000, function() {});

    });

    $("#registracijadugme").click(function() {
        $( "#forma" ).fadeOut( 1000, function() {});
        $( "#forma1" ).fadeIn( 1000, function() {});


    });

    $("#registracijadugme1").click(function() {
        $( "#forma1" ).fadeOut( 1000, function() {});
        $( "#forma" ).fadeIn( 1000, function() {});


    });

    $("#odustani1").click(function() {
        $("body").css("overflow", "auto");
        $("body").css("overflow-x", "hidden");
        $( "#providnaslika" ).fadeOut( 1000, function() {});
        $( "#loginf" ).fadeOut( 1000, function() {});

    });

    $("#dot1").click(function() {
        $(".bigimage").css("background-image", "url(images/food2.jpg)");

        $("#dot2").removeClass("dot1");
        $("#dot3").removeClass("dot1");
        $("#dot2").addClass("dot");
        $("#dot3").addClass("dot");
        $("#dot1").addClass("dot1");
    });

    $("#dot2").click(function() {
        $(".bigimage").css("background-image", "url(images/food1.jpg)");
        $("#dot1").removeClass("dot1");
        $("#dot3").removeClass("dot1");
        $("#dot1").addClass("dot");
        $("#dot3").addClass("dot");
        $("#dot2").addClass("dot1");
    });

    $("#dot3").click(function() {
        $(".bigimage").css("background-image", "url(images/food3.jpg)");
        $("#dot1").removeClass("dot1");
        $("#dot2").removeClass("dot1");
        $("#dot1").addClass("dot");
        $("#dot2").addClass("dot");
        $("#dot3").addClass("dot1");
    });

    $("#prijava").click(function() {
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: {email: $("#username").val(), password: $("#password").val()},
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

    $( "#username" ).focus(function() {
        $("#neispravni").fadeOut( 500, function() {});
    });

    $( "#password" ).focus(function() {
        $("#neispravni").fadeOut( 500, function() {});
    });

    checkLogin();

    $( "#username1" ).blur(function() {
        $.ajax({
            type: 'POST',
            url: 'checkemail.php',
            data: {email: $("#username1").val()},
            success: function (data) {
                if(data==1)
                {
                    $("#username1").css("background-color", "#c0392b");
                } else {
                    $("#username1").css("background-color", "#ecf0f1");
                }
            }


        });
    });

});

$( "#username1" ).focus(function() {
    $("#username1").css("background-color", "#ecf0f1");
    $("#neispravni1").css("display","none");
});

$("#prijava1").click(function() {
    $.ajax({
        type: 'POST',
        url: 'checkemail.php',
        data: {email: $("#username1").val()},
        success: function (data) {
            if(data==1)
            {
                $("#neispravni1").css("display","block");
            } else {
                registracija();
            }
        }


    });
});

function registracija() {
    $.ajax({
        type: 'POST',
        url: 'registracija.php',
        data: {ime: $("#ime").val(), email: $("#username1").val(), password: $("#password1").val(), telefon: $("#telefon").val() },
        success: function (data) {

            location.reload();
        }


    });
}


function checkLogin() {
    $.ajax({

        url: 'checksession.php',

        success: function (data) {
            if (data==0)
            {
                $("#demo").css("display", "none");
                $("#legenda").css("display", "none");
                $("#kalendaricon").css("display", "none");
                $("#restriction").css("display", "block");
            } else {
                $("#demo").css("display", "block");
                $("#legenda").css("display", "inline-block");
                $("#kalendaricon").css("display", "inline-block");
                $("#restriction").css("display", "none");
                $.ajax({
                    url: 'getIme.php',
                    success: function (data) {
                        $("#prijavadugme").html(data + " - odjava");
                    }
                });

            }

        }


    });

}


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
}


$('#datetimepicker3').datetimepicker({
    inline: true,
    dayOfWeekStart: 1


});

$('#datetimepicker3').datetimepicker({
    timepicker: true,

    minDate: '0',
    onChangeDateTime: function (dp, $input) {

        logic(dp.getDay());
        provera($input);
        proverauser($input);


    }
});


$(".nondraggable").click(function() {

});



function rezervisi(id, cl) {

    idstola=id;
    clglob=cl;
    var datum = $('#datetimepicker3').val().split(' ')[0];
    var datumf = datum.split("/")[2] + "." + datum.split("/")[1] + "." + datum.split("/")[0] + ".";
    var vremef = $('#datetimepicker3').val().split(' ')[1];
    var brojosoba = $("#" + id).attr("data-b").substr(0,1);
    var slovima = [];
    slovima["2"] = "dve osobe";
    slovima["4"] = "četiri osobe";
    slovima["6"] = "šest osoba";
    slovima["8"] = "osam osoba";

    if($("#" + id).hasClass("rez")==true)
    {
        $('#naslovcomf1').html("Da li želite da otkažete rezervaciju stola za " + slovima[brojosoba] + " " + datumf + " u " + vremef + "?");
        $('#overlayrez1').stop().slideToggle('slow');
    } else {


        $('#naslovcomf').html("Da li želite da rezervišete sto za " + slovima[brojosoba] + " " + datumf + " u " + vremef + "?");
        $('#overlayrez').stop().slideToggle('slow');
    }







}

function otkazi(id, vreme) {
    $.ajax({
        type: 'POST',
        url: 'otkazi.php',
        data: {vreme: vreme, sto: id},
        success: function (data) {

            $("#" + id).removeClass("dis");
            $("#" + id).removeClass("rez");
        }


    });
}

function provera($input) {

    if (new Date($input.val()) < new Date())
    {
        $('.nondraggable').each(function() {

            $(this).addClass("dis");

        });
    } else {
        $('.nondraggable').each(function() {

            $(this).removeClass("dis");

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
                $( "#" + niz[i]).addClass("dis");
            }
        }
    });

}

function proverauser($input) {




    $('.nondraggable').each(function() {

        $(this).removeClass("rez");

    });

    if (new Date($input.val()) >= new Date()) {

        var vreme = $input.val().split('/').join('-') + ":00";
        $.ajax({
            type: 'POST',
            url: 'rezervisaniuser.php',
            data: {vreme: vreme, user: "fica"},
            success: function (data) {
                var niz = data.split(',');
                for (var i in niz) {
                    $("#" + niz[i]).addClass("rez");
                }

            }
        });

    }


}

function radnoVreme(niz) {

    $('#datetimepicker3').datetimepicker({

        allowTimes:niz


    });
}

