<?php
$msg= '';
include('header.php');
if(isset($_POST['submit'])){
    if((!$_POST['category_name']) || $_POST['category_name'] == ''){
       $msg = 'Category name cant be empty';
    }else{
    //create safe values to input them in database
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    //now insert the clean data into the tables
    $sql = "INSERT INTO `forum_category` ( `category_name`, `status`) VALUES ('$category_name', '1');";
    $res = mysqli_query($conn, $sql)
                        or die(mysqli_error($conn));
    //close the sql connection
    
    mysqli_close($conn);
    //display message for the user
    $msg = "<p> The <strong>" . $_POST['category_name'] . "</strong>"  . " has been created "  . "</p>";    
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Topic</title>
  
</head>

<body>
    <div class="container">
    <h1>Add a Category</h1>
    <form method="POST" action="">
        <p><label for="category_name">Category Name</label>
        <input type="text" id="category_name" name="category_name" size="40" maxlength="150" required ></p>
       
        <button type="submit" name="submit">Add Category</button>
        <span><?php echo $msg;?></span>
        <a href="home.php">Go Back</a>
    </form>
    </div>
    
</body>
</html>