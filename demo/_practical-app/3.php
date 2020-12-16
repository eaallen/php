<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php
	$arr = [0,1,2,3,4,5,6,7,8,9];
	for ($i=0; $i < count($arr); $i++) { 
		if($i < 5){
			switch($i){
				case 1:
					echo "i is 1 <br/>";
				break;
				case 2:
					echo "i is 2 <br/>";
				break;
				case 3:
					echo "i is 3 <br/>";
				break;
				case 4:
					echo "i is 4 <br/>";
				break;
				default:
					echo "i is 0 <br/>";
				break;
			}
		}else{
			echo "i love php ".$i."<br/>" ;
		}
	}

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */

	
?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>