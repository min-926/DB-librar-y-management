<?php
// Define the missing functions
function phoneNumber() {
    return '123-456-7890';  // Replace with actual phone number or dynamic data
}

function email() {
    return 'contact@example.com';  // Replace with actual email address or dynamic data
}

function address() {
    return '123 Library Street, City, Country';  // Replace with actual address or dynamic data
}

include('header.php'); // Include header

?>
<div class="container">
    <div class="margin-top">
        <div class="row">
            <?php include('head.php'); // Include head ?>

            <div class="col-main">
                <div class="cms">
                    <div class="loader_success"></div>
                    <div class="contact_add" style="float: right">
                        <h2>Other Ways to Contact Us</h2>
                        <?php if(phoneNumber()) { ?>
                            <p><strong>Phone Number: </strong><?php echo phoneNumber(); ?></p>
                        <?php } ?>
                        <?php if(email()) { ?>
                            <p><strong>Email Address: </strong><?php echo email(); ?></p>
                        <?php } ?>
                        <?php if(address()) { ?>
                            <p><strong>Address: </strong><?php echo address(); ?></p>
                        <?php } ?>
                    </div>

                    <input type="hidden" class="emailaddress_admin" value="<?php echo email(); ?>" />
                    <div class="loader_mail" style="position: absolute;">Sending the Email. Please Wait...</div>

                    <div class="ContactForm">
                        <div class="personal_info">
                            <form method="POST" action="send_email.php">
                                <p>
                                    <label>First Name: </label><br />
                                    <input type="text" name="fname" class="fname email_text" required />
                                </p>
                                <p>
                                    <label>Last Name: </label><br />
                                    <input type="text" name="lname" class="lname email_text" required />
                                </p>
                                <p>
                                    <label>Your Email Address: </label><br />
                                    <input type="email" name="email" class="email email_text" required />
                                </p>
                                <p>
                                    <label>Message: </label><br />
                                    <textarea name="message" class="message" style="width: 580px; height: 225px;" required></textarea>
                                </p>
                                <p>
                                    <br />
                                    <button class="send" type="submit"><span>Send</span></button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include('footer.php'); // Include footer ?>
