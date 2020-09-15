<?php
 
Class Vehicule{
    private $id_vehicule;
    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;
    
    
    // getters
    public function idVehicule()
    {
        return $this->id_vehicule;
    }
    
    public function marque()
    {
        return $this->marque;
    }
    
    public function modele()
    {
        return $this->modele;
    }
    
    public function couleur()
    {
        return $this->couleur;
    }
    
    public function immatriculation()
    {
        return $this->immatriculation;
    }
    
    
    
    // setters
    public function setIdVehicule($id)
    {
        $this->id_vehicule = $id;
    }
    
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }
    
    public function setModele($modele)
    {
        $this->modele = $modele;
    }
    
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
    
    public function setImmatriculation($imm)
    {
        $this->immatriculation = $imm;
    }
    
    
}
?>
