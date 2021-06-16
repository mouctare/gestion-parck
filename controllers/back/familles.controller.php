<?php
require_once "./controllers/back/Securite.class.php";
require "./models/back/familles.manager.php";

class FamillesController{
    private $famillesManager;

    public function __construct(){
       $this->famillesManager = new FamillesManager();
       
    }

    public function visualisation(){
        if(Securite::verifAccessSession()){
            $familles = $this->famillesManager->getFamilles();
            // print_r($familles);
            require_once "views/famillesVisualisation.view.php";

        } else{
              throw  new Exception("Vous n'avez pas le droit d'etre là barrez bous");
        }

    }
}