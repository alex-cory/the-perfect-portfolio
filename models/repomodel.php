<?php

/**
* Repo Model
*/
// class Repo extends Model
// {
// 	public $name;
// 	public $url;
// 	public $image;
// 	public $imageThumb;
// 	public $downloadLink;

// 	function __construct($repoObj)
// 	{
// 		foreach ($repoObj as $k => $v) {
// 			if ($k == 'name') {
// 				$this->name = $repoObj[$k];
// 			} elseif ($k == '') {
// 				# code...
// 			}
// 		}
// 	}

// 	public function addRepoImageUrl($repo)
// 	{
// 		if (is_object($repo)) {
// 			foreach ($repo as $k => $v) {
// 				if ($k == 'default_branch') {
// 					$image_url = "https://raw.githubusercontent.com/" . GITHUB_USERNAME . "/". $name . "/" . $v . "/" . $name . ".png";
// 				}
// 			}
// 			cacheNewerImage($image_url);

// 		} else {
// 			return 'the argument you passed is not an object.. hmm... weird.. :/';
// 		}
// 	}

// 	public function setDownloadLink($repo)
// 	{
// 		$this->downloadLink = $repo['html_url'] . '/archive/master.zip';
// 	}

// 	public function getDownloadLink($repo)
// 	{
// 		return $this->downloadLink;
// 	}

// 	public function cacheNewerImage($image_url)
// 	{
// 		$projectImgPath = './styles/img/projectImages/';
// 		$externalImageName = get_the_tail_value_of($image_url); // FIX
// 		$thumbImage = $projectImgPath . rtrim($externalImageName, '.png') . '-thumb.png';
// 		if (contains($projectImgPath . '*', $externalImageName)) { // FIX

// 			$cachedImage = $projectImgPath . $externalImageName; // still contains '.png' file extension

// 			if (getDate($image_url) is newer than getDate($cachedImage)) { // FIX
// 		        $pathToNewlyCachedImage = cache($image_url); // FIX
// 		        $pathToNewlyCachedImageThumb = exists($thumbImage) ? cache(createNewThumbImage($image_url) : $thumbImage ); // FIX:  cache()  &&  createNewThumbImage()

// 			    $this->image = $pathToNewlyCachedImage;
// 			    $this->imageThumb = $pathToNewlyCachedImageThumb;
// 			}

// 		} else {
// 			// create new image in './styles/img/projectImages/' titled $externalImageName
// 			createNewImage($projectImgPath . $externalImageName);
// 			createNewThumbImage($thumbImage);

// 			$this->image = $pathToNewlyCachedImage;
// 			// create new image thumb in './styles/img/projectImages/' titled rtrim($externalImageName, '.png') . '-thumb.png'
// 			// && cache the new image thumb
// 			$this->imageThumb = $pathToNewlyCachedImageThumb;
// 		}
// 	}

// 	public function createNewImage($imagePathOrUrl)
// 	{
// 		// make the new image in $imagePathOrUrl
// 		if (type($imagePathOrUrl) == 'url') { // FIX
// 			// make the new image from a url
// 		} else {
// 			// make the new image by pulling from
// 		}
// 	}

// 	public function createNewThumbImage($imagePath)
// 	{
// 		// make the new thumb image in $imagePath
// 	}

// 	public function addThumbImages($repositories)
// 	{
// 	    $count = 0;
// 	    // $images = array();
// 	    foreach ($repositories as $repository) {
// 	        $image = cacheNewerImage($repository);

// 	        $repositories[$count]['image thumb'] = "";
// 	        $count++;
// 	    }
// 	    return $repositories;
// 	}
}