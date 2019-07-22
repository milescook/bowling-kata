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

    function it_gets_scores_from_string()
    {
        $this->beConstructedWith("1/1 X 1/1 1/1 1/1 1/1 1/1 1/1 1/1 1/1");
        $expectedResult = 
        [
            1 => [1=>"1",2=>"1"],
            2 => [1=>"X"],
            3 => [1=>"1",2=>"1"],
            4 => [1=>"1",2=>"1"],
            5 => [1=>"1",2=>"1"],
            6 => [1=>"1",2=>"1"],
            7 => [1=>"1",2=>"1"],
            8 => [1=>"1",2=>"1"],
            9 => [1=>"1",2=>"1"],
            10 => [1=>"1",2=>"1"]
        ];
        $this->getScoresAsArray()->shouldReturn($expectedResult);
    }
}
