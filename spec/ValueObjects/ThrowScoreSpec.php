<?php

namespace spec\ValueObjects;

use ValueObjects\ThrowScore;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ThrowScoreSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ThrowScore::class);
    }

    function it_stores_a_throw_score()
    {
        $this->addScore(5,1);
        $this->getTotalScore()->shouldReturn(6);
    }
}
