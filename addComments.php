<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/Comments.php";

$input = json_decode(file_get_contents('php://input'), true);
$comment_content = $input['comment_content'];
$comment_rate = $input['comment_rate'];
$product_id = $input['product_id'];
$name_comment = $input['name_comment'];

$listcomment = new Comments();
$listcomment->addComment($comment_content,$comment_rate,$product_id,$name_comment);
$item = $listcomment->getCommentRate($product_id);

echo json_encode($item);
