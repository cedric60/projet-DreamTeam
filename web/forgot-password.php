
<?php

$host     = "localhost"; // 127.0.0.1- Emplacement de la base de donné
$user     = "root"; // nom utilisateur base de donné
$pass     = ""; //Pass user 
$database = "projet_idc_conseil"; // nom de la base de donné sur la quel on veut se connecter 

try {
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass); // Creation d'une instance de connection a la base de donnee
    // $requet = $bdd -> query('SELECT i.* FROM items i, items_has_carts ihc, carts c WHERE i.iditems = ihc.items_iditems AND c.idcarts = ihc.carts_idcarts AND c.clients_idclients = 2');// Function querypermet d'effectuer des requetes SQL
    //$result = $requet -> fetchall(PDO::FETCH_ASSOC);// Permet de trier le tableau fetchall(recupere tous les elements du tableau)
    //echo "<pre>";
    //print_r($result);
    //echo "</pre>";
    //$result = $requet->fetch(PDO::FETCH_ASSOC);
    //echo "<pre>";
    //print_r($result);
    //echo "</pre>";
    // $result = $requet->fetchall(PDO::FETCH_ASSOC);
    // echo "<pre>";
    //print_r($result);
    //echo "</pre>";
    // foreach($requet as $row) {
    //     print_r($row);
    // }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$email    = $_POST["email"];
//Récuperation des email existant en BDD
$req      = $bdd->prepare("SELECT mail FROM user WHERE mail = ?");
$req->execute(array($_POST['email']));
$resultat = $req->fetch();


if ($email == $resultat['mail']) {

    // CONDITIONS EMAIL
    if ((isset($_POST["email"])) 
        && (strlen(trim($_POST["email"])) > 0) 
        && (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))) {
            $email = stripslashes(strip_tags($_POST["email"]));
    }
    // fonction php pour envoie d'un email avec lien de modification du mot de passe
    
    echo true;
} else {
    echo false;
}

