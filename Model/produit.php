<?php
class produit
{
    private  ?int $idproduit = null;
    private  ?string $nom = null;
    private  ?int $prix = null;
    private  ?string $image = null;
    private  ?string $description = null;
    private  ?int $IDcategorie = null;

    public function __construct($id = null, $n, $p, $a, $d, $c)
    {
        $this->idproduit = $id;
        $this->nom = $n;
        $this->prix = $p;
        $this->image = $a;
        $this->description= $d;
        $this->IDcategorie = $c;
    }

    /**
     * Get the value of idClient
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Get the value of Name
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom= $nom;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getimage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getdescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }
     /**
     * Get the value of IDcategorie
     */
    public function getIDcategorie()
    {
        return $this->IDcategorie;
    }

    /**
     * Set the value of IDcategorie
     *
     * @return  self
     */
    public function setIDcategorie($IDcategorie)
    {
        $this->IDcategorie = $IDcategorie;

        return $this;
    }

}
