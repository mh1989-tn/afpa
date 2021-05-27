
var x = parseInt(prompt("entrez un nombre x"));
var n = parseInt(prompt("entrez un nombre n"));

var multiplication;
do {
    multiplication = n*x;
    console.log(multiplication);
    alert(multiplication);
    n++;
  }
  while (n <= 10);