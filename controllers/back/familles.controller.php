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
              throw  new Exception("Vous n'avez pas le droit d'etre là barrez vous");
        }

    }

    public function suppression(){
        if(Securite::verifAccessSession()){
            $_SESSION['alert'] = [
                "message" => "La famille a bien été supprimée",
                "type" => "alert-success"
            ];
            
            $idFamille = (int) Securite::secureHTML($_POST['famille_id']);

            if($this->famillesManager->compterAnimaux($idFamille) > 0){
                $_SESSION['alert'] = [
                    "message" => "Vous ne pouvez pas supprimé une famille qui a des animaux",
                    "type" => "alert-danger"
                ]; 
            } else {
                $this->famillesManager->deleteDBfamille($idFamille);
                $_SESSION['alert'] = [
                    "message" => "La famille a bien été supprimée",
                    "type" => "alert-success"
                ]; 
            }
           
           header('Location: '.URL. 'back/familles/visualisation');
        } else {
            throw  new Exception("Vous n'avez pas le droit d'etre là barrez vous"); 
        }
    }
    public function modification(){
        if(Securite::verifAccessSession()){
           $idFamille = (int)Securite::secureHTML($_POST['famille_id']);
           $libelle = Securite::secureHTML($_POST['famille_libelle']);
           $description = Securite::secureHTML($_POST['famille_description']);
           $this->famillesManager->updateFamille($idFamille, $libelle, $description);

           $_SESSION['alert'] = [
            "message" => "La famille a bien été modifiée",
            "type" => "alert-success"
        ];
        
           header('Location: '.URL. 'back/familles/visualisation');
        } else {
            throw  new Exception("Vous n'avez pas le droit d'etre là barrez vous"); 
        }
    }

    public function creationTemplate(){
        if(Securite::verifAccessSession()){
            require_once "views/familleCreation.view.php";

        } else{
          throw  new Exception("Vous n'avez pas le droit d'etre là barrez vous");
    }


    }

    public function creationValidation(){
        if(Securite::verifAccessSession()){
            $libelle = Securite::secureHTML($_POST['famille_libelle']);
            $description = Securite::secureHTML($_POST['famille_description']);
           $idFamille = $this->famillesManager->createFamille($libelle, $description);

           $_SESSION['alert'] = [
            "message" => "La famille a bien été créee avec l'identifiant : ".$idFamille,
            "type" => "alert-success"
        ];
    
           header('Location: '.URL. 'back/familles/visualisation');
        } else{
          throw  new Exception("Vous n'avez pas le droit d'etre là barrez vous");
    }
 }

    
}