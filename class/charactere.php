<?php

Class Charactere
{

    private $name;

    private $life;

    public $maxLife;

    private $stamina;

    public $maxStamina;

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
        $this->dodge = false;
    }

    public function getLife()
    {
        return $this->life;
    }

    public function getStamina()
    {
        return $this->stamina;
    }

    public function getPotions()
    {
        return $this->potions;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDodge()
    {
        return $this->dodge;
    }

    public function setLife($life)
    {
        $this->life = $life;
    }

    public function setStamina()
    {
        $this->stamina -= 15;
    }

    public function resetDodge()
    {
        $this->dodge = false;
    }

    public function eat($lifeBonus, $staminaBonus)
    {
        $this->life += $lifeBonus;
        $this->maxLife += $lifeBonus;
        $this->stamina += $staminaBonus;
        $this->maxStamina += $staminaBonus;
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
            echo "Vous avez etez soigné\n";
        }else {
            echo "vous n'avez plus de potions\n";
        }
    }

    public function rest()
    {
        if ($this->stamina >= $this->maxStamina - 30) {
            $this->stamina = $this->maxStamina;
        } else {
            $this->stamina += 30;
        }
        echo "vous vous etes reposer\n";
    }

    public function isTired()
    {
        return !($this->stamina <= 0);
    }

    public function wantToDodge()
    {
        $this->dodge = true;
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