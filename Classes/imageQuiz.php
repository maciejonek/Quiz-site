<?php

namespace Classes;

class imageQuiz
{
    public $question,$image,$correctAnswer;
    public $questionType = 2;

    /**
     * @param $question
     * @param $image
     * @param $correctAnswer
     */
    public function __construct($question, $image, $correctAnswer)
    {
        $this->question = $question;
        $this->image = $image;
        $this->correctAnswer = $correctAnswer;
    }
}