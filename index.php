<?php session_start();
error_reporting(0);
include("config.php");
include("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Play Memory Quiz, an exciting combination of a memory and a quiz game</title>
	<?php  
	get_random_selection();
	get_question();
	get_tile_contents();
	?>
		<!--<meta charset="UTF-8">-->
	<link rel="stylesheet" href="../Memory/custom.css" type="text/css"/>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script type="text/javascript" src="prefixfree.min.js"></script>
	<script type="text/javascript" src="app.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			if($('.tile').length === 16) {
				$('#container').css('width', '50%');
			}


		window_height = $(window).height() - $('.navbar-default').height() - 20;
		get_task_description();
		$('#container').height(window_height);
		tile = $('.tile');
		get_tile_height();
		content = $('.tile>span');
		$(content).hide();
		cont = "";
		count = 0;
		count_matches = 0;
		curr_tile = -1;
		array = [];
		matches = [];
		array_1 = <?php echo json_encode($_SESSION['random']);?>;
		array_2= <?php echo json_encode($_SESSION['questions']); ?>;
		array_3= <?php echo json_encode($_SESSION['tile_content']); ?>;
		console.log("array 1: "+array_1);
		console.log("array_2"+array_2);
		console.log("array_3"+array_3);

		if($(window).width() < 759){
				$('#select, #introduction').css("display", "none");
				$('.navbar-toggle').on("click", function() {
						$('#select, #container').toggle();
					});
		}
		
$(tile).on('click', function(e){
			count++;
			var selected = $(this);
			show_file_contents(e, selected);
			if(typeof array[1] !== 'undefined'/*count > 0 && count%2 === 0*/) {
				console.log("tile 2 is: "+array[1]);
				console.log("the array is: "+array);		
				identify_selected_tiles();
				count_attempts();
				check_if_tiles_are_matching();
			}
			if(count_matches === array_1.length) {
					$('body').append("<div id='success'>Congratulations! It took you "+count/2+" attempts<button id='ok'>OK</button></div>");
		}
		$('#success').on('click', 'button', function(){
			$('#success').remove();
		})
	});


});
</script>
	<!--<script type="text/javascript" src="app.js"></script>-->

</head>
<body>
	<?php include("../navbar.php"); ?>
	<div id="form_wrap">
		<h3 id="introduction"></h3>
		<div id="select">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div id="genre">
					<p>Please select a genre!</p>
					<select name="genre" id="genre_select" width="300">
						
						<option value ="national_anthems" <?php if($_POST['genre'] === 'national_anthems'){echo 'selected="selected"';}?>>National Anthems</option>
						<option value ="movies" <?php if($_POST['genre'] === 'movies' || !isset($_POST['genre'])){echo 'selected="selected"';}?>>Movies</option>
						<option value ="rock_music" <?php if($_POST['genre'] === 'rock_music'){echo 'selected="selected"';}?>>Rock Music</option>
					</select>
				</div>
				<div id="size">
					<p>Please select the number of tiles!</p>
						<div>
							<select name="size">
								<option value ="12" <?php if($_POST['size'] === '12'){echo 'selected="selected"';}?>>12</option>
								<option value ="16" <?php if($_POST['size'] === '16'){echo 'selected="selected"';}?>>16</option>
								<option value ="20" <?php if($_POST['size'] === '20'){echo 'selected="selected"';}?>>20</option>
							</select>
								<input type="submit" class="btn btn-success" value="OK" name="tiles"/>
						</div>
							
				</div>
			</form>
		</div>
	</div>
	<div id="container">
	
		<ul id="list">
			<?php get_tiles(); ?>
		</ul>
		
	</div>
	<h2 id="count"></h2>
	<iframe width="420" height="315" id="youtube" src="https://www.youtube.com/embed/HZpraXzvH-s" 
	</iframe>
</body>
</html>
