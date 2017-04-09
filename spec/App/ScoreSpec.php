<?php

namespace spec\App;

use App\Frame;
use App\Score;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ScoreSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Score::class);
    }

    function it_accepts_shoots(Frame $frame1)
    {
        $frame1->getId()->willReturn(1);

        $this->addShot($frame1, 5);
        $this->score()->shouldBe(5);
    }

    function it_add_to_shoots(Frame $frame1)
    {
        $frame1->getId()->willReturn(1);

        $this->addShot($frame1, 5);
        $this->addShot($frame1, 4);
        $this->score()->shouldBe(9);
    }

    function it_doubles_next_score_if_ten_in_one_frame(Frame $frame1, Frame $frame2)
    {
        $frame1->getId()->willReturn(1);
        $frame2->getId()->willReturn(2);

        $this->addShot($frame1, 5);
        $this->addShot($frame1, 5);
        $this->addShot($frame2, 5);
        $this->score()->shouldBe(20);
    }

    function it_doubles_two_next_score_if_ten_in_one_move(Frame $frame1, Frame $frame2)
    {
        $frame1->getId()->willReturn(1);
        $frame2->getId()->willReturn(2);

        $this->addShot($frame1, 10);
        $this->addShot($frame2, 4);
        $this->addShot($frame2, 5);
        $this->score()->shouldBe(28);
    }

    function it_doubles_two_next_score_if_ten_in_one_move_in_two_frames(Frame $frame1, Frame $frame2, Frame $frame3)
    {
        $frame1->getId()->willReturn(1);
        $frame2->getId()->willReturn(2);
        $frame3->getId()->willReturn(3);

        $this->addShot($frame1, 10);
        $this->addShot($frame2, 10);
        $this->addShot($frame3, 4);
        $this->addShot($frame3, 5);
        $this->score()->shouldBe(52);
    }

    function it_returns_300_points(Frame $frame1, Frame $frame2, Frame $frame3, Frame $frame4, Frame $frame5, Frame $frame6, Frame $frame7, Frame $frame8, Frame $frame9, Frame $frame10)
    {
        $frame1->getId()->willReturn(1);
        $frame2->getId()->willReturn(2);
        $frame3->getId()->willReturn(3);
        $frame4->getId()->willReturn(4);
        $frame5->getId()->willReturn(5);
        $frame6->getId()->willReturn(6);
        $frame7->getId()->willReturn(7);
        $frame8->getId()->willReturn(8);
        $frame9->getId()->willReturn(9);
        $frame10->getId()->willReturn(10);

        $this->addShot($frame1, 10);
        $this->addShot($frame2, 10);
        $this->addShot($frame3, 10);
        $this->addShot($frame4, 10);
        $this->addShot($frame5, 10);
        $this->addShot($frame6, 10);
        $this->addShot($frame7, 10);
        $this->addShot($frame8, 10);
        $this->addShot($frame9, 10);
        $this->addShot($frame10, 10);
        $this->addShot($frame10, 10);
        $this->addShot($frame10, 10);

        $this->score()->shouldBe(300);
    }
}
