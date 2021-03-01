<?php
class Connection
{
    public $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=blogdb", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getPosts()
    {
        $statement = $this->pdo->prepare("SELECT * FROM posts ORDER BY Post_datE DESC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addPost($post)
    {
        session_start();
        $statement = $this->pdo->prepare("INSERT INTO posts(Post_title, Post_description, POST_category, Post_date, Post_User_Id) VALUES (:title_IN,:description_IN,:category_IN,:date_IN,:userId_IN)");
        $statement->bindParam(":title_IN", $post['postTitle']);
        $statement->bindParam(":description_IN", $post['postDescription']);
        $statement->bindParam(":category_IN", $post['postCategory']);
        $postDate = date('Y-m-d H:i:s');
        $statement->bindParam(":date_IN", $postDate);

        $statement->bindParam(":userId_IN", $_SESSION['User_id']);
        return $statement->execute();
    }
}
return new Connection();
