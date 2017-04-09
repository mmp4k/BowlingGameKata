<?php

declare(strict_types=1);

namespace App;

class Score
{
    protected $tableShoots = [];

    public function addShot(Frame $frame, int $shotPins) : void
    {
        $this->tableShoots[$frame->getId()][] = $shotPins;
    }

    public function score() : int
    {
        $score = 0;

        foreach ($this->tableShoots as $frame => $shoots) {
            if ($this->isStrike($shoots)) {
                $score += 10 + $this->nextTwoShoots($frame, $this->tableShoots);
            } else if ($this->isSpare($shoots)) {
                $score += 10 + $this->firstShootInNextFrame($frame, $this->tableShoots);
            } else {
                $score += array_sum($shoots);
            }
        }

        return $score;
    }

    protected function isStrike(array $shoots) : bool
    {
        return array_sum($shoots) === 10 && count($shoots) === 1;
    }

    protected function isSpare(array $shoots) : bool
    {
        return array_sum($shoots) === 10 && count($shoots) === 2;
    }

    protected function firstShootInNextFrame(int $frameId, array $tableShoots) : int
    {
        return isset($tableShoots[$frameId+1]) ? $tableShoots[$frameId+1][0] : 0;
    }

    protected function nextTwoShoots(int $frameId, array $tableShoots) : int
    {
        $founded = 0;
        $score = 0;
        for ($i = ($frameId + 1); $i <= Game::MAX_FRAMES; $i++) {
            for ($j = 0; $j <= Frame::MAX_MOVES; $j++) {
                if (!isset($tableShoots[$i][$j])) {
                    continue;
                }
                $score += $tableShoots[$i][$j];
                $founded++;

                if ($founded === 2) {
                    break 2;
                }
            }
        }
        return $score;
    }
}
