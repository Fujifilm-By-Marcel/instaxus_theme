<?php
function my_handle_attachment($file_handler,$post_id,$set_thu=false) {
  // check to make sure its a successful upload
  if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
  require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  
  $attachment_post_data = array(
			'post_title' => "Give 10 Submission",
		);

  $attach_id = media_handle_upload( $file_handler, $post_id, $attachment_post_data );
  if ( is_numeric( $attach_id ) ) {
    update_post_meta( $post_id, '_my_file_upload', $attach_id );
  }
  return $attach_id;
}


function save_post_if_submitted() {	

    $msg = [];
    $allowedtypes = array('image/jpeg', 'image/png');
    $maxsize    = 6291456;
    $validationFailed = false;
    $myFiles = [];
    $formsuccess = false;
	
    // Stop running function if form wasn't submitted
    if ( !isset($_POST['email']) ) {
        return $formsuccess;
    }
	
	//sanitize vars	
	$firstname  = filter_var( $_POST['firstname'],FILTER_SANITIZE_STRING );
	$lastname  = filter_var( $_POST['lastname'],FILTER_SANITIZE_STRING );
	$instagram  = filter_var( $_POST['instagram'],FILTER_SANITIZE_STRING );
	$twitter  = filter_var( $_POST['twitter'],FILTER_SANITIZE_STRING );
	$info  = filter_var( $_POST['info'],FILTER_SANITIZE_STRING );
	$camera  = filter_var( $_POST['camera'],FILTER_SANITIZE_STRING );
    $email = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL );
	$dob = preg_replace("([^0-9-])", "", $_POST['dob']);
	
	//security check
	if ( ! ( $firstname && $lastname && $instagram && $twitter && $info && $camera && $email ) ) {
        array_push( $msg, 'Security check failed.');
		$validationFailed = true;
    }

	
	
	// Verify captcha
	$post_data = http_build_query(
		array(
			'secret' => '6Lcmms0UAAAAAGthKYiBMcZNviHIfiAA1ldAo1-f',
			'response' => $_POST['g-recaptcha-response'],
			'remoteip' => $_SERVER['REMOTE_ADDR']
		)
	);
	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $post_data
		)
	);
	$context  = stream_context_create($opts);
	$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
	$result = json_decode($response);
	if (!$result->success) {
		array_push( $msg, 'ReCaptcha failed.');
		$validationFailed = true;
	}
	
    // Check that the nonce was set and valid
    if( !wp_verify_nonce($_POST['_wpnonce'], 'wps-frontend-post') ) {
        array_push( $msg, 'Your form failed a security check.');        
    }

    // Do some minor form validation to make sure there is content
    if (strlen($firstname) < 3 || strlen($firstname) > 20) {
        array_push( $msg, "Please enter a first name between 3 and 20 characters." );
        $validationFailed = true;
        
    }
    if (strlen($lastname) < 3 || strlen($lastname) > 20) {
        array_push( $msg, "Please enter a last name between 3 and 20 characters." );
        $validationFailed = true;
        
    }
    if (strlen($instagram) < 3 || strlen($instagram) > 20) {
        array_push( $msg, "Please enter an Instagram handle between 3 and 20 characters." );
        $validationFailed = true;
        
    }
    if (strlen($twitter) < 3 || strlen($twitter) > 20) {
        array_push( $msg, "Please enter a Twitter handle between 3 and 20 characters." );
        $validationFailed = true;
        
    }
    if (strlen($info) < 30 || strlen($info) > 300) {
        array_push( $msg, 'Please check the long answer field. This field must be between 30 and 300 characters.' );
        $validationFailed = true;
    }
	
	//check if more than 10 files
	if ( count($_FILES["images"]['name']) > 10 ) {
		array_push( $msg, 'You can only upload a maximum of 10 files.' );
		$validationFailed = true;
	}		

    //Validate files    
    if( 'POST' == $_SERVER['REQUEST_METHOD']  ) {
        if ( $_FILES ) {          
            $files = $_FILES["images"];  
            foreach ($files['name'] as $key => $value) {            
                if ($files['name'][$key]) { 
                    $file = array( 
                        'name' => $files['name'][$key],
                        'type' => $files['type'][$key], 
                        'tmp_name' => $files['tmp_name'][$key], 
                        'error' => $files['error'][$key],
                        'size' => $files['size'][$key]
                    ); 
                    $_FILES = array ("my_file_upload" => $file); 
                    foreach ($_FILES as $file => $array) {                    

                        //make sure the file is a jpeg or png
                        if ( !in_array($array['type'], $allowedtypes) ) {                            
                            $validationFailed = true;
                            array_push( $msg, $array["name"].' had an invalid filetype. Please only upload PNG or JPEG files.');
                        }

                        //make sure the file is less than 4mb
                        if( $array["size"] >= $maxsize ){                            
                            $validationFailed = true;
                            array_push( $msg, $array["name"].' is too large. Please only upload files under 5MB.');
                        }

                        array_push($myFiles, $_FILES);

                    }
                } 
            } 
        }
    }
	

    // Add the content of the form to $post as an array
    if(!$validationFailed){

        //CREATE POST
        $post = array(
            'post_title'    => $instagram,
            /*'post_content'  => $_POST['info'],*/
            'post_status'   => 'pending',   // Could be: publish
            'post_type'     => 'give10_submissions', // Could be: `page` or your CPT
            'meta_input'   => array(
                'firstname' => $firstname,
                'lastname'   => $lastname,
                'email'   => $email,
                'instagram'   => $instagram,
                'twitter'   => $twitter,
                'camera'   => $camera,
				'info'	   => $info,
				'dob' 	=> $dob,
            ),
        );
        $postid = wp_insert_post($post);
        array_push( $msg, 'Your submission was successfull!');  
		
		$galleryArray = [];
        
        //UPLOAD FILES
        foreach ($myFiles as $value) {

            $_FILES = $value;
            foreach ($_FILES as $file => $array) {

                $attachment_id = my_handle_attachment($file,$postid); 
				
				//add to category give10
				wp_set_object_terms($attachment_id, 'give10', 'attachment_category', true);
				
                if ( is_wp_error( $attachment_id ) ) {
                   array_push( $msg, 'There was an error uploading the image '.$array["name"].'.');

                } else {
                   //array_push( $msg, 'The image '.$array["name"].' was uploaded successfully.');
					array_push( $galleryArray, $attachment_id);
                }
            }
        }    		
		//add images to gallery field
		if( count( $galleryArray ) > 0 ){
			update_field('gallery', $galleryArray, $postid);
			//update_field('post_name', $postid, $postid);
		}	
		
		//register adestra
		require_once('adestra-api/adestra-api.php');
		$xmlrpc = authenticate();

		if( isset($_POST['mailing']) ){
			$contactID = createContact($xmlrpc, $firstname, $lastname, $email, $camera, $instagram, $twitter, $dob);
			if (get_current_blog_id() == 1) {				
				subscribeContact($xmlrpc, $contactID, 3835);
			} else {
				subscribeContact($xmlrpc, $contactID, 91143);
			}
		}		
		
		$formsuccess = true;
    }



    
    //DISPLAY MESSAGES
    if ( !empty( $msg ) ){
        if($formsuccess){ echo "<div class='formmsg formsuccess'>"; }
        else{ echo "<div class='formmsg formerror'>"; }
        
        $i = 0;
        $len = count($array);
        foreach($msg as $value){
            echo $value;
            if (!($i == $len - 1)) {
                echo "<br>";
            }
        }
        echo "</div>";
		echo '<script>window.location.hash="give10form";</script>';
    }
	
	return $formsuccess;

}



