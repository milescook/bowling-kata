<?php

namespace Services;

use Entities\ThrowScoresEntity;

class BowlingGameService
{
    private $scoreString = "";
    var $ThrowScoreCollection;

    public function __construct($scoreString="")
    {
        $this->scoreString = $scoreString;
        $this->ThrowScoresEntity = new ThrowScoresEntity($this->getScoresAsArray());
    }

    public function getScoreString()
    {
        return $this->scoreString;
    }

    public function getScoresAsArray()
    {
        $scoresArray = [];
        $frame = 1;
        
        foreach(explode(" ",$this->scoreString) as $frameScore)
        {
            $throw = 1;
            foreach(explode("/",$frameScore) as $throwScore)
            {
                $scoresArray[$frame][$throw] = $throwScore;
                $throw++;
            }
            $frame++;
        }

        return $scoresArray;
    }

    public function getGameScore()
    {
        return $this->ThrowScoresEntity->getTotalScore();
    }
}
