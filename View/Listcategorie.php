<?php
include 'C:\xampp\htdocs\Gestionproduits\Controller\categorieC.php';
$categorieC = new categorieC();
$list = $categorieC->listcategorie();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of categorie</h1>
        <h2>
            <a href="ajoutcategorie.php">Add categorie</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id categorie</th>
            <th>type categorie</th>
        </tr>
        <?php
        foreach ($list as $categorie) {
        ?>
            <tr>
                <td><?= $categorie['idcategorie']; ?></td>
                <td><?= $categorie['type']; ?></td>
                <td align="center">
                    <form method="POST" action="updatecategorie.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $categorie['idcategorie']; ?> name="idcategorie">
                    </form>
                </td>
                <td>
                    <a href="deletecategorie.php?idcategorie=<?php echo $categorie['idcategorie']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>