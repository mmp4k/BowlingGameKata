<?php

declare(strict_types=1);

namespace App;

class Move
{
    /**
     * @var Game
     */
    private $frame;
    private $shotPins;

    public function __construct(Frame $frame)
    {
        $this->frame = $frame;
    }

    public function roll(BowlingBall $bowlingBall) : void
    {
        /** @var Frame $frame */
        $frame = $this->frame;

        $this->shotPins = $bowlingBall->getShotPins();
    }

    public function countShotPins() : int
    {
        return $this->shotPins;
    }
}
