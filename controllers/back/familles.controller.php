<?php
require_once "./controllers/back/Securite.class.php";

class FamillesController{
    public function __construct(){

    }

    public function visualisation(){
        if(Securite::verifAccessSession()){

        } else{
            
        }

    }
}