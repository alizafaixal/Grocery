<?php
include('header.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Topic</title>
  
</head>

<body>
    <div class="container">
    <h1>Add a Topic</h1>
    <form method="POST" action="addtopic.php">
        <p><label for="topic_owner">Your email address</label>
        <input type="email" id="topic_owner" name="topic_owner" size="40" maxlength="150" required ></p>
        <p><label for="topic_title">Topic title: </label>
        <input type="text" id="topic_title" name="topic_title" size="40" maxlength="150" required></p>
        <p><label for="post_text">Post text: </label><br>
        <input type="hidden" name="category_id" value="<?php echo $_GET['category_id'] ?>">
        <textarea name="post_text" id="post_text" cols="40" rows="8"></textarea></p>
        <button type="submit" name="submit">Add Topic</button>
    </form>
    </div>
    
</body>
</html>