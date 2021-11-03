<?php
class Comments extends Db{

    //Them comment vao database
    public function addComment($comment_content,$comment_rate, $product_id, $name_comment)
    {
        $sql = parent::$connection->prepare("INSERT INTO `comments` (`comment_content`,`comment_rate`, `product_id`,`name_comment`) VALUES (?, ?, ?, ?);");
        $sql->bind_param('siis', $comment_content, $comment_rate, $product_id, $name_comment);
        return $sql->execute();
    }

    // Lấy tát cả comment
    public function getCommentById($id)
    {
            //2. Viết câu SQL
            $sql = parent::$connection->prepare("SELECT * FROM comments WHERE 
            comments.product_id = ?");
            $sql->bind_param('i', $id);
            return parent::select($sql);
    }
    //lấy commentRate
    public function getCommentRate($id)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT comment_rate FROM comments WHERE 
        comments.product_id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

}