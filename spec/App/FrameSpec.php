<?php

namespace spec\App;

use App\Frame;
use App\Game;
use App\Move;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FrameSpec extends ObjectBehavior
{
    function it_is_initializable(Game $game)
    {
        $this->beConstructedWith($game, 1);
        $this->shouldHaveType(Frame::class);
    }

    function it_should_store_information_about_available_pins(Game $game)
    {
        $this->beConstructedWith($game, 1);
        $this->countAvailablePins()->shouldBeEqualTo(10);
    }

    function it_should_store_information_about_available_moves(Game $game)
    {
        $this->beConstructedWith($game, 1);
        $this->countAvailableMoves()->shouldBeEqualTo(2);
    }

    function it_shoots_pins(Game $game, Move $move)
    {
        $move->countShotPins()->willReturn(3);
        $this->beConstructedWith($game, 1);
        $this->shootsPins($move);
        $this->countAvailablePins()->shouldBeEqualTo(7);
        $this->countAvailableMoves()->shouldBeEqualTo(1);
    }
}
