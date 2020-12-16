<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>
			
		
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	
	<?php  

//   Step1: Define a function and make it return a calculation of 2 numbers
		function calc ($num1,$num2){
			return $num1 * $num2;
		}


	// Step 2: Make a function that passes parameters and call it using parameter values
		echo calc(calc(2,4),calc(5,6));


	
?>





</article><!--MAIN CONTENT-->


<?php include "includes/footer.php"; ?>