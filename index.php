<?php

require 'vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$keyword = 'JustinBieber';
$consumerKey = '';
$consumerSecret = '';
$accessToken = '';
$accessTokenSecret = '';

$conn = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);

$tweets = $conn->get('search/tweets', array('q' => $keyword, 'count' => 10))->statuses;

foreach ($tweets as $status) {
	if (isset($status->extended_entities->media[0]->media_url)) {
		$image_url = $status->extended_entities->media[0]->media_url;
		echo $image_url;
		//imagejpeg($image_url, "image/file.jpg");
	}
}

?>
