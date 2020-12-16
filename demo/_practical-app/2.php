<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">

	<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


		<article class="main-content col-xs-8">
		

<?php
	$num1 = 10;
	$num2 = 20;
	echo $num1 + $num2;
	$arr = [$num1,$num2];
	$d = ["num1"=>$num1,"num2"=>$num2];
	echo $d["num1"]

// Step 1: Make 2 variables called number1 and number2 and set 1 to value 10 and the other 20:

	// Step 2: Add the two variables and display the sum with echo:


	// Step3: Make 2 Arrays with the same values, one regular and the other associative

	
	

		


?>

	

		</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>