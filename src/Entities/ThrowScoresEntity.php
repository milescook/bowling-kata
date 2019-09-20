<?php
namespace Entities;
use ValueObjects\ThrowScore;

class ThrowScoresEntity
{
    var $ScoresCollection = [];
    private $scoreString;

    public function __construct(array $scores=[])
    {
        foreach($scores as $roundNumber=>$scores)
        {
            if(isset($scores[2]))
                $this->addRoundScore($roundNumber, $scores[1], $scores[2]);
            else
                $this->addRoundScore($roundNumber, $scores[1]);
        }
    }

    public function addRoundScore($roundNumber, $throwScoreOne, $throwScoreTwo=null)
    {
        $this->ScoresCollection[$roundNumber] = new ThrowScore($throwScoreOne,$throwScoreTwo);
    }

    public function getTotalScoreForRound($roundNumber)
    {
        return $this->ScoresCollection[$roundNumber]->getTotalScore();
    }

    public function getTotalThrows()
    {
        return count($this->ScoresCollection);
    }

    public function getTotalScore()
    {
        $totalScore = 0;
        $lastRoundWasStrike = false;

        foreach($this->ScoresCollection as $round=>$ThrowScore)
        {
            if($ThrowScore->getScoreForFirstThrow()==10)
            {
                $totalFrameScore=10;                
                $lastRoundWasStrike = true;
            }
            else
            {
                $totalFrameScore = 0;
                
                $totalFrameScore += $ThrowScore->getScoreForFirstThrow();
                $totalFrameScore += $ThrowScore->getScoreForSecondThrow();
                
                if($lastRoundWasStrike)
                {
                    $totalFrameScore += $ThrowScore->getTotalScore();
                }
                $lastRoundWasStrike = false;
            }
            $totalScore += $totalFrameScore;
        }

        return $totalScore;
    }
}
