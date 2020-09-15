<?php
Class DB{
    
    private $host = "127.0.0.1"; // host
    private $db_name = "location_voiture"; // database name à modifier
    private $username = "root"; // username
    private $password = ""; // password
    public $conn;
    
    // get the database connection
    public function connexion(){
        
        $this->conn = null;
        
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
    
    public function deconnexion()
    {
        $this->conn = null;
    }
    
    
    // CRUD VEHICULE
    public function addVehicule($vehicule)
    {
        $requete = "INSERT INTO vehicule (marque,modele,couleur,immatriculation) 
VALUES('".$vehicule->marque()."', '".$vehicule->modele()."', '".$vehicule->couleur()."','".$vehicule->immatriculation()."')";
        // echo '<br> REQUETE CREATE FACTURE: '.$requete.'<br>';
        try{
            $con = $this->connexion();
            $stmt = $con->prepare($requete);
            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e)
        {
            echo $requete . "<br>" . $e->getMessage();
            return false;
        }
    }
    
    public function listeVehicule()
    {
        $requete = "SELECT * FROM vehicule";
        // echo "<br> REQUETE: ".$requete."<br>";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $listeVehicule = $statment->fetchAll();
            return $listeVehicule;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    public function ficheVehicule($id)
    {
        $requete = "SELECT * FROM vehicule WHERE id_vehicule = ".$id;
        // echo "<br> REQUETE: ".$requete."<br>";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $ficheVehicule = $statment->fetchAll();
            return $ficheVehicule;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    public function updateVehicule($vehicule)
    {
        $requete = "UPDATE vehicule SET marque = '".$vehicule->marque()."', modele = '".$vehicule->modele()."', couleur = '".$vehicule->couleur()."', immatriculation = '".$vehicule->immatriculation()."' WHERE id_vehicule = '".$vehicule->idVehicule()."' )";
        // echo '<br> REQUETE CREATE FACTURE: '.$requete.'<br>';
        try{
            $con = $this->connexion();
            $stmt = $con->prepare($requete);
            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e)
        {
            echo $requete . "<br>" . $e->getMessage();
            return false;
        }
    }
    
    public function deleteVehicule($idVehicule)
    {
        $requete = "DELETE FROM vehicule WHERE id_vehicule = ".$idVehicule;
        try{
            
            $con = $this->connexion();
            $con->exec($requete);
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    // CRUD CONDUCTEUR
    public function addConducteur($conduteur) //39 vtc-poo-afpa/Models/Conducteur.php /
    {
        $requete = "INSERT INTO conducteur (nom,prenom) VALUES('".$conducteur->nom()."', '".$conducteur->prenom()."')";
        // echo '<br> REQUETE CREATE FACTURE: '.$requete.'<br>';
        try{
            $con = $this->connexion(); // mitovy amin i $bdd = Model::getConnection(); ligne 43 nenazy
            $stmt = $con->prepare($requete);
            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e)
        {
            echo $requete . "<br>" . $e->getMessage();
            return false;
        }
    }
    
    public function listeConducteur()  //51
    {
        $requete = "SELECT * FROM conducteur";
        // echo "<br> REQUETE: ".$requete."<br>";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $listeConducteur = $statment->fetchAll();
            return $listeConducteur;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    public function ficheConducteur($id)
    {
        $requete = "SELECT * FROM conducteur WHERE id_conducteur = ".$id;
        // echo "<br> REQUETE: ".$requete."<br>";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $ficheConducteur = $statment->fetchAll();
            return $ficheConducteur;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    public function updateConducteur($conducteur)
    {
        $requete = "UPDATE conducteur SET nom = '".$conducteur->nom()."', prenom = '".$conducteur->prenom()."' WHERE id_conducteur = '".$conducteur->idConducteur()."' )";
        // echo '<br> REQUETE CREATE FACTURE: '.$requete.'<br>';
        try{
            $con = $this->connexion();
            $stmt = $con->prepare($requete);
            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e)
        {
            echo $requete . "<br>" . $e->getMessage();
            return false;
        }
    }
    
    public function deleteConducteur($idConducteur)
    {
        $requete = "DELETE FROM conducteur WHERE id_conducteur = ".$idConducteur;
        try{
            
            $con = $this->connexion();
            $con->exec($requete);
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    // CRUD ASSOCIATION
    public function addAssociation($association)
    {
        $requete = "INSERT INTO association (id_vehicule,id_conducteur) VALUES('".$association->idVehicule()."', '".$association->idConducteur()."')";
        // echo '<br> REQUETE CREATE FACTURE: '.$requete.'<br>';
        try{
            $con = $this->connexion();
            $stmt = $con->prepare($requete);
            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e)
        {
            echo $requete . "<br>" . $e->getMessage();
            return false;
        }
    }
    
    public function listeAssociation()
    {
        $requete = "SELECT * FROM association a JOIN vehicule v on a.id_vehicule = v.id_vehicule JOIN conducteur c on c.id_conducteur = a.id_conducteur";
        // echo "<br> REQUETE: ".$requete."<br>";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $listeAssociation = $statment->fetchAll();
            return $listeAssociation;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    public function ficheAssociation($id)
    {
        $requete = "SELECT * FROM association a JOIN vehicule v on a.id_vehicule = v.id_vehicule JOIN conducteur c on c.id_conducteur = a.id_conducteur WHERE id_association = ".$id;
        // echo "<br> REQUETE: ".$requete."<br>";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $ficheAssociation = $statment->fetchAll();
            return $ficheAssociation;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    public function updateAssociation($association)
    {
        $requete = "UPDATE association SET id_vehicule = '".$association->idVehicule()."', id_conducteur = '".$association->idConducteur()."' WHERE id_association = '".$association->idAssociation()."' )";
        // echo '<br> REQUETE CREATE FACTURE: '.$requete.'<br>';
        try{
            $con = $this->connexion();
            $stmt = $con->prepare($requete);
            $stmt->execute();
            
            return true;
        }
        catch(PDOException $e)
        {
            echo $requete . "<br>" . $e->getMessage();
            return false;
        }
    }
    
    public function deleteAssociation($idAssociation)
    {
        $requete = "DELETE FROM association WHERE id_association = ".$idAssociation;
        try{
            
            $con = $this->connexion();
            $con->exec($requete);
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    // afficher le nombre de conducteur
    public function nombreConducteur()
    {
        $requete = "SELECT count(id_conducteur) as nombre from conducteur";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $nbConducteur = $statment->fetchAll();
            return $nbConducteur;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    // afficher le nombre de vehicule
    public function nombreVehicule()
    {
        $requete = "SELECT count(id_vehicule) as nombre from vehicule";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $nbVehicule = $statment->fetchAll();
            return $nbVehicule;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    // afficher le nombre d'association
    public function nombreAssociation()
    {
        $requete = "SELECT count(id_association) as nombre from association";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $nbAssociation = $statment->fetchAll();
            return $nbAssociation;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
    
    // afficher les vehicules n'ayant pas de conducteur
    public function vehiculeSansConduteur()
    {
        $requete = "SELECT * FROM vehicule ";
        try{
            
            $con = $this->connexion();
            $statment = $con->prepare($requete);
            $statment->execute();
            $nbAssociation = $statment->fetchAll();
            return $nbAssociation;
        }
        catch(PDOException $e) {
            echo $requete . "<br>" . $e->getMessage();
        }
    }
}
?>
DB.class.php
Affichage de DB.class.php en cours...