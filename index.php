<?php

require 'vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$keyword = 'JustinBieber';
$consumerKey = 'UhuBsj54DbRnnHGQYaPywHmAi';
$consumerSecret = 'e1zSaGoQorVKzyW5W7U8LaAmkUsf3nnjdIHCxh45Y03bnnBj86';
$accessToken = '42566916-5CI2BDtmiUQdWFKtTY6ajgxmLlYjURI4ftW2K88h3';
$accessTokenSecret = 'YHfdFB1RJxIcHQ6XOriX0GZhmZmFpNmI5wegaBIRDflIU';

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