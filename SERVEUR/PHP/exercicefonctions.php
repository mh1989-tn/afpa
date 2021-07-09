<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice.fonction</title>
</head>
<body>
    <?php
    function calculateur ($entier1, $entier2) 
    {
        function addition($entier1, $entier2) 
        {
           $resultat = $entier1 + $entier2;
           return $resultat;
        }
        function soustraction($entier1, $entier2) 
        {
           $resultat = $entier1 - $entier2;
           return $resultat;
        }
        function multiplication($entier1, $entier2) 
{
   $resultat = $entier1 * $entier2;
   return $resultat;
}
        function division ($entier1, $entier2) 
{
   $resultat = $entier1 / $entier2;
   return $resultat;
}
?>

       return "le calcul est fini ";
    }

</body>
</html>