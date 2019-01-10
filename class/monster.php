<?php

Class Monster
{

    private $life;

    private $name;

    private $attack;

    private $smallAttack;

    private $bigAttack;

    //private $dodge;

    public function __construct($life, $name, $atk)
    {
        $this->life = $life;
        $this->name = $name;
        $this->smallAttack = $atk;
        $this->bigAttack = $atk * 2;
    }

    public function setAttack(){
        if (rand(0, 100) > 25) {
            $this->attack = $this->smallAttack;
            return 'small';
        }else {
            $this->attack = $this->bigAttack;
            return 'big';
        }
    }

}