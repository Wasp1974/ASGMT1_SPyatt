
<script type="text/javascript">
$(document).ready(function() {
		window_height = $(window).height();
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
		
		//$.post('index.php', {size: '16'; genre: 'movies'});
		function get_task_description() {
			var genre = $('.tile').not('.audio').eq(0).find('img').attr('src');
			if(genre.indexOf("movies") > 0) {
				var text = 0;
			} else if (genre.indexOf("national_anthems") > 0) {
				var text = 1;
			} else if(genre.indexOf("composers") > 0) {
				var text = 2;
			}
		var messages = ["Can you match the sound snippets with the movies?", 
		"Can you match the national anthems with the flags?",
		"Can you match the composers with biographic details?"];
		$('#introduction').html(messages[text]);
		}

function get_tile_height() {
			var count = $('.tile').length;
			if(count === 12) {
				var x = 0.3;
			} else if(count > 12) {
				var x = 0.225;
			}

			var tile_height = window_height * x;
			$('.tile').height(tile_height);
		}

function show_file_contents(selected) {
		var audio = selected.find('.player')[0];
			selected.find(content).show();
			if(selected.hasClass("audio") === true) {				
				if(selected.index() !== curr_tile && curr_tile !== -1) {
					$('#list').find('span:eq('+curr_tile+')').find('.player')[0].pause();
				}
				curr_tile = selected.index();
				var strings = selected.find('audio').attr('src').split("/");
				var file = strings[strings.length-1];
				
				array.push(file);
				audio.play();
			}else {		
				array.push(selected.attr('id'));
			}
}

function identify_selected_tiles() {
		if(array_1.indexOf(array[0]) !== -1){
					index_1 = array_1.indexOf(array[0]);
				} else {
					index_1 = array_2.indexOf(array[0]);
				}
				if(array_1.indexOf(array[1]) !== -1){
					index_2 = array_1.indexOf(array[1]);
				} else {
					index_2 = array_2.indexOf(array[1]);
				}
 }

 function count_attempts() {
 	var plural = ((count/2) > 1) ? "s" : "";
	$('#count').text(count/2 + ' attempt' + plural);
 }

function check_if_tiles_are_matching() {
 if(index_1 !== index_2) {
		for(i = 0; i < (array_1.length)*2; i++) {
				var span = $('#list').find('span:eq('+i+')');
				if($('#list').find('li:eq('+i+')').hasClass("audio") === true) {
						var path = $('#list').find('span:eq('+i+')').find('audio').attr('src').split("/");	
						var cont = path[path.length-1];
						console.log("Cont: "+cont);						
				} else {
						var cont = $('#list').find('li:eq('+i+')').attr('id');
				}
						
						var index = matches.indexOf(cont);
						if(index === -1) {
							$(span).delay(1000).fadeOut(500);
						}
					}
					
} else {
					matches.push(array[0]);
					matches.push(array[1]);
					count_matches++;
					console.log("Matches: "+matches);
					
		}
		if(array.length > 1) {
				array.length = 0;
				}
}


$(tile).on('click', function(){
			count++;
			var selected = $(this);
			show_file_contents(selected);
			//
			if(typeof array[1] !== 'undefined') {		
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


