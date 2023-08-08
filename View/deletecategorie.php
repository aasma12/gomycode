<?php
include 'C:\xampp\htdocs\Gestionproduits\Controller\categorieC.php';
$categorieC = new categorieC();
$categorieC->deletecategorie($_GET["idcategorie"]);
header('Location:../dashboard_admin/categoriee.php');
?>