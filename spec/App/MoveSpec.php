<?php

namespace spec\App;

use App\BowlingBall;
use App\Frame;
use App\Game;
use App\Move;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MoveSpec extends ObjectBehavior
{
    function it_is_initializable(Frame $frame)
    {
        $this->beConstructedWith($frame);
        $this->shouldHaveType(Move::class);
    }

    function it_can_roll_balls(Frame $frame, BowlingBall $bowlingBall)
    {
        $bowlingBall->getShotPins()->willReturn(0);
        $frame->countAvailablePins()->willReturn(10);

        $this->beConstructedWith($frame);

        $this->roll($bowlingBall);
    }

    function it_tells_how_many_pins_was_shot(Frame $frame, BowlingBall $bowlingBall)
    {
        $frame->countAvailablePins()->willReturn(10);
        $bowlingBall->getShotPins()->willReturn(3);

        $this->beConstructedWith($frame);
        $this->roll($bowlingBall);
        $this->countShotPins()->shouldBeNumeric();
    }
}
