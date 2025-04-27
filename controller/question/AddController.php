<?php
include '../../services/QuestionService.php';
include '../../database/Database.php';
include '../../model/Question.php';

use model\Question;
use services\QuestionService;


$studentId = (int) $_POST['userId'];
$postId = (int) $_POST['postId'];
$createdAt = new DateTime();
$updatedAt = new DateTime();
$content = $_POST['content'] ?? "";
$likes = 0;


$question = $_POST['name'] ?? "";

$question = new Question();
$question = $question->init(null, null ,$studentId, $postId, $createdAt, $updatedAt, $content, $likes);

$questionService = new QuestionService();
$response = $questionService->insertQuestion($question);


header("Location: /student_so/view/post/post_detail.php?id=" . $postId);
exit();
?>
