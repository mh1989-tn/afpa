<?php
session_start();
date_default_timezone_set('UTC');
$pro_ref = htmlspecialchars($_POST["pro_ref"]); 
$pro_cat_id = $_POST["pro_cat"];
$pro_libelle = htmlspecialchars($_POST["pro_libelle"]);
$pro_description = htmlspecialchars($_POST["pro_description"]);
$pro_prix = htmlspecialchars($_POST["pro_prix"]);
$pro_stock = htmlspecialchars($_POST["pro_stock"]);
$pro_couleur = htmlspecialchars($_POST["pro_couleur"]);
$pro_bloque = $_POST["pro_bloque"];
$pro_d_ajout = date("Y-m-d H:i:s");
$valider=$_POST["valider"];
if ($pro_bloque == "Non") {
    $pro_bloque == NULL;
} else if($pro_bloque == "Oui") {
    $pro_bloque == "0";
}

if ( isset($pro_ref, $pro_libelle, $pro_prix, $pro_stock) || $pro_cat_id = "null") {
    $_SESSION['erreur_verif'] = "<br /> ERREUR : Valeur(s) non définie(s) / incorrecte(s)";
    $_SESSION['pro_ref'] = $pro_ref;
    $_SESSION['pro_libelle'] = $pro_libelle;
    $_SESSION['pro_description'] = $pro_description;
    $_SESSION['pro_prix'] = $pro_prix;
    $_SESSION['pro_stock'] = $pro_stock;
    $_SESSION['pro_couleur'] = $pro_couleur;
    if ($pro_bloque == NULL) {
    $_SESSION['Oui'] = "";
    $_SESSION['Non'] = "checked";
    } else {
    $_SESSION['Oui'] = "checked";
    $_SESSION['Non'] = "";   
    }
    echo "<script>
    window.alert('ERREUR : Valeur(s) non définie(s)'); 
    </script>";  
    header("Location: add_form.php");    
}

require "connexion_bdd.php";

try {

$rq = "INSERT INTO produits(pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_d_ajout,pro_bloque)
 VALUES (:pro_cat_id,:pro_ref,:pro_libelle,:pro_description,:pro_prix,:pro_stock,:pro_couleur,:pro_d_ajout,:pro_bloque)";
$requete = $db->prepare($rq);
$requete->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
$requete->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_STR);
$requete->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
$requete->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
$requete->bindValue(':pro_prix', $pro_prix, PDO::PARAM_INT);
$requete->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
$requete->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
if($pro_ref=""){
    $message='<div class="erreur">Nom laissé vide.</div>';
    header("Location: add_form.php");
 }
if ($pro_bloque == "Non") {
    $requete->bindValue(':pro_bloque', null, PDO::PARAM_INT);
} else {
    $requete->bindValue(':pro_bloque', 0, PDO::PARAM_INT);
}
$requete->bindValue(':pro_d_ajout', $pro_d_ajout, PDO::PARAM_STR);



$requete->execute();
$requete->closeCursor();
}
catch (Exception $e) {
    echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

header("Location: index.php");
exit;

?>