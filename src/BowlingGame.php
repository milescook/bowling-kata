<?php

class BowlingGame
{
    private $scoreString = "";
    public function __construct($scoreString="")
    {
        $this->scoreString = $scoreString;
    }

    public function getScoreString()
    {
        return $this->scoreString;
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
