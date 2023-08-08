<?php
include 'C:\xampp\htdocs\Gestionproduits\config.php';
include 'C:\xampp\htdocs\Gestionproduits\Model\produit.php';

class produitC
{
    public function listproduit()
    {
        $sql = "SELECT * FROM produits";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteproduit($idproduit)
    {
        $sql = "DELETE FROM produits WHERE idproduit = :idproduit";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idproduit', $idproduit);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function ajoutproduit($produit)
    {
        $sql = "INSERT INTO produits  
        VALUES (:id, :ln, :ad, :em, :dob,:ca)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $produit->getIDproduit(),
                'ln' => $produit->getNom(),
                'ad' => $produit->getPrix(),
                'em' => $produit->getImage(),
                'dob' => $produit->getDescription(),
                'ca' => $produit->getIDcategorie()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateproduit($produit, $idproduit)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produits SET 
                    idproduit = :idproduit,
                    nom = :nom, 
                    prix = :prix, 
                    image = :image,
                    description = :description,
                    IDcategorie= :IDcategorie
                WHERE idproduit= :idproduit'
            );
            $query->execute([
                'idproduit' => $idproduit,
                'nom' => $produit->getNom(),
                'prix' => $produit->getPrix(),
                'image' =>$produit->getImage(),
        
                'description' =>$produit->getDescription(),
                'IDcategorie' =>$produit->getIDcategorie()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showproduit($idproduit)
    {
        $sql = "SELECT * from produits where idproduit = $idproduit";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit= $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function displayStatistics() {
        $sql = "SELECT COUNT(*) as total_products, AVG(prix) as avg_price, MIN(prix) as min_price, MAX(prix) as max_price FROM produits";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            echo "Total Products: " . $row["total_products"] . "<br>";
            echo "Average Price: " . $row["avg_price"] . "<br>";
            echo "Minimum Price: " . $row["min_price"] . "<br>";
            echo "Maximum Price: " . $row["max_price"] . "<br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
