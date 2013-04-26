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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="css/base_styles.css" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
<script src="js/navani.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AwarenessDrive.org - Contact</title>
<style type="text/css">
body{
	background-image:url(images/low_contrast_linen.png);	
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
.buttons {
	border:0px;
}
.information{
	position:relative;
	margin:0px auto;
	color:#FFF;
	width:720px;
	font-size:15px;	
}
.contactWrapper{
	position:relative;
	margin:100px auto;
	width:1400px;
	height:auto;	
	overflow:hidden;
}
#formWrap{
	width:720px;
	margin:5px;
	float:left;
	color:#fff;
	border:2px solid #fff;
	border-radius:10px;
	background-color:#000;
	-moz-border-radius:10px;
	-moz-box-shadow:0px 0px 10px #333333;
	text-shadow:1px 1px 1px #000;
	-webkit-text-shadow:1px 1px 1px #000;
	-moz-text-shadow:1px 1px 1px #000;
	box-shadow:0px 0px 10px #fff;
	-webkit-box-shadow: 0px 0px 15px #fff;
	-moz-box-shadow:0px 0px 15px #fff;
	padding:16px 20px 40px;
}

#formWrap #form{
	width:720px;
}

#form .row{
	border-bottom:1px dotted #eee;
	display:block;
	line-height:38px;
	overflow:auto;
	padding:24px 0px;
	width:100%;
	
}

#form .row .label{
	font-size:16px;
	font-weight:bold;
	font-family:Arial, Helvetica, sans-serif;
	width:150px;
	color:#f82639;
	text-align:right;
	float:left;
	padding-right:10px;
	margin-right:10px;
}

#form .row .input{
	float:left;
	margin-right:10px;
	width:auto;
}

.detail{
	width: 260px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:20px;
	padding: 7px 8px;
	margin:0px;	
	display:block;
}
.mess{
	width:450px;
	max-width:450px;
	height:280px;	
	overflow:auto;
	font-family:Arial, Helvetica, sans-serif;
	font-size:20px;
	padding: 7px 8px;
	line-height:1em;
	margin:0px;
	display:block;
}

#form .row .context{
	color:#999;
	font-size:11px;
	font-style:italic;
	line-height:14px;
	font-family:Arial, Helvetica, sans-serif;
	width:200px;
	float:left;	
}

#form #submit{
	font-family:Arial, Helvetica, sans-serif;
	margin-top: 25px;
	margin-left:170px;
	color:#000;
	font-size:16px;
	text-shadow:1px 1px 1px #999;
	padding:10px;
}

span.error{
	display:block;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	background-image:url(images/x.png);
	background-position: left 6px;
	background-repeat: no-repeat;
	color:#F82639;
	padding-left:30px;
}

.info{
	position:relative;
	margin:10px;
	float:right;
	width:500px;
	height:500px;
	text-shadow:1px 1px 1px #000;
	-webkit-text-shadow:1px 1px 1px #000;
	-moz-text-shadow:1px 1px 1px #000;	
}
.redLink{
	color:#F82639;	
}

</style>
</head>
<body>


<div class="headWrapper">

	<div class="logo"><a href="index.html"><img src="images/Header1_750.gif" alt="AwarenessDrive.org" width="570"/></a> </div>
    
    <div class="right">


      <div class="quick_top">
            <div class="quick_top_icon" id="twitter"><a href="https://twitter.com/awarenessdrive" target="_blank"><img src="images/twitter_icon.fw.png" alt="Twitter AwarenessDrive.org" width="34" class="opaque-rollover" /></a></div>
            
        <div class="quick_top_icon" id="blog"><a href="blog.html"><img src="images/blog_icon.fw.png" alt="BeAware Blog" width="34" class="opaque-rollover" /></a></div>
            
        <div class="quick_top_icon" id="books"><a href="library.html"><img src="images/book_icon.fw.png" alt="BeAware Library" width="34" class="opaque-rollover" /></a></div>
            
        <div class="quick_top_icon" id="posters"><a href="posters.html"><img src="images/poster_icon.fw.png" alt="BeAware Posters"  width="20" class="opaque-rollover" /></a></div>
            
        <div class="quick_top_icon" id="facebook"><a href="https://www.facebook.com/pages/Awarenessdriveorg/581286078548981" target="_blank"><img src="images/facebook_icon.fw.png" alt="Facebook AwarenessDrive.org" width="34" class="opaque-rollover" /></a></div> 
      </div>
      
                  <div class="slogan"><img src="images/Headline_BeAware.gif" alt="BeAware of Zombie Emotions" width="404" height="38" /></div>
      
	</div> 
