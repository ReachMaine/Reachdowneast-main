<?php

	add_action('after_setup_theme', ea_setup);
	/**  ea_setup
	*  init stuff that we have to init after the main theme is setup.
	*
	*/
	function ea_setup() {
	 /* do stuff heree. */
	}

/* change the logo on the login page */
 function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/ea-mdi.png);
            margin: 0px;
            width: 100%;
            background-size: 300px;
        }
        #backtoblog {
        	display: none;
        	visibility: hidden;
        }
        body.login ul.eai_login_links {
        	text-align: center;
        	padding-top: 30px;
        	line-height: 30px;
        	font-size:18px;
        }
        #nav {
        	display: none;
        	visibility: hidden;
        }

    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/*puts a link on the form abot the login botton - not what we wanted.
add_action('login_form', 'eai_login_links');*/

/* add links to bottom of wp_login.php form */
/* 19Dec16 zig - part of leaky paywall that we are not using anymore
add_filter('login_footer',  'eai_login_links');
function eai_login_links() {
	?>
	<ul class="eai_login_links">
		<li>
			<a href="http://www.ellsworthAmerican.com/membership/login">Log In to Ellsworth American</a>
		</li>
		<li>
			<a href="http://www.mdislander.com/membership/login">Log In to MDI Islander</a>
		</li>
	</ul>
	<?php
} */

function eai_lost_password_confirm() {

    // Check if have submitted
    $confirm = ( isset($_GET['checkemail'] ) && $_GET['checkemail'] == confirm );

    if( $confirm ) {
    	?>
    	<style type="text/css">

	    	#loginform {
	        	visibility: hidden!important;
	        	display: none!important;
	        }
	        #loginform {
	        	background-color: #C6DCE0;
	        }
    	</style>
    	<?
    }

    $resetpass = ( isset($_GET['action'] ) && $_GET['action'] == resetpass );
    if ($resetpass) {
    	?>
    	<style type="text/css">
    		.message.reset-pass a {
    			display: none;
    			visibility: hidden;
    		}
    	</style>
    	<?php
    }
}
 add_action('login_headerurl', 'eai_lost_password_confirm'); // change the logo link
?>
