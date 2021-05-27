 /*SELECT pour afficher les donnees souhaites,
 AS pour changer le nom des colonnes,
 FROM pour indiquer dans quel table chercher, 
 WHERE pour enoncer une condition particuliere */

/* exercice 1(Liste des contacts français)*/
SELECT
   CompanyName As "sociéte",
   ContactName As "contact",
   ContactTitle AS "Fonction",
   Phone As "Télephone"
   FROM 
   Customers
   where 
   Country="France";

/* exercice 2(Produits vendus par le fournisseur « Exotic Liquids »)*/

SELECT 
   ProductName AS "Produit",
   UnitPrice AS"Prix"
 FROM 
   Products
 where  
   supplierID="1";

/* exercice 3 (Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant)*/

SELECT 
 CompanyName AS "Fournisseur",
 COUNT(ProductID) AS "Nbre produits";
FROM   
 Suppliers,
 Products
WHERE   
 country ="France" 
  AND Products.supplierID =Supplier.supplierID 
GROUP BY
 CompanyName
ORDER BY 
COUNT (ProductID) DESC;

 /* exercice 4( Liste des clients Français ayant plus de 10 commandes)*/  

SELECT
CompanyName As "client",
COUNT(OrderId) As "nbre commandes"
From 
Customers,
orders
Where
country="france"
  AND Customers.CustomerID=Orders.CustomerID
Group BY
CompanyName
Having COUNT(OrderID)> 10 

/* exercice 5(Liste des clients ayants un CA > 30000 )*/

SELECT
CompanyName AS "Client",
sum (UnitPrice*Quantity) AS "CA",
country AS"Pays"
From 
Customers,
Orders,
`order details`
Where
 Orders.CustomerID= Customers.CustomerID
   AND Orders.OrderID=`order details`.OrderID
Group BY 
CompanyName,
Country
Having
CA >30000

/*exercice 6(Liste des pays dont les clients ont passe commande de produits fournis par "Exotic Liquids")*/

SELECT
country.Customers As "Pays",
From 
Customers, 
orders,
`order details`,
Suppliers,
Products
Where 
Suppliers.SuppliersID=Products.SuppliersID
  AND Products.ProductID=`order details`.ProductID
  AND `order details`.OrderID=Orders.OrderID
  AND Orders.CustomerID=Customers.Customer.ID
Group BY
customers.Country; 
Having 
Suppliers.CompanyName="Exotic liquids"

/*exercice7( Montant des ventes de 1997)*/

SELECT
SUM(UnitPrice * Quantity) AS "Montant Ventes 97",
From 
orders,
`order details`
where
orders.OrderID=`order details`.OrderID
  AND YEAR(OrderDate) = '1997';

/* exercice8(Montant des ventes de 1997 mois par mois) */
SELECT
    Month(OrderDate),
    SUM(UnitPrice * Quantity) AS "Montant Ventes 97"
FROM
    `order details`,
    orders
WHERE
    `order details`.OrderID = orders.OrderID
    AND YEAR(OrderDate) = '1997'
GROUP BY
    Month(OrderDate);

/*  exercice9(Depuis quelle date le client "Du monde entier" n'a plus commandé?
 il faut chercher chercher la derniére date donc max (date de commande) )*/
SELECT
    MAX(OrderDate) AS "Date de dernière commande"
FROM
    customers,
    orders
WHERE
    CompanyName = "Du monde entier"
    AND customers.CustomerID = orders.CustomerID;

/* exercice 10 (Quel est le delai moyen de livraison en jours?)
 
 ROUND permet d'arrondir la moyenne(calculer par AVG) de la différence entre la date d'envoi et la date requise (calculer par DATEDIFF)*/
SELECT
    ROUND(AVG(DATEDIFF(RequiredDate,ShippedDate) AS "Délai moyen de livraison en jours"
FROM
    orders;