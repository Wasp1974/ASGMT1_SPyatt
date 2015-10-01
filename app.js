//Debugging rock music genre: 
//1. selected id should show up for every clicked tile => ok
//2. content of every clicked tile should show up in array
//3. index of every clicked tile should appear

function get_task_description() {
			var genre = $('.tile').not('.audio').eq(0).find('img').attr('src');
			console.log('genre: '+genre);
			if(genre.indexOf("movies") > 0) {
				var text = 0;
				$('body').addClass('add_bgImg_movies');
			} else if (genre.indexOf("national_anthems") > 0) {
				var text = 1;
				$('body').addClass('add_bgImg_national_anthems');
			} else if(genre.indexOf("rock_music") > 0) {
				var text = 2;
				$('body').addClass('add_bgImg_rock_music');
			}
		var messages = ["Can you match the sound snippets with the movies?", 
		"Can you match the national anthems with the flags?",
		"Can you match the artists with their songs?"];
		$('#introduction').html(messages[text]);
		}

function get_tile_height() {
			var count = $('.tile').length;
			if(count === 12) {
				var x = 0.33;
			} else if(count > 12) {
				var x = 0.225;
			}

			var tile_height = window_height * x;
			$('.tile').height(tile_height);
		}



function show_file_contents_2(selected) {

}

function get_playback_range() {
	
}



function show_file_contents(e, selected) {
		var id = selected.attr('id');
		selected.find(content).show();
		 if(selected.hasClass("audio")) {
		 	if(selected.find('audio').length === 0) {
		 			array.push(id.slice(6));
				var start = ((id.slice(6)).split('-'))[0];
				var end = ((id.slice(6)).split('-'))[1];
				var querystring = "?autoplay=1&start="+start+"&end="+end;		
				$("#youtube")[0].src = (($("#youtube")[0].src).split('?'))[0];
				$("#youtube")[0].src += querystring;
				e.preventDefault();
			} else {
				var audio = selected.find('.player')[0];
				audio.play();
				var strings = selected.find('audio').attr('src').split("/");
				var file = strings[strings.length-1];	
				array.push(file);
				
			}   if(selected.find('audio').length > 0) {
		 			if(selected.index() !== curr_tile && curr_tile !== -1) {
						$('#list').find('span:eq('+curr_tile+')').find('.player')[0].pause();
					}
				}
				curr_tile = selected.index();console.log("audio");
		} else {
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
				console.log("index array:"+array);
				console.log("index array 1: "+array_1.indexOf(array[0]));
				console.log("index array 2: "+array_2.indexOf(array[0]));
				console.log("index_1: "+index_1);
				console.log("index_2: "+index_2);
 }

 function count_attempts() {
 	var plural = ((count/2) > 1) ? "s" : "";
	//$('#count').text(count/2 + ' attempt' + plural);
 }

function check_if_tiles_are_matching() {
 if(index_1 !== index_2) {
		for(i = 0; i < (array_1.length+1)*2; i++) {
				var index = matches.indexOf(cont);
					if(index === -1) {
						$(span).delay(1000).fadeOut(500);
					}
				var span = $('#list').find('span:eq('+i+')');
				var id = $('#list').find('li:eq('+i+')').attr('id');
				if($('#list').find('li:eq('+i+')').hasClass("audio") === true) {
					if(span.find('audio').length > 0) {
						var path = $('#list').find('span:eq('+i+')').find('audio').attr('src').split("/");	
						var cont = path[path.length-1];	
					} else {
						var cont = id.slice(6);
					}			
				} else {
						var cont = $('#list').find('li:eq('+i+')').attr('id');			
				}	
				}			
} else {			console.log("match");
					matches.push(array[0]);
					matches.push(array[1]);
					count_matches++;
					console.log("Matches: "+matches);		
		}
		if(array.length > 1) {
				array.length = 0;
				}
}

$(tile).on('click', function(e) {
	var id = $(this).attr('id');
	if(id.substring(0,3) === "rm2_") {
		var start = ((id.slice(4)).split('-'))[0];
		var end = ((id.slice(4)).split('-'))[1];
	}
	$("#youtube")[0].src += "?autoplay=1&start="+start+"&end="+end;
	e.preventDefault();

})



