<?php
 session_start();
$_SESSION['erreur_verif'] = "";
$_SESSION['pro_ref'] = "";
$_SESSION['pro_libelle'] = "";
$_SESSION['pro_description'] = "";
$_SESSION['pro_prix'] = "";
$_SESSION['pro_stock'] = "";
$_SESSION['pro_couleur'] = "";
$_SESSION['Oui'] = "";
$_SESSION['Non'] = "";   
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- CSS pour bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <title>Jarditou - Tableau</title>
  </head>
  <body>
    <div class="container-lg">
      <header>
        <!-- Première ligne -->
        <div class="d-none d-lg-block">
          <div class="row">
            <div class="col-12 col-lg-2">
              <img src="src/img/jarditou_logo.jpg" class="img-fluid" />
            </div>
            <div class="col-lg-6"></div>
            <div class="col-12 col-lg-4">
              <h1 class="text-center">Tout le jardin</h1>
            </div>
          </div>
        </div>

        <!-- Deuxième ligne -->
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light">
              <p class="my-auto pr-3"><b>Jarditou.com</b></p>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#menu"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Tableau</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Contact</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>

        <!-- Troisième ligne -->
        <div class="row">
          <div class="col-12">
            <img src="src/img/promotion.jpg" class="img-fluid w-100" />
          </div>
        </div>
      </header>

      <!-- Quatrième ligne -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class='table-active'><b>Photo</b></td>
                <td class='table-active'><b>ID</b></td>
                <td class='table-active'><b>Référence</b></td>
                <td class='table-active'><b>Libellé</b></td>
                <td class='table-active'><b>Prix</b></td>
                <td class='table-active'><b>Stock</b></td>
                <td class='table-active'><b>Couleur</b></td>
                <td class='table-active'><b>Ajout</b></td>
                <td class='table-active'><b>Modif</b></td>
                <td class='table-active'><b>Bloqué</b></td>
              </tr>
              <?php 
               require "connexion_bdd.php";
               $reponsebis = $db->query('SELECT * FROM produits');
               while ($donnees = $reponsebis->fetch()) {
               $bloque = $donnees['pro_bloque'];
               if ($bloque == "0"){
               $bloque = "<p class='text-center text-body bg-danger rounded-pill'>BLOQUE</p>";
               } else {
               $bloque = "";
               }
               $affichage = "<tr><td class='table-warning' style='border-color:black;'>"."<img src='src/img/".$donnees['pro_id'].".jpg' class='img-fluid' width='100px' />"."</td>".
               "<td class='align-middle table-secondary' style='border-color:black;'>".$donnees['pro_id']."</td>".
               "<td class='align-middle table-secondary' style='border-color:black;'>".$donnees['pro_ref']."</td>".
               "<td class='align-middle table-warning' style='border-color:black;'><a href='details.php?pro_id=".$donnees['pro_id']."'>".($donnees['pro_libelle'])."</a></td>".
               "<td class='align-middle table-secondary' style='border-color:black;'>".$donnees['pro_prix']."</td>".
               "<td class='align-middle table-secondary' style='border-color:black;'>".$donnees['pro_stock']."</td>".
               "<td class='align-middle table-secondary' style='border-color:black;'>".$donnees['pro_couleur']."</td>".
               "<td class='align-middle table-secondary' style='border-color:black;'>".$donnees['pro_d_ajout']."</td>".
               "<td class='align-middle table-secondary' style='border-color:black;'>".$donnees['pro_d_modif']."</td>".
               "<td class='align-middle table-secondary' style='border-color:black;'>".($bloque)."</td></tr>";  
               echo $affichage;
               }
              ?>
            </tbody>
          </table>
          <a type="button" class="ml-3 btn btn-lg btn-info active " href="add_form.php">Ajouter un produit</a>
          </br></br>
        </div>
      </div>

      <!-- Cinquième ligne-->
      <footer>
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand bg-dark navbar-dark">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="">Mention légales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Horaires</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Plan du site</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </footer>
    </div>

    <!-- Script pour CSS bootstrap -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>