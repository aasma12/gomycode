<?php
include 'C:\xampp\htdocs\Gestionproduits\config.php';
include 'C:\xampp\htdocs\Gestionproduits\Model\categorie.php';

class categorieC
{
    public function listcategorie()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecategorie($idcategorie)
    {
        $sql = "DELETE FROM categorie WHERE idcategorie = :idcategorie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idcategorie', $idcategorie);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function ajoutcategorie($categorie)
    {
        $sql = "INSERT INTO categorie 
        VALUES (:id, :ln)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                ':id' => $categorie ->getidcategorie(),
                'ln' => $categorie ->gettype()
                
               
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatecategorie ($categorie , $idcategorie )
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    idcategorie = :idcategorie,
                    type = :type
                    
                WHERE idcategorie= :idcategorie'
            );
            $query->execute([
                'idcategorie' => $idcategorie,
                'type' => $categorie->gettype()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showcategorie ($idcategorie )
    {
        $sql = "SELECT * from categorie  where idcategorie = $idcategorie ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $categorie = $query->fetch();
            return $categorie ;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
   
}