<?php
include('header.php');

?>
 <!-- account page -->
 <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/banner.jpg" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="reg()">Register</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm" method="post">
                            <input type="text" name="login_username" id="login_username" placeholder="Username"> 
                            <br> <span class="field_error" id="login_username_error"></span>
                            <input type="password"   name="login_password" id="login_password" placeholder="password">
                            <br> <span class="field_error" id="login_password_error"></span>
                            <button type="button" onclick="userLogin()" class="btn">Login</button>
                          
                            <p class="field_error login_msg"></p>
                        </form>
                        <form id="RegForm"  method="post">
                            <input type="text"  name="reg_username" id="reg_username" placeholder="Username">
                            <br> <span class="field_error" id="reg_username_error"></span>
                            <input type="email"  name="reg_email" id="reg_email" placeholder="Email">
                            <br> <span class="field_error" id="reg_email_error"></span>
                            <input type="password" name="reg_password" id="reg_password" placeholder="password">
                            <br> <span class="field_error" id="reg_password_error"></span>
                            <button type="button" onclick="userReg()" class="btn">Register</button>
                            <p class="field_error register_msg"></p>
                        </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include('footer.php');
?>