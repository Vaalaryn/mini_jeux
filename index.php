<?php

require './class/monster.php';
require './class/charactere.php';


$hunterName = readline('Entrez le nom de votre chasseur : ');
echo "\n\n";

$hunter = new Charactere($hunterName, 80);

$monster = new Monster(500, "Nergigante", 25);

echo "Que souhaitez vous mangez avant de partie à la chasse \n 1 - HP : +50 Stamina +0\n 2 - HP : +25 Stamina +25\n 3 - HP : +0 Stamina +50\n\n";
$manger = readline();
if ($manger == '1') {
    $hunter->eat(50, 0);
} elseif ($manger == '2') {
    $hunter->eat(25, 25);
} else {
    $hunter->eat(0, 50);
}

$attack = $monster->isAttack();


echo "==================================================\n";
echo 'HP : ' . $hunter->getLife() . ' / '. $hunter->maxLife . "\t STAMINA : " . $hunter->getStamina() . ' / '. $hunter->maxStamina .  "\t POTIONS : " . $hunter->getPotions() . "\n";
echo "==================================================\n";
echo "Que souhaitez vous faire \n p -- Prendre une potions(gain de 50hp) \n r -- se Reposer(gain de 30 de stamina) \n a -- Attaquer \n c -- Attaque charger (2x plus de dégat mais consome 15 de stamina et impossible d'esquiver) \n\n\n";
$line = readline();
echo "\n\n";

while (!$monster->isDead()) {
    $hunter->resetDodge();


    switch ($line) {
        case 'r':
            $hunter->rest;
            break;
        case 'a':
            echo '-Vous avez infliger ' . $monster->attack($hunter) . ' Dégats au ' . $monster->getName() . "\n\n";
            break;
        case 'c':
            if ($hunter->isTired()) {
                echo '-Vous avez infliger ' . $monster->attack($hunter, 2) . ' Dégats au ' . $monster->getName() . "\n\n";
                $hunter->setStamina();
            }else {
                echo "-Vous etes fatiquer vous ne pouvez pas attaquer\n\n";
            }
            break;
        case 'p':
            $hunter->takePotion();
            break;
    }

    if (rand(0, 100) <= 35 && $line != 'c' && $attack) {
        echo "-Vous avez esquiver son attaque \n\n";
    } else {
        echo '-Le ' . $monster->getName() . ' vous inflige ' . $hunter->attack($monster) . " Dégats \n\n";
    }

    if ($hunter->isDead()) {
        echo "Vous etes tombé dans les pommes et rammener au camps , retenter votre chance la prochaine fois. \n";
        break;
    }

    $attack = $monster->isAttack();
    echo "==================================================\n";
    echo 'HP : ' . $hunter->getLife() . ' / '. $hunter->maxLife . "\t STAMINA : " . $hunter->getStamina() . ' / '. $hunter->maxStamina .  "\t POTIONS : " . $hunter->getPotions() . "\n";
    echo "==================================================\n";
    echo "Que souhaitez vous faire \n p -- Prendre une potions(gain de 50hp) \n r -- se Reposer(gain de 30 de stamina) \n a -- Attaquer \n c -- Attaque charger (2x plus de dégat mais consome 15 de stamina et impossible d'esquiver) \n\n";
    $line = readline();
    echo "\n\n";
}

if ($monster->isDead() && !$hunter->isDead()) {
    echo 'Bravo vous avez vaincu le ' . $monster->getName() . ' Rentrez vite au village pour annoncer la nouvelle';
}