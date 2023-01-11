<?php

require_once ('import/score.php');

class Image {
    private $total;
    public $_face;
    public $_back;
    public $_identifiant;
    public $_retourner;
    
    public function __construct (string $face, string $back, int $identifiant, int $retourner){
        $this->_face = $face;
        $this->_back = $back;
        $this->_identifiant = $identifiant;
        $this->_retourner = $retourner;
    }
    
    public function tournerCarte ($situation){
        $situation->_retourner = 2;

    }

    public function retournerCarte ($test){
        $test->_retourner = 1;

    }

    public function foundPairs ($uniqueCarte){

        $id_carte = $uniqueCarte->_identifiant;
        $_SESSION['pairs']["$id_carte"] = $uniqueCarte;
        $face = $uniqueCarte->_face;

        
        if($_SESSION['clickcounter'] % 2 == 0){
            $_SESSION['found']=0;
             
            if ($_SESSION['face'] !== $face){           
                $_SESSION['signal'] = 1;
                  echo "<meta http-equiv='refresh' content='1;URL=memory.php'>";
            }
        }  

        $_SESSION['face'] = $face;

    } 
 
}
?>