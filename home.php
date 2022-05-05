<?php
require('header.php');         
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Topics in my forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js">
    <style>
        table{
            border:1px solid black;
            border-collapse:collapse;

        }
        th{
            border:1px solid black;
            padding:6px;
            font-weight:bold;
            background:#ccc;
        }
        td{
            border:1px solid black;
            padding: 6px;
            vertical-align:top;
            text-transform:capitalize;
        }
        .post_count{
            text-align:center;
        }
        aside.left-panel {
    background: #fff;
    height: 100vh;
    padding: 0;
    vertical-align: top;
    width: 280px;
    -webkit-box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
    box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
    flex-basis:30%;
}

aside.left-panel:hover {
    overflow-x: scroll
}

.open aside.left-panel:hover {
    overflow-x: inherit
}
.container{
    max-width:1280px;
  
}
.row{
    display:flex;
    height:100%;
    justify-content:space-around;
}

.main{
    flex-basis:50%;
    height: 100vh;
    
}
.sidebar{
    flex-basis: 10%;
    height: 100vh;
}
.box{
    height :200px;
    border:1px solid rgba(0,0,0,0.2);
    box-shadow: 2px 2px 10px 0px rgba(0,0,0,0.2);
  
 
    margin-bottom: 20px;
    height: auto;
    padding: 10px 20px;
    border-radius:10px;
}
.left-panel .navbar {
    background: #fff;
    border-radius: 0;
    border: none;
    display: inline-block;
    margin: 0;
    padding: 0;
    vertical-align: top
}

.left-panel .navbar .main-menu {
    float: left;
    padding: 0;
    padding-bottom: 50px
}

.left-panel .navbar .menu-title, h3 {
    color: #41434d;
    clear: both;
    display: block;
    font-family: open sans;
    font-size: 14px;
    font-weight: 700;
    line-height: 50px;
    padding: 0;
    text-transform: uppercase;
    width: 100%;

}

.left-panel .navbar .navbar-nav {
    float: none;
    position: relative
}

.left-panel .navbar .navbar-nav>li {
    padding-left: 18px;
    padding-right: 30px;
 
    text-transform: capitalize;
}

.left-panel.navbar .navbar-nav>li.active {
    background: #fafafa
}

.left-panel.navbar .navbar-nav li {
    width: 100%
}

.left-panel.navbar .navbar-nav li.active .menu-icon,
.left-panel.navbar .navbar-nav li:hover .toggle_nav_button:before,
.left-panel.navbar .navbar-nav li .toggle_nav_button.nav-open:before {
    color: #03a9f3
}

.left-panel.navbar .navbar-nav li .dropdown-toggle:after {
    display: none
}

.left-panel a , .sidebar a{
    background: 0 0!important;
    color: #607d8b;
    display: inline-block;
    font-size: 14px;
    line-height: 26px;
    padding: 10px 0;
    position: relative;
    
}

.left-panel.navbar .navbar-nav li>a:hover,
.left-panel.navbar .navbar-nav li>a:hover .menu-icon {
    color: #03a9f3
}



.left-panel.navbar .navbar-nav li>a .menu-title-text {
    font-size: 14px
}

.left-panel.navbar .navbar-nav li>a .badge {
    border-radius: 0;
    font-weight: 600;
    float: right;
    margin: 6px 0 0;
    padding: .4em .5em
}

.left-panel.navbar .navbar-nav li.menu-item-has-children {
    position: relative
}

.left-panel.navbar .navbar-nav li.menu-item-has-children a {
    line-height: 30px
}

.left-panel.navbar .navbar-nav li.menu-item-has-children a:before {
    content: "";
    position: absolute;
    top: 23px;
    right: 0;
    width: 8px;
    height: 8px;
    border-style: solid;
    border-width: 1px;
    border-color: #607d8b #607d8b transparent transparent;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    -webkit-transition: all .25s ease;
    transition: all .25s ease
}

.left-panel.navbar .navbar-nav li.menu-item-has-children a:hover:before {
    border-color: #03a9f3 #03a9f3 transparent transparent
}

.left-panel.navbar .navbar-nav li.menu-item-has-children .sub-menu {
    background: #fff;
    border: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    overflow-y: hidden;
    padding: 0 0 0 35px
}

.left-panel.navbar .navbar-nav li.menu-item-has-children .sub-menu li {
    position: relative
}

.left-panel.navbar .navbar-nav li.menu-item-has-children .sub-menu i {
    color: #c8c9ce;
    float: left;
    padding: 0;
    position: absolute;
    left: 0;
    font-size: 14px;
    top: 9px
}

.left-panel.navbar .navbar-nav li.menu-item-has-children .sub-menu a {
    padding: 2px 0 2px 30px
}

.left-panel.navbar .navbar-nav li.menu-item-has-children .sub-menu a:before {
    content: '';
    display: none
}

.left-panel.navbar .navbar-nav li.menu-item-has-children .sub-menu a .menu-icon {
    top: 13px;
    text-align: left;
    width: 25px
}

.left-panel.navbar .navbar-nav li.menu-item-has-children.show a:before {
    border-color: transparent #607d8b #607d8b transparent;
    top: 20px;
    right: -5px
}

