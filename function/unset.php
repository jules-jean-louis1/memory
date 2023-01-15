<?php
function unsetGame(){
    unset($_SESSION['indexShowed']);
    unset($_SESSION['start']);
    unset($_SESSION['clickcounter']);
    unset($_SESSION['signal']);
    unset($_SESSION['found']);
    unset($_SESSION['foundcards']);
}
function foundCard()
{
    if(@isset($_SESSION['foundcards'])){
        if($_SESSION['foundcards'] == ((count($_SESSION['start'])/2)-1)){ 
            if(!empty($_SESSION['clickcounter'])){
                getScore($_SESSION['clickcounter']);
                
            }
        }
    }
}
?>