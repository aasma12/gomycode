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
        header('Location:ListProduits.php');
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
    <button><a href="ListProduits.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idproduit'])) {
        $produit = $produitC->showproduit($_POST['idproduit']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idproduit">Id Product:
                        </label>
                    </td>
                    <td><input type="text" name="idproduit" id="idproduit" value="<?php echo $produit['idproduit']; ?>"maxlength="20"></td>
                </tr>

                <tr>
                    <td>
                        <label for="nom"> Name product:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $produit['nom']; ?>" maxlength="30"></td>
                </tr>

                <tr>
                    <td>
                        <label for="prix"> Price:
                        </label>
                    </td>
                    <td><input type="text" name="prix" id="prix" value="<?php echo $produit['prix']; ?>"maxlength="20"></td>
                </tr>

                <tr>
                    <td>
                        <label for="image">Image:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="image" value="<?php echo $produit['image']; ?>" id="image">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="description">Description:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="description" id="description" value="<?php echo $produit['description']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="IDcategorie">IDcategorie:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="IDcategorie" id="IDcategorie" value="<?php echo $produit['IDcategorie']; ?>">
                    </td>
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