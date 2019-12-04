<?php

header('Content-Type: text/plain; charset=UTF-8');
header('Content-Disposition: attachment; filename="talkmojang.club_export_'.time().'.txt"');

if(preg_match_all("/(^|\\x00)([^\\x00]+)($|\\x00)/s", file_get_contents('talktalktalk.db.dat'), $matches) > 0){
	foreach($matches[2] as $message){
		$json = @json_decode($message, true);
		if(isset($json["type"]) and $json["type"] === "message"){
			echo "[" . date("c", $json["datetime"]) . "] <". $json["username"]."> ".html_entity_decode($json["message"], ENT_HTML5 | ENT_QUOTES, "UTF-8") . "\r\n";
		}
	}
}