function outputGive10Form() {
    $success = save_post_if_submitted();
	echo "<style>.loader{display:none;}</style>";
	if(!$success){
		
	$field_labels = get_sub_field("field_labels");
    ?>
	
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<div id="postbox">
		<form id="new_post" name="new_post" method="post" enctype="multipart/form-data">

		<div class="input-container">
			<label for="firstname"><?php echo $field_labels['first_name'] ?></label><br />
			<input type="text" id="firstname" value="<?php echo $_POST['firstname'] ?>" name="firstname" required/>
		</div>

		<div class="input-container">
			<label for="lastname"><?php echo $field_labels['last_name'] ?></label><br />
			<input type="text" id="lastname" value="<?php echo $_POST['lastname'] ?>" name="lastname" required/>
		</div>

		<div class="input-container">
			<label for="email"><?php echo $field_labels['email'] ?></label><br />
			<input type="email" id="email" name="email" size="50" value="<?php echo $_POST['email'] ?>" required></input>
		</div>
		
		<div class="input-container">
			<label for="dob"><?php echo $field_labels['dob'] ?></label><br />
			<input type="date" id="dob" name="dob" value="<?php echo $_POST['dob'] ?>"></input>
		</div>

		<div class="input-container">
			<label for="instagram"><?php echo $field_labels['instagram'] ?></label><br />
			<input type="text" id="instagram" value="<?php echo $_POST['instagram'] ?>" size="50" name="instagram" required/>
		</div>

		<div class="input-container">
			<label for="twitter"><?php echo $field_labels['twitter'] ?></label><br />
			<input type="text" id="twitter" value="<?php echo $_POST['twitter'] ?>" size="50" name="twitter" required/>
		</div>

		<div class="input-container">
			<label for="camera"><?php echo $field_labels['cameraprinter'] ?></label><br />
			<select id="camera" name="camera" form="new_post" style="background: white;">
				<?php 
				if( have_rows('cameraprinter_field_options') ):	
				while ( have_rows('cameraprinter_field_options') ) : the_row();
				?>
				<option value="<?php the_sub_field("value") ?>"><?php the_sub_field("text") ?></option>
				<?php 
			    endwhile;
				endif;
				?>
			</select>
		</div>
		
		<script type="text/javascript">
		  cameravalue = "<?php echo $_POST['camera'];?>";
		  if (cameravalue != ""){  document.getElementById('camera').value = "<?php echo $_POST['camera'];?>"; }
		</script>
		
		<div class="input-container">
			<label for="images[]"><?php echo $field_labels['images'] ?></label><br />
			<input type="file" id="images[]" name="images[]" multiple required style="background: transparent !important;"></input>
		</div>
		
		<div class="input-container">
			<label for="info"><?php echo $field_labels['info'] ?></label><br />
			<textarea rows="4" cols="50" id="info" name="info" required><?php echo $_POST['info'] ?></textarea>
		</div>
		
		
		<div class="input-container"> 
		    <input type="checkbox" id="terms" name="terms" value="terms" <?php if(isset($_POST['terms'])) echo "checked='checked'"; ?> required> 
			<label for="terms"><?php echo $field_labels['terms'] ?></label><br>
			<span id="termsErrorCustom"></span>
		</div>
		
		
		<div class="input-container"> 
		    <input type="checkbox" id="terms2" name="terms2" value="terms2" <?php if(isset($_POST['terms2'])) echo "checked='checked'"; ?> required> 
			<label for="terms2"><?php echo $field_labels['terms2'] ?></label><br>
			<span id="terms2ErrorCustom"></span>
		</div>
		
		<div class="input-container"> 
		    <input type="checkbox" id="mailing" name="mailing" value="mailing" <?php if(isset($_POST['mailing'])) echo "checked='checked'"; ?>> 
			<label for="mailing"><?php echo $field_labels['mailing'] ?></label><br>
		</div>
		
		<div class="input-container"> 
			<div class="g-recaptcha" data-sitekey="6Lcmms0UAAAAANgmWdfezrDs0S7RKTkxd8UiqJkO" data-callback="recaptchaCallback"></div>
			<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
		</div>
			
		<?php wp_nonce_field( 'wps-frontend-post' ); ?>
		
		<style>
			.row .submit-button{
				background: #ffd940 !important;
				color: #262626 !important;
				text-transform: capitalize !important;
			}
			.row .submit-button:hover{
				background: #000 !important;
				color: #fff !important;
			}
		</style>
		
		
		<div class="input-container"> 	
			<input class="submit-button" type="submit" value="<?php echo $field_labels['submit'] ?>" id="submit" name="submit" accept="image/*" />
		</div>
		
		</form>
	</div>
	
	<script>
	

	jQuery(document).ready(function( $ ) {
		
		function recaptchaCallback() {
		  $('#hiddenRecaptcha').valid();
		};
		
		$.validator.addMethod("minAge", function(value, element, min) {
			var today = new Date();
			var birthDate = new Date(value);
			var age = today.getFullYear() - birthDate.getFullYear();
		 
			if (age > min+1) {
				return true;
			}
		 
			var m = today.getMonth() - birthDate.getMonth();
		 
			if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
				age--;
			}
		 
			return age >= min;
		}, "You are not old enough.");
	
		$("#new_post").validate({
			ignore: ".ignore",
			// Specify the validation rules
			rules: {
				firstname: {
					required: true,
					minlength: 3,
					maxlength: 20,
				},
				lastname: {
					required: true,
					minlength: 3,
					maxlength: 20,
				},
				instagram: {
					required: true,
					minlength: 3,
					maxlength: 20,
				},
				twitter: {
					required: true,
					minlength: 3,
					maxlength: 20,
				},
				email: {
					required: true,
					email: true,
				},
				info: {
					required: true,
					minlength: 30,
					maxlength: 300,
				},
				terms: {
					required: true,
				},
				terms2: {
					required: true,
				},
				"images[]": {
					required: true,
					accept: "image/jpeg,image/png",
					maxfiles: 10,
					maxsize: 6291456,
				},
				hiddenRecaptcha: {
					required: function () {
						if (grecaptcha.getResponse() == '') {
							return true;
						} else {
							return false;
						}
					}
				},
				dob: {
					required: true,
					minAge: 13
				},
			},

			// Specify the validation error messages
			messages: {
				firstname: {
					required: "Please enter your first name.",
					minlength: "Please enter at least 3 characters.",
					maxlength: "Please enter no more than 20 characters.",
				},
				lastname: {
					required: "Please enter your last name.",
					minlength: "Please enter at least 3 characters.",
					maxlength: "Please enter no more than 20 characters.",
				},
				instagram: {
					required: "Please enter your instagram handle.",
					minlength: "Please enter at least 3 characters.",
					maxlength: "Please enter no more than 20 characters.",
				},
				twitter: {
					required: "Please enter your twitter handle. Enter N/A if you don't have one",
					minlength: "Please enter at least 3 characters.",
					maxlength: "Please enter no more than 20 characters.",
				},
				email: {
					required: "Please enter a valid email address.",
					email: "Please enter at valid email.",
				},
				info: {
					required: "Please fill this field.",
					minlength: "Please enter at least 30 characters.",
					maxlength: "Please enter no more than 300 characters.",
				},
				terms: {
					required: "Please accept our policy.",
				},
				terms2: {
					required: "Please accept our policy.",
				},
				"images[]": {
					required: "Please select at least one image.",
					accept: "Please only upload JPEG or PNG file types.",
					maxsize: "File size must not exceed 6MB each.",
				},
				dob: {
					required: "Please enter you date of birth.",
					minAge: "You must be at least 13 years old."
				},
			},
			errorPlacement: function(error, element) {
                if (element.attr("name") == "terms") {
                    error.appendTo("#termsErrorCustom");
                } else if (element.attr("name") == "terms2") {
					error.appendTo("#terms2ErrorCustom");
                } else{
					error.insertAfter(element);
				}
            },
			submitHandler: function(form) {
				form.submit();
			},
		});
	});
	
	</script>
	
    <?php
	}
	else{
		if(get_sub_field("thank_you_page")){
			$thankyoupageurl = get_page_link( get_sub_field("thank_you_page") );
			echo "<script>window.location.href='$thankyoupageurl';</script>";
			exit;
		}
	}
}