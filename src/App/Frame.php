<?php

declare(strict_types=1);

namespace App;

class Frame
{
    const MAX_PINS = 10;
    const MAX_MOVES = 2;

    private $availablePins;
    private $availableMoves;
    private $id;

    /**
     * @var Game
     */
    private $game;

    public function __construct(Game $game, int $id)
    {
        $this->availablePins = self::MAX_PINS;
        $this->availableMoves = self::MAX_MOVES;
        $this->id = $id;
        $this->game = $game;

        if ($this->isLastFrame()) {
            $this->availableMoves = 3;
        }
    }

    public function countAvailablePins() : int
    {
        return $this->availablePins;
    }

    public function shootsPins(Move $move) : void
    {
        if ($this->availableMoves < 1) {
            throw new \DomainException("You haven't moves in this frame.");
        }

        $this->availablePins -= $move->countShotPins();
        $this->game->addPointsToScore($move->countShotPins());
        $this->availableMoves--;

        if ($move->countShotPins() === self::MAX_PINS && !$this->isLastFrame()) {
            $this->availableMoves = 0;
            return;
        }
    }

    public function countAvailableMoves() : int
    {
        return $this->availableMoves;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    protected function isLastFrame() : bool
    {
        return $this->id === Game::MAX_FRAMES;
    }

}
