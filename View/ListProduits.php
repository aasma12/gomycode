<?php
include 'C:\xampp\htdocs\Gestionproduits\Controller\ProduitC.php';
$produitC = new produitC();
$list = $produitC->listproduit();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of products</h1>
        <h2>
            <a href="ajoutproduit.php">Add product</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Product</th>
            <th>Name product</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>IDcategorie</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $produit) {
        ?>
            <tr>
                <td><?= $produit['idproduit']; ?></td>
                <td><?= $produit['nom']; ?></td>
                <td><?= $produit['prix']; ?></td>
                <td><?= $produit['image']; ?></td>
                <td><?= $produit['description']; ?></td>
                <td><?= $produit['IDcategorie']; ?></td>
                <td align="center">
                    <form method="POST" action="updateProduit.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $produit['idproduit']; ?> name="idproduit">
                    </form>
                </td>
                <td>
                    <a href="deleteProduit.php?idproduit=<?php echo $produit['idproduit']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>