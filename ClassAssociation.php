<?php
Class Association{
    private $id_association;
    private $id_conducteur;
    private $id_vehicule;
    
    public function idAssociation($id)
    {
        return $this->id_association;
    }
    
    public function idConducteur()
    {
        return $this->id_conducteur;
    }
    
    public function idVehicule()
    {
        return $this->id_vehicule;
    }
    
    
    public function setIdConducteur($id)
    {
        $this->id_conducteur = $id;
    }
    
    public function setIdVehicule($id)
    {
        $this->id_vehicule = $id;
    }
    
    public function setIdAssociation($id)
    {
        $this->id_association = $id;
    }
    
}
?>
