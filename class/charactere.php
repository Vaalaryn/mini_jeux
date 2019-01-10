<?php

Class Charactere
{

    private $name;

    private $life;

    private $maxLife;

    private $stamina;

    private $maxStamina;

    //private $weapon;

    //private $armor;

    private $potions;

    private $dodge;

    private $attack;

    public function __construct($name, $attack)
    {
        $this->name = $name;
        $this->life = 100;
        $this->stamina = 100;
        $this->maxLife = $this->life;
        $this->maxStamina = $this->stamina;
        $this->potions = 10;
        $this->attack = $attack;
    }

    public function eat($lifeBonus, $staminaBonus)
    {
        $this->life += $lifeBonus;
        $this->stamina += $staminaBonus;
    }

    public function takePotion()
    {
        if ($this->potions > 0) {
            $this->potions -= 1;
            if ($this->life >= $this->maxLife - 50) {
                $this->life = $this->maxLife;
            } else {
                $this->life += 50;
            }
        }
    }

    public function rest()
    {
        if ($this->stamina >= $this->maxStamina - 30) {
            $this->stamina = $this->maxStamina;
        } else {
            $this->stamina += 30;
        }
    }

    public function isTired()
    {
        return $this->stamina > 0;
    }

    public function wantToDodge()
    {
        $this->dodge = true;
    }

}