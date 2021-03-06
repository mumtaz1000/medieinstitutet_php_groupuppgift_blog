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
        $statement = $this->pdo->prepare("SELECT * FROM posts
        WHERE Post_id=(SELECT MAX(Post_id) FROM posts)");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllPosts()
    {
        $statement = $this->pdo->prepare("SELECT * FROM posts ORDER  BY Post_id DESC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addPost($post, $image)
    {
        session_start();
        $upload_dir = "../images/";
        $target_file = $upload_dir . basename($image['postImage']['name']);

        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST['submit'])) {
            $check = getimagesize($image['postImage']['tmp_name']);
            if ($check == false) {
                echo "The file is not image";
                die;
            }
        }
        if (file_exists($target_file)) {
            echo "The file already exists!";
            die;
        }
        if ($image['postImage']['size'] > 1000000) {
            echo "The file is too big!";
            die;
        }
        if ($fileType != "png" && $fileType != "gif" && $fileType != "jpg" && $fileType != "jpeg") {
            echo "You can only upload PNG, GIF, JPG or JPEG.";
            die;
        }
        if (move_uploaded_file($image['postImage']['tmp_name'], $target_file)) {
            echo $target_file;
        } else {
            echo "Something goes wrong!";
            die;
        }
        $statement = $this->pdo->prepare("INSERT INTO posts(Post_title, Post_description, POST_category, Post_date, Post_User_Id, Post_image) VALUES (:title_IN,:description_IN,:category_IN,:date_IN,:userId_IN,:image_IN)");
        $statement->bindParam(":title_IN", $post['postTitle']);
        $statement->bindParam(":description_IN", $post['postDescription']);
        $statement->bindParam(":category_IN", $post['postCategory']);
        $postDate = date('Y-m-d H:i:s');
        $statement->bindParam(":date_IN", $postDate);
        $statement->bindParam(":userId_IN", $_SESSION['User_id']);
        $statement->bindParam(":image_IN", $target_file);
        return $statement->execute();
    }
    public function addComments($comments, $id)
    {
        session_start();
        $statement = $this->pdo->prepare("INSERT INTO comments(Comment_content, Comment_date, Comment_Post_id, Comment_User_id) VALUES (:content_IN,:date_IN,:postId_IN,:userId_IN)");
        $statement->bindParam(":content_IN", $comments['commentContent']);
        $postDate = date('Y-m-d H:i:s');
        $statement->bindParam(":date_IN", $postDate);
        $statement->bindParam(":postId_IN", $id['id']);
        $statement->bindParam(":userId_IN", $_SESSION['User_id']);
        return $statement->execute();
    }
    public function getComments($postId)
    {
        $statement = $this->pdo->prepare("SELECT * FROM comments WHERE Comment_Post_id = $postId");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePost($id)
    {
        $statement1 = $this->pdo->prepare("DELETE FROM comments WHERE Comment_Post_id = :id_IN");
        $statement1->bindParam(":id_IN", $id);
        $statement1->execute();

        $statement2 = $this->pdo->prepare("DELETE FROM posts WHERE Post_id=:id_IN");
        $statement2->bindParam(":id_IN", $id);
        $statement2->execute();
        header("location:all_post_option.php");
    }
    public function deleteComment($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM comments WHERE Comment_id = :id_IN");
        $statement->bindParam(":id_IN", $id);
        $statement->execute();
        header("location:all_post_option.php");
    }
    public function getCurrentPost($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM posts WHERE Post_id = :id_IN");
        $statement->bindParam(":id_IN", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updatePost($post, $image)
    {
        //var_dump($post);
        $statement = $this->pdo->prepare("UPDATE posts SET Post_title=:title_IN, Post_description=:description_IN, POST_category=:category_IN, Post_image=:image_IN
        WHERE Post_id = :id_IN");
        $statement->bindParam(":title_IN", $post['postTitle']);
        $statement->bindParam(":description_IN", $post['postDescription']);
        $statement->bindParam(":category_IN", $post['postCategory']);
        $statement->bindParam(":image_IN", $image);
        return $statement->execute();
    }
}
return new Connection();
