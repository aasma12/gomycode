<?php

include 'C:\xampp\htdocs\Gestionproduits\Controller\ProduitC.php';

$error = "";

// create client
$produit = null;

// create an instance of the controller
$produitC = new ProduitC();

if (
    isset($_POST["idproduit"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["image"]) &&
    isset($_POST["description"]) &&
    isset($_POST["IDcategorie"])


) { 
   
    if (
        !empty($_POST["idproduit"]) &&
        !empty($_POST['nom']) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["IDcategorie"])

    ) { 
        $produit = new Produit(
            $_POST['idproduit'],
            $_POST['nom'],
            $_POST['prix'],
            $_POST['image'],
            $_POST['description'],
            $_POST['IDcategorie'],
            
        );
        $produitC->updateproduit($produit, $_POST["idproduit"]);
        header('Location:../dashboard_admin\products.php');
    } else 
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>dashboard_admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="products.php" class="">
                                <h6 class="text-primary"></i>Back</h6>
                            </a>
                            <h3>Update Product</h3>
                        </div>

                        <div id="error">
                             <?php echo $error; ?>
                        </div>

                        <?php
                            if (isset($_POST['idproduit'])) {
                                $produit = $produitC->showproduit($_POST['idproduit']);
                            }

                        ?>
                        <form method="POST" id="myForm" action = "">
                            <input type="hidden" name="idproduit" id ="idproduit" value="<?php echo $produit['idproduit']; ?>">
                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nom" name="nom"placeholder="nom" value="<?php echo $produit['nom']; ?>">
                                <label for="floatingText">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="prix" name="prix" placeholder="prix" value="<?php echo $produit['prix']; ?>">
                                <label for="floatingText">prix</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="image" name="image" placeholder="image" value="<?php echo $produit['image']; ?>">
                                <label for="floatingText">image</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="description" name="description" placeholder="description" value="<?php echo $produit['description']; ?>">
                                <label for="floatingInput">description</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="IDcategorie" name="IDcategorie" placeholder="IDcategorie" value="<?php echo $produit['IDcategorie']; ?>">
                                <label for="floatingPassword">IDcategorie</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>