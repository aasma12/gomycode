<?php

include '../Controller/ClientC.php';
  
$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new ClientC();

if (
    isset($_POST["idClient"]) &&
    isset($_POST["name"]) &&
    isset($_POST["Fname"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["date"]) &&
    isset($_POST["email"]) &&
    isset ($_POST["password"]) &&
    isset ($_POST["role"])


) { 
   
    if (
        !empty($_POST["idClient"]) &&
        !empty($_POST['name']) &&
        !empty($_POST["Fname"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["date"]) && 
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["role"])

    ) { 
        $client = new Client(
            
            $_POST['idClient'],
            $_POST['name'],
            $_POST['Fname'],
            $_POST['adresse'],
            new DateTime($_POST['date']),
            $_POST['email'],
            $_POST['password'],
            $_POST['role']

        );
        $clientC->updateClient($client, $_POST["idClient"]);
       header('Location:../dashboard_admin/users.php');
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
                            <a href="users.php" class="">
                                <h6 class="text-primary"></i>Back</h6>
                            </a>
                            <h3>Update User</h3>
                        </div>

                        <div id="error">
                             <?php echo $error; ?>
                        </div>

                        <?php
                            if (isset($_POST['idClient'])) {
                                $client = $clientC->showClient($_POST['idClient']);
                            }

                        ?>
                        <form method="POST" id="myForm" action = "">
                            <input type="hidden" name="idClient" id ="idClient" value="<?php echo $client['idClient']; ?>">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="First name" value="<?php echo $client['firstName']; ?>">
                                <label for="floatingText">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Fname" name="Fname"placeholder="Last Name" value="<?php echo $client['lastName']; ?>">
                                <label for="floatingText">Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Ghazela" value="<?php echo $client['address']; ?>">
                                <label for="floatingText">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="date" name="date" placeholder="" value="<?php echo $client['dob']; ?>">
                                <label for="floatingText">Date of birth</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo $client['email']; ?>">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $client['password']; ?>">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="role" name="role" aria-label="Floating label select example">
                                <option selected></option>
                                <option value="Client">Client</option>
                                <option value="Admin">Admin</option> 
                                </select>
                                <label for="floatingSelect">Role</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Update User</button>
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