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

    public function getName()
    {
        return $this->name;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function setLife($life)
    {
        $this->life = $life;
    }

    public function getLife()
    {
        return $this->life;
    }

    public function isAttack()
    {
        if (rand(0, 100) >= 15) {
            if ($this->setAttack() == 'small') {
                echo '-Le ' . $this->getName() . " vous attaque\n\n";
            } else {
                echo '-ATTENTION, le ' . $this->getName() . " vous attaque\n\n";
            }
            return true;
        } else {
            echo "-Le " . $this->getName() . " n'attaque pas pour l'instant mais rester sur vos gardes\n\n";
            return false;
        }
    }

    public function setAttack()
    {
        if (rand(0, 100) >= 20) {
            $this->attack = $this->smallAttack;
            return 'small';
        } else {
            $this->attack = $this->bigAttack;
            return 'big';
        }
    }

    public function attack($striker, $chargeAttack = 1)
    {
        $this->life -= $striker->getAttack() * $chargeAttack;
        return $striker->getAttack() * $chargeAttack;
    }

    public function isDead()
    {
        return $this->life <= 0;
    }
}