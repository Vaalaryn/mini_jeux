<?php

require './class/charactere.php';
require './class/monster.php';
require './class/manager.php';


echo "Que souhaitez vous faire \n m -- Manger \n p -- Prendre une potions(gain de 50hp) \n r -- se Reposer \n a -- Attaquer \n e -- Esquiver \n q -- Quitter \n\n";
$line = readline();

while($line != 'q'){
    switch ($line){
        case 'm':
            echo "Manger \n\n";
            break;
        case 'r':
            echo "Reposer \n\n";
            break;
        case 'a':
            echo "Attaquer \n\n";
            break;
        case 'p':
            echo "Potions \n\n";
            break;
        case 'e':
            echo "Esquiver \n\n";
            break;

    }
    echo "Que souhaitez vous faire \n m -- Manger \n p -- Prendre une potions(gain de 50hp) \n r -- se Reposer \n a -- Attaquer \n e -- Esquiver \n q -- Quitter \n\n";
    $line = readline();
}