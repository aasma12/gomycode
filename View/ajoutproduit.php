<?php

include 'C:\xampp\htdocs\Gestionproduits\Controller\ProduitC.php';

$error = "";

// create produit
$produit = null;

// create an instance of the controller
$produitC = new produitC();
if (
    isset($_POST["idproduit"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["image"]) &&
    isset($_POST["description"]) &&
    isset($_POST["IDcategorie"])
   
) {
    if (
        !empty($_POST["idproduit"])&&
        !empty($_POST["nom"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["description"]) &&
         !empty($_POST["IDcategorie"])

    ) {
        $produit = new produit(
            $_POST['idproduit'],
            $_POST['nom'],
            $_POST['prix'],
            $_POST['image'],
            $_POST['description'],
            $_POST['IDcategorie']  );
        $produitC->ajoutproduit($produit);
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
    <a href="ListProduits.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form id="my-form" action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="idproduit"> idproduit:
                    </label>
                </td>
                <td><input type="text" name="idproduit" id="idproduit"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom"> Name:
                    </label>
                </td>
                <td><input type="text" name="nom" id="lastName" maxlength="30"></td>
            </tr>
            <tr>
                <td>
                    <label for="prix"> prix:
                    </label>
                </td>
                <td>
                    <input type="text" name="prix" id="prix">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image"> image:
                    </label>
                </td>
                <td>
                    <input type="text" name="image" id="image">
                </td>
            </tr>
            <tr>
            <td>
                <label for="description"> description:
                </label>
            </td>
            <td>
                <input type="text" name="description" id="description">
            </td>
        </tr>
        <tr>
        <td>
            <label for="IDcategorie"> IDcategorie:
            </label>
        </td>
        <td>
            <input type="text" name="IDcategorie" id="IDcategorie">
        </td>
    </tr>
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
     <script>
        document.forms[0].addEventListener("submit", function(evenement) { 
          let error=document.getElementById('error');
          let error1=document.getElementById('error1');
          let error2=document.getElementById('error2');
          let error3=document.getElementById('error3');
          error.innerHTML = "";
          error1.innerHTML = "";
          error2.innerHTML = "";
          error3.innerHTML = "";
          if (document.getElementById("nom").value == "") {
            evenement.preventDefault();
                let error=document.getElementById('error');
                error.innerHTML = "Taper un nom";
                error.style.color='red';

            }  
          else if (document.getElementById("prix").value == "") {
            evenement.preventDefault();
                let error=document.getElementById('error1');
                error.innerHTML = "Tapez un email valable pour avoir une réponse.";
                error.style.color='red';

            }
            else if (document.getElementById("image").value == "") {
              evenement.preventDefault();
              let error=document.getElementById('error2');
                error.innerHTML = "Taper un date";
                error.style.color='red';

            }
            else if (document.getElementById("description").value == "") {
              evenement.preventDefault();
              let error=document.getElementById('error3');
                error.innerHTML = "Taper un temps";
                error.style.color='red';
   
            }
            
        });
    </script>
</body>

</html>
