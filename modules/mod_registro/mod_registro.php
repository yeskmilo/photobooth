<?php

defined('_JEXEC') or die('Restricted access');

session_start();



$login = JRequest::getVar('login');
$form = JRequest::getVar('form');
$email_login = JRequest::getVar('email_login');

$query = "SELECT * FROM pro_countries";
$db =& JFactory::getDBO();
$db->setQuery($query);
$countries = $db->loadObjectList();


if($form == "registro"):

	$name = JRequest::getVar('name');
	$email = JRequest::getVar('email');
	$country = JRequest::getVar('country');
	
	
	$db =& JFactory::getDBO();
	$query = "INSERT INTO pro_users (name, email, country) VALUES ('$name', '$email', '$country')";
	$db->setQuery($query);
	$db->query();
	
	$_SESSION['email'] = $email;
	
	
	echo "<script>";
		echo "alert('Thank you for registering your details')";
	echo "</script>";
	

endif;



if($form == "login"):
	
	$query = "SELECT email FROM pro_users where email = '$email_login'";
	$db =& JFactory::getDBO();
	$db->setQuery($query);
	$var = $db->loadResult();
	
	if($var):
	
		$_SESSION['email'] = $var;
		
	else:
	
?>
	<script>
		alert("The email was not found in our database");
	</script>
<?php	
	
	endif;


endif;


?>

<script>
	function login_validation(){
	
		
		
		if((jQuery(".email_form").val() == "")|| (jQuery(".email_form").val() == "Email")){
			alert("Enter your email");
			return false;
		}
		
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		if( !emailReg.test( jQuery(".email_form").val() ) ) {
			alert("Invalid email");
			return false;
		}
		
		jQuery("#login").submit();
		
	}
	
	function registro_validation(){
		
		
		if((jQuery(".name_login").val() == "")|| (jQuery(".name_login").val() == "Name")){
			alert("Enter your name");
			return false;
		}
		
		if((jQuery(".email_login").val() == "")|| (jQuery(".email_login").val() == "Email")){
			alert("Enter your email");
			return false;
		}
		
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		if( !emailReg.test( jQuery(".email_login").val() ) ) {
			alert("Invalid email");
			return false;
		}
		
		if((jQuery(".country").val() == "")|| (jQuery(".country").val() == "0")){
			alert("Enter your country");
			return false;
		}
		
		jQuery("#registro").submit();
		
	}
	


</script>



<?php if($login): 

if($login == "false"):

unset($_SESSION['email']);

endif;

?>

<div class="login">
    <div class="login-top">
        Already have an account?
        <form name="login" id="login" method="post" action="index.php">
            <input name="email_login" type="text" class="input-login email_form" value="Email" onfocus="if(this.value=='Email') this.value='';" onblur="if(this.value=='') this.value='Email';" />
            <input type="hidden" name="form" value="login" />
            <input type="button" onclick="login_validation();" class="boton-login"  value="Continue"/>
        </form>
    </div>
    <div class="login-bottom">
        <table border="0" cellspacing="0" cellpadding="0" align="right">
          <tr>
            <td>or Sign In</td>
            <td><a href="index.php" class="ir-login"></a></td>
          </tr>
        </table>

    </div>
</div>


<?php else: ?>

<div class="login">
	 <form name="registro" id="registro" method="post" action="index.php">
    <div class="login-top2">
        Your Email Address
       
        	<input name="name" type="text" class="input-registro2 name_login" value="Name" onfocus="if(this.value=='Name') this.value='';" onblur="if(this.value=='') this.value='Name';" />
            <input name="email" type="text" class="input-registro2 email_login" value="Email" onfocus="if(this.value=='Email') this.value='';" onblur="if(this.value=='') this.value='Email';" />
            <select name="country" class="country">
            	<option value="0">Country</option>
                <?php foreach ($countries as $row): ?>
                <option value="<?php echo $row->id?>"><?php echo $row->country?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="form" value="registro" />
            <table border="0" cellspacing="3" cellpadding="0" align="right">
              <tr>
                <td><input type="checkbox" name="aceptar" checked="checked" /></td>
                <td class="text_agree">I agree to receive information<br />
from Colombia Travel</td>
              </tr>
            </table>

            
    </div>
    <div class="login-bottom">
   		 <table border="0" cellspacing="0" cellpadding="0" align="right">
          <tr>
          	<td><a href="index.php?login=true" class="already"><span>Already have an account?</span></a></td>
            <td>Log In&nbsp </td>
            <td><input type="button" onclick="registro_validation();" class="boton-login"  value="Continue"/></td>
          </tr>
        </table>    
    </div>
    
    
        </form>
</div>

<?php endif; 


if($_SESSION['email']):

?>

<script>

window.location.href = "index.php?option=com_gallery&id=1";

</script>
<?php

endif;

?>


