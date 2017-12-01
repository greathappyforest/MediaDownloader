<?php

$CONFIG = array (
	// Enable password restriction (boolean)
	'security' => true,
		
	// MD5 hash of choosen password. helloworld
	'password' => 'fc5e038d38a57032085441e7fe7010b0',
	
	// Relative folder (from MediaDownloader folder) where to store downloaded files. No need for trailing slash. (string)
	'output_folder' => 'downloads',
		
	// Prefered post processor between avconv or ffmpeg. (string)
	'post_processor' => 'ffmpeg',
		
	// Maximum simultaneous server downloads limit. Set to 0 to disable limit. (integer)
	'max_dl' => 8
);

?>
