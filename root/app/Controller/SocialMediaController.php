<?php

class SocialMediaController extends AppController {
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('getFacebookPictures', 'getTweets', 'getFacebookPosts');
    }
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
			if (strlen($string) > 140){
				$string = substr($string, 0, 137);
				$string .= '...';
			}
			return $string;
		}
	
		//Load Facebook posts
		
		//The page from which to get the posts
		$page_id = 'husqvarnamxgp';

		//The security token for the application
		$token = '243799329140027|63915777e84ed91f711ac64cf25ca565';

		// get JSON from adres, the @ represses the error it gives upon failing to get content		
		$url = 'https://graph.facebook.com/'.$page_id.'/posts?fields=message&access_token='.$token;
		
		//  Initiate curl
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		// Execute
		$page_posts=curl_exec($ch);
		// Closing
		curl_close($ch);
		
		//Also decode the facebook json.
		$page_posts = json_decode($page_posts, true);
		
		//Shorten the text of the facebook post
		for($i = 0; $i < count($page_posts); $i++){
			$page_posts['data'][$i]['message'] = shorten($page_posts['data'][$i]['message']);
		}
		
		return $page_posts;
	}
	
	public function getFacebookPictures(){
		//Load Facebook pictures
		
		//The ID of the facebook picture album
		$album_id = '630229000370596';

		//The security token for the application
		$token = '243799329140027|63915777e84ed91f711ac64cf25ca565';

		// get JSON from adres
		$url = 'https://graph.facebook.com/'.$album_id.'/photos?access_token='.$token;
		
		//  Initiate curl
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		// Execute
		$page_posts=curl_exec($ch);
		// Closing
		curl_close($ch);

		//Also decode the facebook json.
		$page_posts = json_decode($page_posts, true);
		
		return $page_posts['data'];
	}
}