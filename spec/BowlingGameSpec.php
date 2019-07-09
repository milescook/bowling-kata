<?php

namespace spec;

use BowlingGame;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BowlingGame::class);
    }

    function it_can_be_intialised_with_a_score()
    {
        $this->beConstructedWith("X X X X X X X X X X X X X");
        $this->getScoreString()->shouldReturn("X X X X X X X X X X X X X");
    }

    function it_adds_simple_scores()
    {
        $this->beConstructedWith("1/1 2/2 1/1 1/1 1/1 1/1 1/1 1/1 1/1 1/1");
        $this->getGameScore()->shouldReturn(22);
    }

    function it_adds_simple_scores_with_a_strike()
    {
        $this->beConstructedWith("1/1 X 1/1 1/1 1/1 1/1 1/1 1/1 1/1 1/1");
        $this->getGameScore()->shouldReturn(30);
    }
}
