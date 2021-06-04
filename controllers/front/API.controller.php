<?php
require_once "models/front/API.manager.php";
require_once "models/Model.php";


class APIController {
    private $apiManger;

    public function __construct(){
        $this->apiManager = new APIManager();
    }
    public function getAnimaux(){
        $animaux = $this->apiManager->getDBAnimaux();
       
    }

    public function getAnimal($idAnimal){
        $lignesAnimal = $this->apiManager->getDBAnimal($idAnimal);
        echo "<pre>";
        print_r($lignesAnimal);
        echo "</pre>";
        
    }

    public function getContinents(){
        $continents = $this->apiManager->getDBContinents();
        Model::sendJSON($continents);
    }

    public function getFamilles(){
        $familles = $this->apiManager->getDBFamilles();
        Model::sendJSON($familles);
     
    }
}