<?php
// Creating the widget 
class contact_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'contact_widget', 

// Widget name will appear in UI
__('Book a Class Form', 'fitcoach'),  

// Widget description
array( 'description' => __( 'Use this widget to place a Book a Class form in your sidebar.', 'fitcoach' ), )    
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$description = apply_filters( 'widget_description', $instance['description'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
if ( ! empty( $description ) )
echo $args['<span>'] . $description . $args['</span>'];    

// This is where you run the code and display the output

if(isset($_POST['submitted'])) {

        if(trim($_POST['contactName']) === '') {
               $nameError = __( 'Please enter your name.', 'fitcoach' );
               $hasError = true; 
        } else {  

               $name = trim($_POST['contactName']);
        }

        if(trim($_POST['email']) === '')  {
               $emailError = __( 'Please enter your email address.', 'fitcoach' );
               $hasError = true;
        } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
               $emailError = 'You entered an invalid email address.';
               $hasError = true;
        } else {
               $email = trim($_POST['email']);
        }
		
		if(trim($_POST['contactPhone']) === '') {
               $nameError = __( 'Please enter your phone number.', 'fitcoach' );
               $hasError = true;
        } else {  

               $phone = trim($_POST['contactPhone']); 
        }
		
		if(trim($_POST['contactDate']) === '') {
               $nameError = __( 'Please enter the date of the class.', 'fitcoach' ); 
               $hasError = true;
        } else {  

               $date = trim($_POST['contactDate']); 
        }

		if(trim($_POST['contactClass']) === '') {
               $nameError = __( 'Please enter the class name.', 'fitcoach' ); 
               $hasError = true;
        } else {  

               $class = trim($_POST['contactClass']);
        }

        if(trim($_POST['comments']) === '') {
               $commentError = __( 'Please enter a message.', 'fitcoach' );
               $hasError = true;
        } else {
               if(function_exists('stripslashes')) {
                      $comments = stripslashes(trim($_POST['comments']));
               } else {
                       $comments = trim($_POST['comments']);
               }
        }

        if(!isset($hasError)) {
               $emailTo = get_option('tz_email');
               if (!isset($emailTo) || ($emailTo == '') ){
                       $emailTo = get_option('admin_email');
               }
               $subject = 'New Contact Submission From '.$name;
               $body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nClass Name: $class \n\nDate: $date \n\nComments: $comments";
               $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

               wp_mail($emailTo, $subject, $body, $headers);
               $emailSent = true;
        }
}

 if(isset($emailSent) && $emailSent == true) { ?>
             <div><p><?php _e( 'Thanks, your email was sent successfully.', 'fitcoach' ); ?></p></div>
				<?php } else { ?>
                
						<?php if(isset($hasError) || isset($captchaError)) { ?>
						<p><?php _e( 'Sorry, an error occured.', 'fitcoach' ); ?><p> 
						<?php } ?>

						<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
  						<ul class="contact-form">
						<li class="contact-name">
						 <input type="text" name="contactName" id="contactName" placeholder="Name" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" />
							<?php if($nameError != '') { ?>
							<span><?php echo $nameError;?></span>
							<?php } ?>
					 	</li>

						<li class="contact-email">
						<input type="text" name="email" id="email" placeholder="Email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" />
							<?php if($emailError != '') { ?>
							<span><?php echo $emailError;?></span>
							<?php } ?>
						</li>
                        
                        <li class="contact-phone">
						 <input type="text" name="contactPhone" id="contactPhone" placeholder="Phone" value="<?php if(isset($_POST['contactPhone'])) echo $_POST['contactPhone'];?>" />
							<?php if($phoneError != '') { ?>
							<span><?php echo $phoneError;?></span>
							<?php } ?>
					 	</li>
                        
                        <li class="contact-classname contact_left_half"> 
						 <input type="text" name="contactClass" id="contactClass" placeholder="Class Name" value="<?php if(isset($_POST['contactClass'])) echo $_POST['contactClass'];?>" />
							<?php if($classError != '') { ?> 
							<span><?php echo $classError;?></span>
							<?php } ?>
					 	</li>
                        
                        <li class="contact-date contact_right_half">
						 <input type="text" name="contactDate" id="contactDate" placeholder="Date" value="<?php if(isset($_POST['contactDate'])) echo $_POST['contactDate'];?>" />
							<?php if($dateError != '') { ?>
							<span><?php echo $dateError;?></span>
							<?php } ?>
					 	</li>

 						<li class="contact-comments">
						<textarea name="comments" id="commentsText" placeholder="Your Message" rows="12" cols="30"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
							<?php if($commentError != '') { ?>
							<span><?php echo $commentError;?></span>
							<?php } ?>
						</li>

						<li>
						<input type="submit" class="contact-submit" value="Send Message"></input>
						</li>
						</ul>
						<input type="hidden" name="submitted" id="submitted" value="true" />
						</form>

                        <?php } 

echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance )  {
//Defaults
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ]; 
}
else {
$title = __( 'New title', 'fitcoach' );
}

if ( isset( $instance[ 'description' ] ) ) {
$description = $instance[ 'description' ];
}
else {
$description = __( 'New Description', 'fitcoach' );
}


// Widget admin form
?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'fitcoach'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p> 
        
        <p><label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'fitcoach'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" value="<?php echo $description; ?>" /></p>
        
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
return $instance;
}
} // Class contact_widget ends here

// Register and load the widget
function contact_load_widget() {
	register_widget( 'contact_widget' );
}
add_action( 'widgets_init', 'contact_load_widget' );