</div>



<div id="sidebar">
    <div id="scroller_anchor"></div>
    	<div class="nav" id="scroller">
        
                <div class="com"><span class="red">AWARENESS</span><span class="grey">drive</span><span class="white">.org</span></div>
        	<div class="navWrapper">
        
                <div class="linkWrapper"><div class="link" id="link1"><a href="index.html">Home</a></div></div>
               
               <div class="linkWrapper"><div class="link2"  id="link2" style="visiblity:'visible'"><a href="blog.html">BeAware</a>
               <div class="drop" id="drop">
                   <div class="sub1" onclick="location.href='blog.html';"><a href="blog.html">BeAware Blog</a></div>
                    <div class="sub2" onclick="location.href='library.html';"><a href="library.html">BeAware Library</a></div>
               </div>
               </div></div>
               
               <div class="linkWrapper"><div class="link"  id="link3"><a href="links.html">Links</a></div></div>
               
               <div class="linkWrapper"><div class="link"  id="link4"><a href="events.html">Events</a></div></div>
               
               <div class="linkWrapper"><div class="link"  id="link5"><a href="about.html">About</a></div></div>
               
               <div class="linkWrapper"><div class="link"  id="link6"><a href="contact.php">Contact</a></div>
               
            </div>
        </div>
    </div> 
</div>




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





<div class="icon_wrapper">
<a href="https://twitter.com/awarenessdrive" target="_blank" class=" icon_section opaque-rollover" style="display:block; height:200px; width:180px; text-align:center;">
<img src="images/twitter_icon.fw.png" alt="Twitter AwarenessDrive.org" height="40" style="display:block; margin:0px auto;" />
<span class="iconHead">Twitter</span><br/>
Follow Awarnessdrive.org on Twitter for more info.
</a>

<a href="blog.html" class="icon_section opaque-rollover" style="display:block; height:200px; width:180px; text-align:center;">
<img src="images/blog_icon.fw.png" alt="BeAware Blog" height="40" style="display:block; margin:0px auto;" />
<span class="iconHead">BeAware Blog</span><br/>
Read about how they became a group and read about other teen’s experiences.
</a>

<a href="library.html" class="icon_section opaque-rollover" style="display:block; height:200px; width:180px; text-align:center;">
<img src="images/book_icon.fw.png" alt="BeAware Library" height="40" style="display:block; margin:0px auto;" />
<span class="iconHead">BeAware Library</span><br/>
Read small descriptions of each book describing others experiences.
</a>

<a href="posters.html" class="icon_section opaque-rollover" style="display:block; height:200px; width:180px; text-align:center;">
<img src="images/poster_icon.fw.png" alt="BeAware Posters" height="40" style="display:block; margin:0px auto;" />
<span class="iconHead">Posters</span><br/>
AwarenessDrive BeAware posters.
</a>

<a href="https://www.facebook.com/pages/Awarenessdriveorg/581286078548981" target="_blank" class="icon_section opaque-rollover" style="display:block; height:200px; width:180px; text-align:center;">
<img src="images/facebook_icon.fw.png" alt="Facebook AwarenessDrive.org" height="40" style="display:block; margin:0px auto;" />
<span class="iconHead">Facebook</span><br/>
&quot;Like&quot; us on Facebook and read about current  events and upcoming projects.
</a>
<br/>
</div>
</div>




<div class="footer">
<p>AwarenessDrive.org | <a href="contact.php">Contact Us</a><br />
     © Copyright 2013</p>
    <p>Site powered by <a href="https://www.facebook.com/pages/I-T-TEC-at-Boulder-TEC/114727078588974?fref=ts" target="_blank">IT CTE at CTE Boulder</a></p>
</div>
</body>
</html>
