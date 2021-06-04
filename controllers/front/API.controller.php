<?php
require_once "models/front/API.manager.php";

class APIController {
    private $apiManger;

    public function __construct(){
        $this->apiManager = new APIManager();
    }
    public function getAnimaux(){
        $animaux = $this->apiManager->getDBAnimaux();
        echo "<pre>";
        print_r($animaux);
        echo "</pre>";
    }

    public function getAnimal($idAnimal){
        echo "les données JSON de l'aniaml ".$idAnimal." demandées";
    }

    public function getContinents(){
        echo "les données JSON des continents  demandées";
    }

    public function getFamilles(){
        echo "les données JSON des familles demandées";
    }
}