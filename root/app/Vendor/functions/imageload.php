<?php
	function loadImage($id, $context){
		$fullImageLocation = "/images/no-photo.jpg"; // In case no image can be found
		$thumbImageLocation = $fullImageLocation; // In case no image can be found
		
		if($id !== null){
			$imageDetails = $context->requestAction('albums/getDetailsFromPhotoID/' . $id);
		}
		// If an image is found
		if (isset($imageDetails)) {
			$albumID = $imageDetails["Photo"]["album_id"];
			$imageName = $imageDetails["Photo"]["name"];
			$fullImageLocation = "/images/albums/$albumID/$imageName";
			$thumbImageLocation = "/images/albums/$albumID/thumbs/$imageName";
			$image['name'] = $imageName;
			$image['album'] = $albumID;
		}
		
		$image['full'] = $fullImageLocation;
		$image['thumb'] = $thumbImageLocation;
		
		return $image;
	}