<?php 
include ("includes/config.php");

function dodaj($niz) {





    global $conn;


    $stmt=$conn->prepare("DELETE FROM raspored");

    $stmt->execute();

    foreach ($niz as $sto) {

        $stmt=$conn->prepare("INSERT INTO raspored (id_stola, vrsta, x, y) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss",  $sto->id, $sto->vrsta, $sto->x, $sto->y);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

}


function prikaz(){
    global $conn;
    $stmt = $conn->prepare("SELECT id_stola, vrsta, x, y FROM raspored");

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id,$vrsta, $x, $y);
    $niz = array();
    while ($stmt->fetch()) {

        $rez = array("id" => $id, "vrsta" => $vrsta, "x" => $x, "y" => $y);
        array_push($niz, $rez);

    }

    return $niz;
}

function rezervisani($vreme){
    global $conn;
    $stmt = $conn->prepare("SELECT id_stola FROM rez WHERE vreme=?");
    $stmt->bind_param("s",  $vreme);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    $niz = array();
    while ($stmt->fetch()) {

       array_push($niz, $id);

    }

    return $niz;
}

function rezervisaniuser($vreme, $user){
    global $conn;
    $stmt = $conn->prepare("SELECT id_stola FROM rez WHERE vreme=? AND email=?");
    $stmt->bind_param("ss",  $vreme, $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    $niz = array();
    while ($stmt->fetch()) {

        array_push($niz, $id);

    }

    return $niz;
}


function rezervisi($vreme, $sto, $user) {

    global $conn;

    $stmt=$conn->prepare("INSERT INTO rezervacije (id_stola, vreme, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",  $sto, $vreme, $user);
    $stmt->execute();
    $stmt->close();
    $conn->close();

}

function otkazi($vreme, $sto, $email) {


    global $conn;

    $stmt=$conn->prepare("DELETE FROM rezervacije WHERE id_stola=? AND vreme=? AND email=?");
    $stmt->bind_param("sss", $sto, $vreme, $email);
    $stmt->execute();
    $stmt->close();
    $conn->close();

}

function idConv($id){
    global $conn;
    $stmt = $conn->prepare("SELECT id FROM raspored WHERE id_stola=?");
    $stmt->bind_param("s",  $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    $result="";
    while ($stmt->fetch()) {

       $result=$id;
    }

    return $result;
}

function svistolovi(){
    global $conn;
    $stmt = $conn->prepare("SELECT id_stola FROM raspored");

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    $result=array();
    while ($stmt->fetch()) {

        array_push($result, $id);
    }

    return $result;
}




function rezervisanizadatum($datum, $sto){
    global $conn;
    $stmt = $conn->prepare("SELECT TIME(vreme) FROM rez WHERE id_stola=? AND date(vreme)=?");
    $stmt->bind_param("ss",  $sto, $datum);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    $result=array();
    while ($stmt->fetch()) {

        array_push($result, substr($id,0,2));
    }

    return $result;
}

function radnovreme(){
    global $conn;
    $stmt = $conn->prepare("SELECT ned,pon,uto,sre,cet,pet,sub FROM restoran");

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($ned, $pon, $uto, $sre, $cet, $pet, $sub);
    $result=array();
    while ($stmt->fetch()) {


        $result[0]= $ned;
        $result[1]= $pon;
        $result[2]= $uto;
        $result[3]= $sre;
        $result[4]= $cet;
        $result[5]= $pet;
        $result[6]= $sub;
    }

    return $result;
}

function checkLogin($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email=? AND password=?";
    $query = $conn->prepare($sql);
    $query->bind_param("ss", $email, $password);
    $query->execute();
    $query->store_result();
    if ($query->num_rows > 0)
    {
        return 1;
    }
    else
    {
        return 0;
    }
    $query->close();
}

function checkLoginAdmin($username, $password)
{
    global $conn;
    $sql = "SELECT * FROM admin WHERE username=? AND password=?";
    $query = $conn->prepare($sql);
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $query->store_result();
    if ($query->num_rows > 0)
    {
        return 1;
    }
    else
    {
        return 0;
    }
    $query->close();
}


function getIme($email){
    global $conn;
    $stmt = $conn->prepare("SELECT ime FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($ime);
    $result="";
    while ($stmt->fetch()) {


        $result=$ime;
    }

    return $result;
}

function checkEmail($email)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email=?";
    $query = $conn->prepare($sql);
    $query->bind_param("s", $email);
    $query->execute();
    $query->store_result();
    if ($query->num_rows > 0)
    {
        return 1;
    }
    else
    {
        return 0;
    }
    $query->close();
}

function registracija($ime, $email, $password, $telefon) {

    global $conn;


       $stmt=$conn->prepare("INSERT INTO users (ime, email, password, telefon) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss",  $ime, $email, $password, $telefon);
        $stmt->execute();


    $stmt->close();
    $conn->close();

    return 1;

}

function info($vreme, $sto){
    global $conn;
    $stmt = $conn->prepare("SELECT ime, email, telefon FROM info WHERE vreme=? AND id_stola=?");
    $stmt->bind_param("ss", $vreme, $sto);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($ime, $email, $telefon);
    $result="";
    while ($stmt->fetch()) {


        $result=$ime . ";" . $email . ";" . $telefon;
    }

    return $result;
}


?>