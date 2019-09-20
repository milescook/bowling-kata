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
        $this->throwOneScore = $this->parseScore($throwOne);
        $this->throwTwoScore = $this->parseScore($throwTwo);
    }

    public function parseScore($score)
    {
        if($score == "X")
            return 10;
            
        return (int) $score;
    }
    public function getScoreForFirstThrow()
    {
        return $this->throwOneScore;
    }

    public function getScoreForSecondThrow()
    {
        return $this->throwTwoScore;
    }

    public function getTotalScore()
    {
        return $this->throwOneScore + $this->throwTwoScore;
    }



}
