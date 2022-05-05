<?php
include('header.php');


//check if field is empty and redirect them to form html page
if((!$_POST['topic_owner']) || (!$_POST['topic_title']) || (!$_POST['post_text'])){
    header("Location: addtopic.html");
    exit;
}
//create safe values to input them in database
$clean_topic_owner = mysqli_real_escape_string($conn, $_POST['topic_owner']);
$clean_topic_title = mysqli_real_escape_string($conn, $_POST['topic_title']);
$clean_post_text = mysqli_real_escape_string($conn, $_POST['post_text']);
$category_id =  mysqli_real_escape_string($conn, $_POST['category_id']);
//now insert the clean data into the tables
$add_topic_sql = "INSERT INTO forum_topics(category_id,topic_title, topic_create_time, topic_owner) VALUES ('$category_id', '$clean_topic_title', now(),  '$clean_topic_owner')";
$add_topic_res = mysqli_query($conn, $add_topic_sql)
                    or die(mysqli_error($conn));
//get id for the query u did on topic table 
$topic_id = mysqli_insert_id($conn);
$add_post_sql = "INSERT INTO forum_posts(topic_id, post_text, post_create_time, post_owner) VALUES ('$topic_id', '$clean_post_text', now(), '$clean_topic_owner')";  
$add_post_res = mysqli_query($conn, $add_post_sql)
                or die(mysqli_error($conn));
//close the sql connection

mysqli_close($conn);
//display message for the user
$msg = "<p> The <strong>" . $_POST['topic_title'] . "</strong>" . " which says "  . $_POST['post_text'] . " has been created by "   . $_POST['topic_owner'] . "</p>";    
?>

    <h1>New topic added</h1>
    <?php echo $msg;?>
    <a href="home.php?category_id=<?php echo $category_id;?>">View All topics</a>
