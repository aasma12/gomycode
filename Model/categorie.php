<?php
class categorie
{
    private  ?int $idcategorie = null;
    private  ?string $type = null;
  
   

    public function __construct($id = null, $n)
    {
        $this->idcategorie = $id;
        $this->type = $n;
       
       
    }

    /**
     * Get the value of idClient
     */
    public function getidcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Get the value of Name
     */
    public function gettype()
    {
        return $this->type;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function settype($type)
    {
        $this->type= $type;

        return $this;
    }

}
