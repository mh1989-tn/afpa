//  travail individuel 
 // i=1;
// var prenom=null;
// var liste="";

// while(prenom!="")
//     {
//         prenom = prompt("Entrer un prénom");        
//         liste += prenom + " ";
//         i++; 
//         }
 
// console.log("liste des prénoms saisies "+ liste );
// console.log("liste des prénoms saisies "+ i );
 
// }


// corection 1 ere méthode 
// var compteur = 1;
// var lstPrenoms = "";

// do {
//     var prenom = window.prompt("Saisissez le prénom n°" + compteur + "\n ou clic sur Annuler pour arrêter la saisie");
//     console.log(prenom);

//     if (prenom == null || prenom == "") { break; }

//     compteur++;
//     if (lstPrenoms == "") {
//         lstPrenoms += (prenom);
//         continue;
//     }
//     lstPrenoms += (", " + prenom);	
// } while (prenom != "" && prenom != null)

// console.log(compteur-1);
// alert((compteur-1) + " prénom.s saisi.s : \n" + lstPrenoms)
// Créer une page HTML qui demande à l'utilisateur un prénom.
// La page doit continuer à demander des prénoms à l'utilisateur jusqu'à ce qu'il laisse le champ vide.
// Enfin, la page affiche sur la console le nombre de prénoms et les prénoms saisis.

// correction deuxiéme méthode 
    var compteur = 1;
    var prenom = null;
    var liste = "";

    while (prenom != "") 
    {
       prenom = prompt("Entrer un prénom");        
       liste += prenom + " ";
       compteur++;          
    }
    alert("Liste des prénoms saisis : "+liste);
    alert("Nombre de prénoms saisis : "+compteur);
    console.log("Liste des prénoms saisis : "+liste);
    console.log("Nombre de prénoms saisis : "+compteur);