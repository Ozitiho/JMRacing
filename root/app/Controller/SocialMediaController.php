<?php

class SocialMediaController extends AppController {
	public function getTweets(){
		//Load the external twitter API library
		require_once(APP . 'Vendor' . DS . "twitter-api-php/TwitterAPIExchange.php");

		// These are the twitter app access tokens - see: https://dev.twitter.com/apps/
		$settings = array(
			'oauth_access_token' => "249730612-OWKcfzHN4EgjT5Lm4r2FEFGjkSfvydvAkOaDHCcO",
			'oauth_access_token_secret' => "HZTa0hNDUl4LJgCimaUFFPxumfH5xmFeR2eWUOva0Y8TX",
			'consumer_key' => "iMs9fbv99Ev5NqkW20Vio5uSZ",
			'consumer_secret' => "qvkmztmaWukquDEYBMGPPJ6Zf40NCmgiGgh0c1IKBP5vPyk6m7"
		);

		/** Perform a GET request and echo the response
			Note: Set the GET field BEFORE calling buildOauth(); **/
		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = '?screen_name=HusqvarnaMXGP';
		$requestMethod = 'GET';
		$twitter = new TwitterAPIExchange($settings);
		$tweets =  $twitter->setGetfield($getfield)
					 ->buildOauth($url, $requestMethod)
					 ->performRequest();
		
		//Decode the twitter json and return them
		return json_decode($tweets, true);
	}
	
	public function getFacebookPosts(){
		
		function shorten($string)
		{
			if (strlen($string) > 116){
				$string = substr($string, 0, 113);
				$string .= '...';
			}
			return $string;
		}
	
		//Load Facebook posts
		
		$page_id = 'husqvarnamxgp';

		$token = '243799329140027|63915777e84ed91f711ac64cf25ca565';

		// get JSON from adres
		$page_posts = file_get_contents('https://graph.facebook.com/'.$page_id.'/posts?fields=message&access_token='.$token);
		
		//Also decode the facebook json.
		$page_posts = json_decode($page_posts, true);
		
		//Shorten the text of the facebook post
		for($i = 0; $i < count($page_posts); $i++){
			$page_posts['data'][$i]['message'] = shorten($page_posts['data'][$i]['message']);
		}
		
		return $page_posts;
	}

}