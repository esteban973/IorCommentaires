<?php

function franciseMaDate($date){
    //traduction des mois en anglais
$moisAng=array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Déc');
$mois=array('Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jui','Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc');
    return str_replace($moisAng, $mois, $date);
}
?>
