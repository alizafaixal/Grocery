<?php
require('conn.inc.php');
include('header.php');
  $safe_post_id = mysqli_real_escape_string($conn, $_GET['post_id']);
  $category_id = mysqli_real_escape_string($conn, $_GET['category_id']);

if (!$_POST){
    if (!isset($_GET['post_id'])){
        header("Location: home.php");
        exit;
    }

  

    $verify_sql = "SELECT ft.topic_id, ft.topic_title FROM forum_posts
                    AS fp LEFT JOIN forum_topics AS ft ON fp.topic_id =
                    ft.topic_id WHERE fp.post_id = '".$safe_post_id."' ";
    $verify_res = mysqli_query($conn, $verify_sql)
        or die(mysqli_error($conn));

    if (mysqli_num_rows($verify_res) < 1){
        header('Location: home.php');
        exit;
    }else{
        while($topic_info = mysqli_fetch_array($verify_res)){
            $topic_id = $topic_info['topic_id'];
            $topic_title = stripslashes($topic_info['topic_title']);
        }

        ?>

<!DOCTYPE html>

<html>
<head>

<title>Post Your Reply in <?php echo $topic_title; ?></title>
<link rel="stylesheet" 
    media="all" href="stylesheet/style.css"/>
</head>

<body>

<h1>Post Your Reply in <?php echo $topic_title; ?></h1>

<form method="post" action="replytopost.php?category_id=<?php echo $category_id ;?>&post_id=<?php echo $topic_id ;?>">

<p><label for="post_owner">Your Email Address:</label><br/>

<input type="email" id="post_owner" name="post_owner" size="40"

maxlength="150" required="required"></p>

<p><label for="post_text">Post Text:</label><br/>

<textarea id="post_text" name="post_text" rows="8" cols="40"

required="required"></textarea></p>

<input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">

<button type="submit" name="submit" value="submit">Add Post</button>

</form>
</body>
</html>

<?php
    }
    //freeing result
    mysqli_free_result($verify_res);

    mysqli_close($conn);

}else if($_POST){
    $category_id = mysqli_real_escape_string($conn, $_GET['category_id']);
    if ((!$_POST['topic_id']) || (!$_POST['post_text']) || 
    (!$_POST['post_owner'])){
        header ("Location: home.php");
        exit;
    }
    $safe_topic_id = mysqli_real_escape_string($conn, $_POST['topic_id']);
    $safe_post_text = mysqli_real_escape_string ($conn, $_POST['post_text']);
    $safe_post_onwer = mysqli_real_escape_string($conn, $_POST['post_owner']);

    $add_post_sql = "INSERT INTO forum_posts (topic_id, post_text,
                        post_create_time, post_owner) VALUES 
                        ('".$safe_topic_id. "', '" .$safe_post_text."' ,
                        now(), '".$safe_post_onwer. "')";
                        $add_post_res = mysqli_query($conn, $add_post_sql)
                        or die(mysqli_error($conn));
   

    header ("Location: home.php?category_id=$category_id&id=$safe_topic_id");
    mysqli_close($conn);
}
?>