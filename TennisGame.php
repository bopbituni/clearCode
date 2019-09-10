<?php


const DEFAULT_SCORE_0 = 0;
const DEFAULT_SCORE_1 = 1;
const DEFAULT_SCORE_2 = 2;
const DEFAULT_SCORE_3 = 3;
const DEFAULT_SCORE_4 = 4;


class TennisGame
{
    public $score = '';

    public function getScore($player1Name, $player2Name, $player1Score, $player2Score)
    {
        $tempScore = DEFAULT_SCORE_0;

        if ($player1Score == $player2Score) {
            switch ($player1Score) {
                case DEFAULT_SCORE_0:
                    $this->score = "Love-All";
                    break;
                case DEFAULT_SCORE_1:
                    $this->score = "Fifteen-All";
                    break;
                case DEFAULT_SCORE_2:
                    $this->score = "Thirty-All";
                    break;
                case DEFAULT_SCORE_3:
                    $this->score = "Forty-All";
                    break;
                default:
                    $this->score = "Deuce";
                    break;

            }
        } else if ($player1Score >= DEFAULT_SCORE_4 || $player2Score >= DEFAULT_SCORE_4) {
            $minusResult = $player1Score - $player2Score;
            if ($minusResult == 1) $this->score = "Advantage player1";
            else if ($minusResult == -1) $this->score = "Advantage player2";
            else if ($minusResult >= 2) $this->score = "Win for player1";
            else $this->score = "Win for player2";
        } else {
            for ($i = DEFAULT_SCORE_1; $i < DEFAULT_SCORE_3; $i++) {
                if ($i == DEFAULT_SCORE_1) $tempScore = $player1Score;
                else {
                    $this->score .= "-";
                    $tempScore = $player2Score;
                }
                switch ($tempScore) {
                    case DEFAULT_SCORE_0:
                        $this->score .= "Love";
                        break;
                    case DEFAULT_SCORE_1:
                        $this->score .= "Fifteen";
                        break;
                    case DEFAULT_SCORE_2:
                        $this->score .= "Thirty";
                        break;
                    case DEFAULT_SCORE_3:
                        $this->score .= "Forty";
                        break;
                }
            }
        }
    }

    public function __toString()
    {
        return $this->score;
    }
}