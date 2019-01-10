<?php

Class Manager {

    public static function attack($target, $striker){
        $target->life -= $striker->attack;
        return $striker->attack;
    }

    public static function isDead($target)
    {
        return $target->life > 0;
    }
}