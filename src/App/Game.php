<?php

declare(strict_types=1);

namespace App;

class Game
{
    const MAX_FRAMES = 10;

    protected $frames;

    protected $score;

    public function __construct()
    {
        $this->score = new Score();
        for ($i = 1; $i <= self::MAX_FRAMES; $i++) {
            $this->frames[] = new Frame($this, $i);
        }
    }

    public function score() : int
    {
        return $this->score->score();
    }

    public function addPointsToScore(int $points) : void
    {
        $this->score->addShot($this->currentFrame(), $points);
    }

    public function currentFrame() : Frame
    {
        /** @var Frame $currentFrame */
        $currentFrame = current($this->frames);

        if (!$currentFrame->countAvailableMoves()) {
            $currentFrame = next($this->frames);
        }

        return $currentFrame;
    }
}
