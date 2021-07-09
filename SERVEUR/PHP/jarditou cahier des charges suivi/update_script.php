<?php

date_default_timezone_set('UTC');
$pro_id = $_POST["pro_id"]; 
$pro_ref = htmlspecialchars($_POST["pro_ref"]); 
$pro_cat_id = $_POST["pro_cat"];
$pro_libelle = htmlspecialchars($_POST["pro_libelle"]);
$pro_description = htmlspecialchars($_POST["pro_description"]);
$pro_prix = htmlspecialchars($_POST["pro_prix"]);
$pro_stock = htmlspecialchars($_POST["pro_stock"]);
$pro_couleur = htmlspecialchars($_POST["pro_couleur"]);
$pro_bloque = $_POST["pro_bloque"];
$pro_d_ajout = $_POST["pro_d_ajout"];
$pro_d_modif = date("Y-m-d H:i:s"); 
if ($pro_bloque == "Non") {
    $pro_bloque == NULL;
} else {
    $pro_bloque == "0";
}

require "connexion_bdd.php";


try {

$rq = "UPDATE produits,categories SET pro_id=:pro_id, pro_ref=:pro_ref,
  pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix,pro_cat_id=:pro_cat_id,
 pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_bloque=:pro_bloque, pro_d_ajout=:pro_d_ajout,
 pro_d_modif=:pro_d_modif WHERE pro_id=:pro_id AND produits.pro_cat_id = categories.cat_id";
$requete = $db->prepare($rq);
$requete->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);
$requete->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
$requete->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_STR);
$requete->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
$requete->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
$requete->bindValue(':pro_prix', $pro_prix, PDO::PARAM_INT);
$requete->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
$requete->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
if ($pro_bloque == "Non") {
    $requete->bindValue(':pro_bloque', null, PDO::PARAM_INT);
} else {
    $requete->bindValue(':pro_bloque', 0, PDO::PARAM_INT);
}
$requete->bindValue(':pro_d_ajout', $pro_d_ajout, PDO::PARAM_STR);
$requete->bindValue(':pro_d_modif', $pro_d_modif, PDO::PARAM_STR);

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