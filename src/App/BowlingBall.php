<?php

declare(strict_types=1);

namespace App;

class BowlingBall
{
    protected $shotPins = 0;

    public function shotPins(int $shot) : void
    {
        $this->shotPins = $shot;
    }

    public function getShotPins() : int
    {
        return $this->shotPins;
    }
}
