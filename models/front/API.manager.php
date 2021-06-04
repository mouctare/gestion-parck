<?php
require_once "models/Model.php";


class  APIManager extends Model{
    public function getDBAnimaux(){
        $req = "SELECT * 
        from animal a inner join famille f on f.famille_id = a.famille_id
        inner join animal_continent ac on ac.animal_id = a.animal_id
        inner join continent c on c.continent_id = ac.continent_id
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $animaux;
    }
}