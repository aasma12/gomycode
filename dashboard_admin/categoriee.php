<?php
include 'C:\xampp\htdocs\Gestionproduits\Controller\categorieC.php';
$categorieC = new categorieC();
$list = $categorieC->listcategorie();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Categorie</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../image/logoico.ico" rel="icon">

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
    <?php include "spinner.php" ?>
    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"></i>ADMIN <br>DASHBOARD</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="img/louay.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">louay</h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="users.php" class="nav-item nav-link "><i class="fa fa-user me-2"></i>Users</a>
                <a href="products.php" class="nav-item nav-link active"><i class="fa fa-shopping-cart me-2"></i>Products</a>
                <a href="history.php" class="nav-item nav-link"><i class="fa fa-history me-2"></i>History</a>
                <a href="categoriee.php" class="nav-item nav-link"><i class="fa fa-history me-2">Categorie</i></a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <?php include "navbar.php" ?>


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0">List of categorie</h4>
                        <a href= "add_categorie.php"><button type="button" class="btn btn-success rounded-pill m-2">Add a new categorie</button></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">id categorie</th>
                                    <th scope="col">Type categorie</th>
                                
                                    
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($list as $categorie) {
                            ?>
                                <tr>
                                <td><?= $categorie['idcategorie']; ?></td>
                                 <td><?= $categorie['type']; ?></td>
                                 
                                    <td>
                                        <form method="POST" action="update_categorie.php">
                                            <input type="submit" name="update" class="btn btn-sm btn-primary" value="Update">
                                            <input type="hidden" value=<?PHP echo $categorie['idcategorie']; ?> name="idcategorie">
                                            <a class="btn btn-sm btn-danger" href="../view/deletecategorie.php?idcategorie=<?php echo $categorie['idcategorie']; ?>">Delete</a>
                                        </form> 
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Footer Start -->
            <?php include "footer.php" ?>
</body>

</html>