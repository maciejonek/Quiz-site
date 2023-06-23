<?php
function issetQuestionAndCorrectAnswer(){
    return isset($_POST['question']) && isset($_POST['correct']);
}
function answerPassed(){
    return isset($_POST['answer1']) || isset($_POST['answer2']) || isset($_POST['answer3']) || isset($_POST['answer4']);
}

if(issetQuestionAndCorrectAnswer()){
    if(answerPassed()){
        $radioQuiz = new \Classes\radioQuiz($_POST['question'],$_POST['correct']);
        if(isset($_POST['answer1'])){
            $radioQuiz -> setAnswer1($_POST['answer1']);
        }
        if(isset($_POST['answer2'])){
            $radioQuiz -> setAnswer2($_POST['answer2']);
        }
        if(isset($_POST['answer3'])){
            $radioQuiz -> setAnswer3($_POST['answer3']);
        }
        if(isset($_POST['answer4'])){
            $radioQuiz -> setAnswer4($_POST['answer4']);
        }
        $_SESSION['questions'][] = serialize($radioQuiz);
        header("Location: quizCreator.php");
        exit();
    }
}
