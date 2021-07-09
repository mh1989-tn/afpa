<?php
 session_start();
require "connexion_bdd.php";
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
    <div class="container">
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
        <div class="col-12">
        <span style="color:red;">
        <?php echo @$_SESSION['erreur_verif'] ?>
        </span>
          <form
              class="form-group"
              action="add_script.php"
              method="POST"
              id="form1"
              onsubmit="return (addVerif());"
          >
            <fieldset>
            <br />
              <label id="labelReference" for="pro_ref">Référence :</label>
              <input
                class="form-control"
                type="text"
                name="pro_ref"
                value="<?php echo @$_SESSION['pro_ref']; ?>"
                id="reference"
              />
              <span id="referenceErreur" style="color:red;"></span>
              <br />
              <label for="pro_cat">Catégorie :</label>
              <select id="cat" class="form-control" name="pro_cat">
              <option value="null" >Choisissez une catégorie</option>
              <?php
              
              while ($donnees = $reponse->fetch()) {
              ?>
              <option value="<?php echo $donnees['cat_id']; ?>"><?php echo $donnees['cat_nom']; ?></option>
              <?php
              }
              ?>
              </select>
              <span id="catErreur" style="color:red;"></span>
              <br />
              <label for="pro_libelle">Libellé :</label>
              <input
                class="form-control"
                type="text"
                name="pro_libelle"
                value="<?php echo @$_SESSION['pro_libelle']; ?>"
                id="libelle"
              />
              <span id="libelleErreur" style="color:red;"></span>
              <br />
              <label for="pro_description">Description :</label>
              <textarea
                class="form-control"
                name="pro_description"
                rows="2"
                cols="25"
                id="description"
                value="<? echo @$_SESSION['pro_description']; ?>"
              ></textarea>
              <span id="descriptionErreur" style="color:red;"></span>
              <br />
              <label for="pro_prix">Prix :</label>
              <input
                class="form-control"
                type="text"
                name="pro_prix"
                value="<?php echo @$_SESSION['pro_prix']; ?>"
                id="prix"
              />
              <span id="prixErreur" style="color:red;"></span>
              <br />
              <label for="pro_stock">Stock :</label>
              <input
                class="form-control"
                type="text"
                name="pro_stock"
                value="<?php echo @$_SESSION['pro_stock']; ?>"
                id="stock"
              />
              <span id="stockErreur" style="color:red;"></span>
              <br />
              <label for="pro_couleur">Couleur :</label>
              <input
                class="form-control"
                type="text"
                name="pro_couleur"
                value="<?php echo @$_SESSION['pro_couleur']; ?>"
                id="couleur"
              />
              <span id="couleurErreur" style="color:red;"></span>
              <br />
              <label for="pro_bloque">Produit bloqué ? :</label>
              <br />
              <input
                  type="radio"
                  name="pro_bloque"
                  value="Oui"
                  id="oui"
                  <?php echo @$_SESSION['Oui']; ?>
              />
              Oui   
              <input
                  type="radio"
                  name="pro_bloque"
                  value="Non"
                  id="non"
                  <?php echo @$_SESSION['Non']; ?>
              />
              Non
              <br />
              <span id="bloqueErreur" style="color:red;"></span>
              <br />
              <br />
              <a type="button" class="btn btn-lg btn-secondary active" href="index.php">Retour</a>
              <input type="submit" name="valider" class="btn btn-lg btn-success ml-5 active" value="Enregistrer"/>
              <br />
            </fieldset>
          </form>
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
    <script src="assets/js/form_verif.js"></script>
  </body>
</html>