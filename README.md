# memory-quiz
Memory-Quiz is an exciting combination of a memory and a quiz game. You need to match tiles which are not equal but related (e.g. movie posters and movie soundbits, national flags and national hymns, etc.). Each pair is made up of an image and an audio track.

Memory-quiz is a browser game built with PHP, MySQL, Javascript and jQuery. The game works with mp3 files as an audio source as well as with embedded youtube videos.

== HOW TO USE ==

1. Import the sql database file in phpmyadmin.
2. Rename the columns and entries of the database tables
3. Adjust your database settings and the file paths constants  for the images and audio files (IMG, AUDIO) in config.php
4. Rename the value attributes in the html select tags in index.php so that they match the name of the database table.
5. Rename the subfolders of the audio and img folder so that match the name of the database table.
6. Make sure, that the file names in the audio and image subfolders are identical with the names in the database table.
7. You can change the background and the description text in that you tweak the function get_task_description() in app.js.
