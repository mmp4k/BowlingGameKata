<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $game;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->game = new \App\Game();
    }

    /**
     * @Given /^In move user shot "([^"]*)" pins$/
     */
    public function inMoveUserShotPins(int $shotPins)
    {
        $bowlingBall = new \App\BowlingBall();
        $bowlingBall->shotPins($shotPins);
        $move = new \App\Move($this->game->currentFrame());
        $move->roll($bowlingBall);
        $this->game->currentFrame()->shootsPins($move);
    }

    /**
     * @Then /^The score is "([^"]*)"$/
     */
    public function theScoreIs(int $score)
    {
        assert($score === $this->game->score(), 'Result is ' . $this->game->score() . ', should be ' . $score);
    }

    /**
     * @Given /^The frame is "([^"]*)"$/
     */
    public function theFrameIs(int $frame)
    {
        assert($frame === $this->game->currentFrame()->getId(), 'Result is ' . $this->game->currentFrame()->getId() . ', should be ' . $frame);
    }

    /**
     * @When /^In two moves user shot spare$/
     */
    public function inTwoMovesUserShotSpare()
    {
        $this->inMoveUserShotPins(5);
        $this->inMoveUserShotPins(5);
    }

    /**
     * @When /^In one move user shot strike$/
     */
    public function inOneMoveUserShotStrike()
    {
        $this->inMoveUserShotPins(10);
    }
}