.left-panel.navbar .navbar-nav li.menu-item-has-children.show a:hover:before {
    border-color: transparent #03a9f3 #03a9f3 transparent
}

.left-panel .navbar .navbar-nav li.menu-item-has-children.show .sub-menu {
    max-height: 1000px;
    opacity: 1;
    position: static!important
}

.left-panel.navbar .navbar-nav>.active>a,
.left-panel.navbar .navbar-nav>.active>a:focus,
.left-panel.navbar .navbar-nav>.active>a:hover {
    color: #03a9f3
}
h1{
    text-align:center;
    margin-top: 20px;
    font-size: 25px;
    font-weight: normal;
    margin-bottom: 10px;
}
h2{
    font-size: 20px;
    font-weight: normal;
    margin-bottom: 10px;
    text-transform:capitalize;
}
.open .navbar .navbar-brand.hidden {
    display: block
}
li{
    list-style:none;
}
.logo img{
    width: 125px;
  
}
.home_navbar{
    display: flex;
    padding: 20px;
    align-items: center;
}
.home_navbar nav{
    flex: 1;
    text-align: right;
}
.home_navbar nav ul{
    list-style: none;
    display: inline-block;
}
.home_navbar nav ul li{
    display: inline-block;
    margin-right:20px ;
}
.home_navbar nav ul li a{
    color: #555;
}
p{
    color: #555;
}
.container{
    max-height: 1400px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}
.header{
    background: radial-gradient(#fff,#ff543b );
}

    </style>
</head>
<body>
  <div class="container">
 
 <div class="row">
     <div class="sidebar">
         <?php
         $sql = "SELECT * FROM `forum_category`";
         $res = mysqli_query($conn, $sql)
                 or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
         
         if(mysqli_num_rows($res)<0){
             echo 'no houses found in database';
         }else{?>
         <h3>Category List</h3>
         <ul>
             <?php
       
             while($row = mysqli_fetch_array($res)){
             $category_id =  $row['category_id'];
             $category_name =  $row['category_name'];
             
             echo "<li><a href='home.php?category_id=".$category_id. "'>" . $category_name ." </a></li>";
         
         }
         echo "<p>Would u like to <a href='addcategory.php'>Add a Category</a>?</p>" ;
        }	 
         ?>
           </ul>
     </div>
     <?php if(isset($_GET['category_id'])){
         $category_id = mysqli_real_escape_string($conn, $_GET['category_id']); 
         ?>
 <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Topic list</li>
                  <?php
                  $sql = "SELECT category_id, topic_id, topic_title, DATE_FORMAT(topic_create_time,'%b %e %Y at %r') AS topic_create_time , topic_owner FROM forum_topics WHERE category_id = '$category_id' ORDER BY topic_create_time DESC";
                  $res = mysqli_query($conn, $sql)
                          or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                  
                  if(mysqli_num_rows($res)<0){
                      echo 'no topics found in database';
                  }else{
                      while($row = mysqli_fetch_array($res)){
                      $id =  $row['topic_id'];
                      $topic_title =  $row['topic_title'];
                      $topic_create_time =  $row['topic_create_time'];
                      $topic_owner = $row['topic_owner'];
                      ?>
                
                  <li class="menu-item-has-children dropdown">
                     <a href="home.php?category_id=<?php echo $category_id ;?>&id=<?php echo $id ;?>" > <?php echo $topic_title ;?></a>
                  </li>
                  <?php
                }
                } 
                echo "<p>Would u like to <a href='addtopicform.php?category_id=".$category_id."'>Add a topic</a>?</p>" ;
                echo "<p> <a href='index.php'>Go main page</a></p>";

                  ?>
				  
               </ul>
            </div>
         </nav>
      </aside>
      <div class="main">
      <h1>Discussion forum</h1>
      <?php 
      if(isset($_GET['id'])){
          $id = mysqli_real_escape_string($conn, $_GET['id']);
         
          $select_sql = "SELECT * FROM `forum_posts` INNER JOIN forum_topics ON forum_topics.topic_id = forum_posts.topic_id WHERE forum_posts.topic_id = '$id'";
          $select_res = mysqli_query($conn, $select_sql)
                  or trigger_error("Query Failed! SQL: $select_sql - Error: ".mysqli_error($conn), E_USER_ERROR);
         
          if(mysqli_num_rows($select_res)<0){
              echo 'no topics found in database';
          }else{
              while($row = mysqli_fetch_array($select_res)){
                
                $post_id =  $row['post_id'];
                $topic_id =  $row['topic_id'];
                $topic_title =  $row['topic_title'];
              $post_text =  $row['post_text'];
              $post_create_time =  $row['post_create_time'];
              $post_owner = $row['post_owner'];?>
              <div class="box">
              <h2><?php echo $topic_title; ?></h2>
              <p>By <?php echo $post_owner .' ~ '. $post_create_time ?> </p>
              <p><?php echo $post_text; ?></p>
              <span><a href="replytopost.php?category_id=<?php echo $category_id ;?>&post_id=<?php echo $post_id ;?>">Reply</a></span>
              </div>
           <?php   }
            }
              
      }
      ?>
      </div>
 </div>

  </div>
   <?php
   }// end of if isset get category id ?>
    
</body>
</html>