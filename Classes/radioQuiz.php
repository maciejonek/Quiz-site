<?php

namespace Classes;

class radioQuiz
{
    public $question,$correctAnswer,$answer1,$answer2,$answer3,$answer4;
    public $questionType = 1;
    /**
     * @param $question
     * @param $correctAnswer
     */
    public function __construct($question, $correctAnswer)
    {
        $this->question = $question;
        $this->correctAnswer = $correctAnswer;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getCorrectAnswer()
    {
        return $this->correctAnswer;
    }

    /**
     * @param mixed $correctAnswer
     */
    public function setCorrectAnswer($correctAnswer)
    {
        $this->correctAnswer = $correctAnswer;
    }

    /**
     * @return mixed
     */
    public function getAnswer1()
    {
        return $this->answer1;
    }

    /**
     * @param mixed $answer1
     */
    public function setAnswer1($answer1)
    {
        $this->answer1 = $answer1;
    }

    /**
     * @return mixed
     */
    public function getAnswer2()
    {
        return $this->answer2;
    }

    /**
     * @param mixed $answer2
     */
    public function setAnswer2($answer2)
    {
        $this->answer2 = $answer2;
    }

    /**
     * @return mixed
     */
    public function getAnswer3()
    {
        return $this->answer3;
    }

    /**
     * @param mixed $answer3
     */
    public function setAnswer3($answer3)
    {
        $this->answer3 = $answer3;
    }

    /**
     * @return mixed
     */
    public function getAnswer4()
    {
        return $this->answer4;
    }

    /**
     * @param mixed $answer4
     */
    public function setAnswer4($answer4)
    {
        $this->answer4 = $answer4;
    }


}