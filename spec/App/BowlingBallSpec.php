<?php

namespace spec\App;

use App\BowlingBall;
use App\Game;
use App\Move;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingBallSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BowlingBall::class);
    }
}
