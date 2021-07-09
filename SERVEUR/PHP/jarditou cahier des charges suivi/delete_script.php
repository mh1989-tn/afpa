<?php

$pro_id = $_POST["pro_id"]; 
require "connexion_bdd.php";


try {

    $requete = $db->prepare("DELETE from produits WHERE pro_id=:pro_id");

    $requete->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);
    
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

