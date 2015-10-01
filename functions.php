<?php
error_reporting(0);

function get_tiles() {
	if(isset($_POST['size'])) {
		clearstatcache();
	}
	global $db;
	$num = isset($_POST['size']) ? intval($_POST['size'])-1 : 11;
	$genre = isset($_POST['genre']) ? $_POST['genre'] : 'movies';
	$content = $_SESSION['tile_content'];
	$pic = get_img_link($i);
	$folder = isset($_POST['genre']) ? $_POST['genre'] : 'movies';
	for($i=0; $i <=$num; $i++) {
		$class = get_cols();
		if(in_array($content[$i], $_SESSION['random'])){
			$x = $_POST['genre'] === national_anthems ? ".png" : ".jpg";
			$y = /*($_POST['genre'] === 'rock_music') ? "rm_" :*/ "";
			$z = ($_POST['genre'] === 'rock_music') ? $content[$i] : "";
			$img = ($_POST['genre'] !== 'rock_music') ? "<img src='".IMG.$folder."/".$content[$i].$x."'>" : "<img src='../Memory/img/rock_music/concert.jpg'>";
			$name = ($_POST['genre'] === 'rock_music') ? $content[$i] : "";
			$tile_bg = ($_POST['genre'] === 'rock_music') ? " class='bg_rock'" : "";
			$out .= "<li class=\"tile ".$class."\" id=\"".$y.$content[$i]."\"><span><p".$tile_bg.">".$name."</p>".$img."</li>";
	
		} elseif(in_array($content[$i], $_SESSION['questions'])) {
				$sound = ($genre === "national_anthems" || $genre = "rock_music") ? "<span><img src='".IMG."Note_Symbol.png' alt='sound icon'>" : "<span class=\"glyphicon glyphicon-volume-up\"\>";
				$file = $content[$i];
				$id = /*($_POST['genre'] === 'rock_music') ? " id='rm2_".$content[$i]."'" : */" id='audio_".$content[$i]."'";
				if($_POST['genre'] !== "rock_music") {
					$out .= "<li class=\"tile ".$class." audio\"".$id.">";
					$out .= $sound;
					$out .= 	"<audio  class='player' preload=\"auto\" loop src=\"".AUDIO.$folder."/".$file."\">";
					$out .=		"</audio>";
					$out .=	"</span>";
					$out .=	"</li>";
				} else {
					$out .= "<li class=\"tile ".$class." audio\"".$id.">";
					$out .= $sound;
					$out .=	"</span>";
					$out .=	"</li>";
				}
		}

	}
	echo $out;




}

function get_cols() {
	if($_POST['size'] === "12" || $_POST['size'] === "16") {
		return "col_4";
	} elseif($_POST['size'] === "20" || $_POST['size'] === "20") {
		return "col_5";
	} else {
		return "col_4";
	}
}

function get_random_order() {
	if(isset($_POST['size'])) {
		$num = intval($_POST['size'])/2;
		$num = strval($num); 
	} else {$num = 6;}
		$array_1 = array_fill(0,$num,0);
		$array_2 = array_fill(0,$num,1);
		$array = array_merge($array_1, $array_2);
		$array1 = $array;
		shuffle($array1);
		return $array1;
	
}

function get_random_selection(){
	clearstatcache();
	if(isset($_POST['genre'])) {
		$table = $_POST['genre'];
		$num = $_POST['size']/2;
	} else {
		$table = "movies";
		$num = 6;
	}
	
	global $db;
	
	$data = $db->prepare("SELECT * FROM $table");
	$data->execute();
	$count = $data->rowCount();
	$results = $data->fetchAll();
	$array = "";
	for($i=0;$i<=$count;$i++){
			$array[] = $results[$i][1];
	}
	$array_rd = $array;
	shuffle($array_rd);
	$array_new = array_slice($array_rd,0,$num);
	$_SESSION['random'] = $array_new;


	//return $array_rd;
}

function get_question(){
	global $db;
	if(isset($_POST['genre'])) {
		$table = $_POST['genre'];
	} else {$table = "movies";}
	

	$data = $_SESSION['random'];
	$table2 = $table."_2";
	$foreign_id = $table2.".foreign_id";
	$id = $table.".id";
	$content = $table.".content";
	print_r($one_table);
	foreach ($data as $element) {
			//if(in_array($table, $one_table)){
			if($table === "movies"){
				$array[] = $element.".mp3";
			} elseif($table === "rock_music") {
				foreach($data as $element) {
				$query = "SELECT * FROM rock_music_2 INNER JOIN rock_music ON (rock_music_2.foreign_id = rock_music.id) WHERE musician = '$element' ";
				$data = $db->prepare($query);
				$data->execute();
				$results[] = $data->fetch()[3];
				}

			}


			else {
				$sql = "SELECT content_2 FROM $table2 INNER JOIN $table ON ($foreign_id = $id) WHERE $content = '$element'";
				$data = $db->prepare($sql);
				$data->execute();
				$results[] = $data->fetchAll();
			}		
	}
	if(!in_array($table, $one_table)){
		foreach($results as $result) {
			$range = count($result[$x]);
			$x = mt_rand(0,$range);
			$array[] = $result[0][0];
		}
		
	}
	$_SESSION['questions'] = ($table === "rock_music") ? $results : $array;
}


function get_tile_contents(){
	global $db;
	$questions = $_SESSION['questions'];
	$names = $_SESSION['random'];
	$array = array_merge($names, $questions);
	$new_array = $array;
	shuffle($new_array);
	//return $new_array;
	$_SESSION['tile_content'] = $new_array;
}

function get_img_link($i) {
	global $db;
	global $content;
	if(in_array($content[$i], $_SESSION['random'])){
		$sql = "SELECT img FROM composers  WHERE content = '$content[$i]'";
		$data = $db->prepare($sql);
		$data->execute();
		$result = $data->fetch();
	}
	echo $result[0];
}

?>
