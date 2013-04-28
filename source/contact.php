
<?php

// Set email variables
$email_to = 'awarenessdrive@gmail.com';
$email_subject = 'Form submission';

// Set required fields
$required_fields = array('fullname','email','comment');

// set error messages
$error_messages = array(
	'fullname' => 'Please enter a Name to continue.',
	'email' => 'Please enter a valid Email Address to continue.',
	'comment' => 'Please enter your Message to continue.'
);

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();

// check form submittal
if(!empty($_POST)) {
	// Sanitise POST array
	foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));
	
	// Loop into required fields and make sure they match our needs
	foreach($required_fields as $field) {		
		// the field has been submitted?
		if(!array_key_exists($field, $_POST)) array_push($validation, $field);
		
		// check there is information in the field?
		if($_POST[$field] == '') array_push($validation, $field);
		
		// validate the email address supplied
		if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
	}
	
	// basic validation result
	if(count($validation) == 0) {
		// Prepare our content string
		$email_content = 'New Website Comment: ' . "\n\n";
		
		// simple email content
		foreach($_POST as $key => $value) {
			if($key != 'submit') $email_content .= $key . ': ' . $value . "\n";
		}
		
		// if validation passed ok then send the email
		mail($email_to, $email_subject, $email_content);
		
		// Update form switch
		$form_complete = TRUE;
	}
}

function validate_email_address($email = FALSE) {
	return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}

?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.0/mootools-yui-compressed.js"></script>
    
<script type="text/javascript" src="validation.js"></script>
	<script type="text/javascript">
var nameError = '<?php echo $error_messages['fullname']; ?>';
		var emailError = '<?php echo $error_messages['email']; ?>';
		var commentError = '<?php echo $error_messages['comment']; ?>';
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
    </script>


<div class="contactWrapper">
<div id="formWrap">

    <div id="form">
    <?php if($form_complete === FALSE): ?>
 <form action="contact.php" method="post" id="comments_form">
    	<div class="row">
            <div class="label">Your name</div>
            <div class="input">
            <input type="text" id="fullname" class="detail" name="fullname" value"<?php echo isset($_POST['fullname'])? $_POST['fullname'] : ''; ?>" /><?php if(in_array('fullname', $validation)): ?><span class="error"><?php echo $error_messages['fullname']; ?></span><?php endif; ?>
            </div>
            <div class="context">e.g. John Smith or Jane Doe</div>
        </div>
        
            <div class="row">
            <div class="label">Your Email Address</div>
            <div class="input">
            <input type="text" id="email" class="detail" name="email" value"<?php echo isset($_POST['email'])? $_POST['email'] : ''; ?>" /><?php if(in_array('email', $validation)): ?><span class="error"><?php echo $error_messages['email']; ?></span><?php endif; ?>
            </div>
            <div class="context">We will not share your email or spam you with messages</div>
        </div>
        
            <div class="row">
            <div class="label">Your message</div>
            <div class="input">
            <textarea id="comment" name="comment" class="mess"><?php echo isset($_POST['comment'])? $_POST['comment'] : ''; ?></textarea> <?php if(in_array('comment', $validation)): ?><span class="error"><?php echo $error_messages['comment']; ?></span><?php endif; ?>
            </div>
        </div>
        
        <div class="submit">
        
        <input type="submit" id="submit" name="submit" value="Send Message" />
        
        </div>
        </form>
        <?php else: ?>
<h2>Thank you for your Message!</h2>
Return to <a href="index.html">Home Page</a>
<?php endif; ?>
    </div>
</div>
<div class="info">

<h2>We would love to hear from you</h2>
We are continually exploring what we can do to better help all who suffer in the social intersections of our world.
<br/><br/>
<h4>Let us know of:</h4>

<ul>
<li>Areas where you'd like to use our programs or perhaps develop new programs</li>

<br/>


<li>Similar work you or others are doing that we can link to from our website and share the experience.</li>


<br/>

<li>Stories of success in helping build the supportive culture we all crave.
Challenges we've not addressed here (yet) that we can help you or others.</li>
</ul>

<br/>
<br/>

<h4>Contact Information</h4>
<ul>
	<li>Email Address: <span class="redLink">AwarenessDrive@gmail.com</span>				    </li>
    
    <br/>
    
    <li>Personal Email Address: <span class="redLink">Richard.goode-allen@colorado.edu</span></li>
</ul>

</div>
<br/>
</div>


