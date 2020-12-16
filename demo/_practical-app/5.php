<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
	<section class="content">

		<aside class="col-xs-4">
		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	
	<?php 


//   Step 1: Use a pre-built math function here and echo it
		echo round(142352.34344444444555888999999999999999,2);
		echo "<br/>";
	// Step 2:  Use a pre-built string function here and echo it
		echo strlen("ther we go");

	// Step 3:  Use a pre-built Array function here and echo it
		echo  print_r(array_chunk([1,2,3,4,5,6,7,8,9],3)) // array of arrays!
 

	
?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>