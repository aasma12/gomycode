<?php

include 'C:\xampp\htdocs\Gestionproduits\Controller\categorieC.php';

$error = "";

// create client
$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (
    isset($_POST["idcategorie"]) &&
    isset($_POST["type"])

) {
    if (
        !empty($_POST["idcategorie"]) &&
        !empty($_POST["type"])
    ) {
        $categorie = new categorie(
            $_POST['idcategorie'],
            $_POST['type'],
            
        );
        $categorieC->updatecategorie($categorie, $_POST["idcategorie"]);
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
    <button><a href="Listcategorie.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idcategorie'])) {
        $categorie = $categorieC->showcategorie($_POST['idcategorie']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idcategorie">Id categorie:
                        </label>
                    </td>
                    <td><input type="text" name="idcategorie" id="idcategorie" value="<?php echo $categorie['idcategorie']; ?>"maxlength="20"></td>
                </tr>

                <tr>
                    <td>
                        <label for="nom"> type categorie:
                        </label>
                    </td>
                    <td><input type="text" name="type" id="type" value="<?php echo $categorie['type']; ?>" maxlength="30"></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>