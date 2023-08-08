<?php
include 'C:\xampp\htdocs\Gestionproduits\Controller\ProduitC.php';
$produitC = new produitC();
$produitC->deleteproduit($_GET["idproduit"]);
header('Location:../dashboard_admin\products.php');
?>