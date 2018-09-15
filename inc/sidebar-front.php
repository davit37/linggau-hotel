<?php
 $span='span3';
 if(isset($_GET['id_hotel'])){
	$span='span4';
 }
?>

<div class="<?php echo $span?> col">
	
	<div class='block'>
		<h4 class="title">
			<strong>Latest</strong> News</h4>
		<ul class="nav nav-list below">
			<li class="nav-header">

			</li>
			<?php
					list_news(10); 
					?>
		</ul>
	</div>
</div>


	