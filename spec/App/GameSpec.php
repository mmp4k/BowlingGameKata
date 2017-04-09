<?php

namespace spec\App;

use App\Frame;
use App\Game;
use App\Move;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Game::class);
    }

    function it_has_information_about_score()
    {
        $this->score()->shouldBeEqualTo(0);
    }

    function it_can_return_current_frame()
    {
        $this->currentFrame()->shouldBeAnInstanceOf(Frame::class);
    }

    function it_should_be_changed_after_two_moves(Move $move)
    {
        $move->countShotPins()->willReturn(3);

        /** @var Frame $frame1 */
        $frame1 = $this->currentFrame();
        $frame1->shootsPins($move);
        $this->score()->shouldBe(3);
        $frame1->shootsPins($move);
        $this->score()->shouldBe(6);
        $this->currentFrame()->shouldNotEqual($frame1);
    }
}
