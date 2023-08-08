<?php

include 'C:\xampp\htdocs\Gestionproduits\Controller\categorieC.php';

$error = "";

// create produit
$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (
    isset($_POST["idcategorie"]) &&
   
    isset($_POST["type"])
   
) {
    if (
        !empty($_POST["idcategorie"])&&
         !empty($_POST["type"])

    ) {
        $categorie = new categorie(
            $_POST['idcategorie'],
            $_POST['type']  );
        $categorieC->ajoutcategorie($categorie);
        header('Location:Listcategorie.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="Listcategorie.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form id="my-form" action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="idcategorie"> idcategorie:
                    </label>
                </td>
                <td><input type="text" name="idcategorie" id="idcategorie"></td>
            </tr>
            <tr>
                <td>
                    <label for="type"> type:
                    </label>
                </td>
                <td><input type="text" name="type" id="type" maxlength="30"></td>
            </tr>
            <tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>  
</body>

</html>