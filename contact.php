<?php
include('header.php');

?>

<h1 class="hdn">Contact us</h1>
        <div class="container">
            <div class="box">

                <form action="#">
                    <h2>Enquire now</h2>
                    <p>If you have any question, please leave a message.</p>
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name"><br>
                    <label for="email">Your email address:</label>
                    <input type="email" id="email" name="email"><br>
                    <label for="number">Your phone number:</label>
                    <input type="text" id="number" name="number"><br>
                    <label for="EnquiryTopic">What is your enquiry or feedback about?*</label>
                    <select name="EnquiryTopic" id="EnquiryTopic">
                        <option value="">Select</option>
                        <option value="General Enquiry">General Enquiry</option>
                        <option value="Product Quality/Product Safety">Product Quality/Product Safety</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Catalogue">Catalogue</option>
                        <option value="Careers">Careers</option>
                        <option value="Online Shopping">Online Shopping</option>
                        <option value="Rewards">Rewards</option>
                        <option value="Mobile App">Mobile App</option>
                        <option value="Something else">Something else that is not on the list</option>
                    </select> <br>
                    <label for="message">Your Message*</label>
                    <textarea id="message" name="message"></textarea>
                   
                    <input class="btn" type="button" onclick="sendMsg()" value="Submit Form">
                </form>
                <div class="map">
                    <h2>Find us</h2>
                    <p>We are located at the top of King Street, just near the Marly Hotel. Phone us on 02 9519 1234.
                    </p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.8150076915713!2d151.2041925152775!3d-33.86865812648289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae3f6e3ef5d7%3A0xebf0ac7c5ecf6239!2sKing%20St%2C%20Sydney%20NSW%202000!5e0!3m2!1sen!2sau!4v1599459505802!5m2!1sen!2sau"
                        width="400" height="250" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                    <button class="btn">Visit Us</button>
                </div>
            </div>
            </div>
    <?php
include('footer.php');
?>