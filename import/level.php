<?php
function lvlShuffle($lvl){
    shuffle($lvl); 

    $_SESSION['start']=$lvl;

    $_SESSION['clickcounter']=0;
}
?>