<?php

namespace spec\ValueObjects;

use ValueObjects\ThrowScoreCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ThrowScoreCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ThrowScoreCollection::class);
    }

    function it_can_add_scores()
    {
        $this->addRoundScore(1,2,5);
        $this->getTotalScoreForRound(1)->shouldReturn(7);
    }

    function it_can_be_instantiation_from_an_array()
    {
        $scoresArray = 
        [
            1 => [1=>1,2=>1],
            2 => [1=>10],
            3 => [1=>1,2=>1],
            4 => [1=>1,2=>1],
            5 => [1=>1,2=>1],
            6 => [1=>1,2=>1],
            7 => [1=>1,2=>1],
            8 => [1=>1,2=>1],
            9 => [1=>1,2=>1],
            10 => [1=>1,2=>1]
        ];

        $this->beConstructedWith($scoresArray);
        $this->getTotalThrows()->shouldReturn(10);
    }
}
