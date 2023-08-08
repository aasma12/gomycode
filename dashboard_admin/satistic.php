<?php

include 'C:\xampp\htdocs\Gestionproduits\Controller\ProduitC.php';

$error = "";

// create client
$produit = null;

// create an instance of the controller
$produitC = new ProduitC();


if (isset($_POST['prix'])) {
        $produitC->displayStatistics();
        header('Location:C:\xampp\htdocs\Gestionproduits\dashboard_admin\satistic.php');
    } else 
        $error = "Missing information";
}
?>