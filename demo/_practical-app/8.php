<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


		
	<article class="main-content col-xs-8">
	
	
	<?php  session_start();
	echo $_SESSION['a'];

	/*  Step 1 -Make a variable with some text as value

		Step 2 - Use crypt() function to encrypt it

		Step 3 - Assign the crypt result to a variable

		Step 4 - echo the variable

	*/
	$str = "text";
	$crypt_text = crypt($str, '$5$rounds=5000$usesomesillystringforsalt$');
	echo $crypt_text;
	echo "<br/>".$_COOKIE['cookie_name'];
	?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>