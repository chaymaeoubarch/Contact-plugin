<?php
    /**
     * Plugin Name: Contact Form 
     * Plugin URI: https:/wordpress.com
     * Description: Customize the contact form from an initial version already developed.
     * Version: 1.0
     * Author: chaymae
     * Author URI: https:/wordpress.com
     */
    
     //add the plugin in the menu
    function my_setup_page(){
        add_menu_page( 'Setup Form', 'chaymae', 'manage_options', 'test-plugin','wp_setup_function',1 );
    }
        add_action('admin_menu', 'my_setup_page');

        function wp_setup_function(){
            $firstname_check = "";
            $lastname_check = "";
            $email_check = "";
            $message_check = "";
            $number_check="";
            $adress_check="";
            if(get_option('fname')){
                $firstname_check = "checked";
            }
            if(get_option('lname')){
                $lastname_check = "checked";
            }
            if(get_option('email')){
                $email_check = "checked";
            }
            if(get_option('message')){
                $message_check = "checked";
            }
            if(get_option('number')){
                $number_check = "checked";
            }
            if(get_option('adress')){
                $adress_check = "checked";
            }
         
            echo '<form method="POST" action="">
                        <div style="display:flex; flex-direction: column; align-items: flex-start">
                            <Label><input type="checkbox" name="fname" '. $firstname_check .'>First Name</Label>
                            <Label><input type="checkbox" name="lname" '. $lastname_check .'>Last Name</Label>
                            <Label><input type="checkbox" name="email" '. $email_check .'>Email</Label>
                            <Label><input type="checkbox" name="message" '. $message_check .'>Message</Label>
                            <Label><input type="checkbox" name="number" '. $number_check .'>Number</Label>
                            <Label><input type="checkbox" name="adress" '. $adress_check .'>Adress</Label>
                            <input type="submit" name="submit_btn">
                        </div>
                     </form>';
        }     
if(isset($_POST["submit_btn"])){
    $list["ftname"] = 0;
    $list["lname"] = 0;
    $list["email"] = 0;
    $list["message"] = 0;
    $list["number"] = 0;
    $list["adress"] = 0;
    if(isset($_POST["fname"])){
        $list["fname"] = 1;
        
    }
    if(isset($_POST["lname"])){
        $list["lname"] = 1;
        
    }
    if(isset($_POST["email"])){
        $list["email"] = 1;
        
    }
    if(isset($_POST["message"])){
        $list["message"] = 1;

    }
    if(isset($_POST["number"])){
        $list["number"] = 1;

    }
    if(isset($_POST["adress"])){
        $list["adress"] = 1;

    }
    update_option('fname', $list["fname"]);
    update_option('lname', $list["lname"]);
    update_option('email', $list["email"]);
    update_option('message', $list["message"]);
    update_option('number', $list["number"]);
    update_option('adress', $list["adress"]);
}

function add_form(){
    $form_added = false;
    if(get_option("fname")){
        echo '<label>First Name<input type="text"></label>';
        $form_added = true;
    }
    if(get_option("lname")){
        echo '<label>Last Name<input type="text"></label>';
        $form_added = true;
    }
    if(get_option("email")){
        echo '<label>Email<input type="text"></label>';
        $form_added = true;
    }
    if(get_option("message")){
        echo '<label>Message:<textarea name="message"></textarea></label>';
        $form_added = true;
    }
    if(get_option("number")){
        echo '<label>Number<input type="number"></label>';
        $form_added = true;
    }
    if(get_option("adress")){
        echo '<label>Adress<input type="text"></label>';
        $form_added = true;
    }
    if($form_added){
        echo '<input class="btn" type="submit" value="Submit">';
    }
}
add_shortcode('input','add_form');

?>
<style>
    .btn{
        background-color: #A85CF9 !important;
        margin-left: 31% !important;
    }
</style>
