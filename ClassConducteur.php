<?php
Class Conducteur{
	private $id_conducteur;
	private $nom;
	private $prenom;
	

	public function idConducteur()
	{
		return $this->id_conducteur;
	}

	public function nom()
	{
		return $this->nom;
	}

	public function prenom()
	{
		return $this->prenom;
	}


	public function setIdConducteur($id)
	{
		$this->id_conducteur = $id;
	}

	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}

}
?>