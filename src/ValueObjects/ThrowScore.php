<?php
namespace ValueObjects;

class ThrowScore
{
    var $throwOneScore;
    var $throwTwoScore;

    public function __construct($throwOneScore=null,$throwTwoScore=null)
    {
        $this->addScore($throwOneScore,$throwTwoScore);
    }

    public function addScore($throwOne, $throwTwo)
    {
        $this->throwOneScore = $throwOne;
        $this->throwTwoScore = $throwTwo;
    }

    public function getTotalScore()
    {
        return $this->throwOneScore + $this->throwTwoScore;
    }



}
