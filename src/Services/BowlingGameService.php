<?php

namespace Services;

use ValueObjects\ThrowScoreCollection;

class BowlingGameService
{
    private $scoreString = "";
    var $ThrowScoreCollection;

    public function __construct($scoreString="")
    {
        $this->ThrowScoreCollection = new ThrowScoreCollection($this->getScoresAsArray());
        $this->scoreString = $scoreString;
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
        $totalScore = 0;
        $lastRoundWasStrike = false;

        foreach(explode(" ",$this->scoreString) as $frameScore)
        {
            if($frameScore=="X")
            {
                $totalFrameScore=10;                
                $lastRoundWasStrike = true;
            }
            else
            {
                $totalFrameScore = 0;
                foreach(explode("/",$frameScore) as $throwScore)
                {
                    $totalFrameScore += $throwScore;
                }
                if($lastRoundWasStrike)
                {
                    $totalFrameScore+=$totalFrameScore;
                }
                $lastRoundWasStrike = false;
            }
            $totalScore += $totalFrameScore;
        }

        return $totalScore;
    }
}
