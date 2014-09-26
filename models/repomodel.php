<?php

use PHPImageWorkshop\ImageWorkshop;

/**
* Repo Model
*/
class Repo // extends Model
{
	public $name;
	public $url;
	public $description;
	public $language;

	public $image_url;
	public $imageName;
	public $localImagePath = './styles/img/projectImages/';
	public $image;
	public $imageThumb;

	public $downloadLink;


	function __construct($repoObj)
	{
		// d($repoObj);
		foreach ($repoObj as $k => $v) {
			if ($k == 'name') {                                                // REPO NAME
				$this->name = $v; // $repoObj[$k];
			} elseif ($k == 'html_url') {                                      // REPO URL
				$this->url = $v;
			} elseif ($k == 'description') {                                   // DESCRIPTION
				$this->description = $v;
			} elseif ($k == 'language') {                                      // LANGUAGE
				$this->language = $v;
			}
		}
		$this->setRepoImageUrl($repoObj);                                      // IMAGE URL
		$this->imageName = $this->setImageName($this->image_url);              // IMAGE NAME
		$this->image = $this->localImagePath . $this->imageName;               // LOCAL IMAGE        (./path/to/image.png)
		$this->imageThumb = $this->localImagePath . $this->name . 'Thumb.png'; // LOCAL IMAGE THUMB  (./path/to/imageThumb.png)
		$this->setDownloadLink($repoObj);                                      // DOWNLOAD LINK

		if (!file_exists($this->image) && filesize($this->image) > 50) {

			// save the image from the url
			$this->saveImageFromUrl($this->image_url);
			// make a copy of that image, resize it to make a thumb, and set the path to the imageThumb variable
			$this->setImageThumb($this->image, $this->name . 'Thumb.png');   // IMAGE THUMB

		//  current time -   the time the file was saved   >= the amount of seconds in 1 month
		} elseif ((time() - filemtime($this->image) >= (60 * 60 * 24 * 30)) &&  (filesize($this->image) > 50)) {

			// save the image from the url
			$this->saveImageFromUrl($this->image_url);
			// make a copy of that image, resize it to make a thumb, and set the path to the imageThumb variable
			$this->setImageThumb($this->image, $this->name . 'Thumb.png');   // IMAGE THUMB

		} elseif (!file_exists($this->imageThumb) && filesize($this->image) > 50) {

			// make a copy of the main image, resize it to make a thumb, and set the path to the imageThumb variable
			$this->setImageThumb($this->image , $this->name . 'Thumb.png');   // IMAGE THUMB
		}
	}

	private function setImageThumb($imagePathToImage, $imageName)
	{
		$imageLayer = ImageWorkshop::initFromPath($imagePathToImage);
		// Resize to get the thumbnail
		$imageLayer->resizeInPixel(261, 195, false, 0, 0, 'MM');
		// Saving the result in a folder
		$imageLayer->save($this->localImagePath, $imageName, true, null, 95);
	}

	private function saveImageFromUrl($url)
	{
	    $ch = curl_init($url);
	    $fp = fopen($this->image, 'wb');
	    curl_setopt($ch, CURLOPT_FILE, $fp);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_exec($ch);
	    curl_close($ch);
	    fclose($fp);
	}

	private function setRepoImageUrl($repo)
	{
		$this->image_url = "https://raw.githubusercontent.com/" . GITHUB_USERNAME . "/". $this->name . "/" . $repo['default_branch'] . "/" . $this->name . ".png";
	}

	private function setImageName($imageUrl)
	{
		$path = parse_url($imageUrl, PHP_URL_PATH);
		$pathFragments = explode('/', $path);
		$end = end($pathFragments);
		return $end;
	}

	private function setDownloadLink($repo)
	{
		$this->downloadLink = $repo['html_url'] . '/archive/master.zip';
	}





	public function getName()
	{
		return $this->name;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getLanguage()
	{
		return $this->language;
	}

	public function getImgUrl()
	{
		return $this->image_url;
	}

	public function getImgThumb()
	{
		return $this->imageThumb;
	}

	public function getImg()
	{
		return $this->image;
	}

	public function getDownloadLink()
	{
		return $this->downloadLink;
	}

	// public function cacheRepo($reposDir)
	// {
	// 	if (file_exists('./vendor/autoload.php') && is_dir('./repos/')) {
	// 	    require_once "./vendor/autoload.php";

	// 	    $client = new \Github\Client(
	// 	        new \Github\HttpClient\CachedHttpClient(array($reposDir => '/tmp/github-api-cache'))
	// 	    );

	// 	    // // Or select directly which cache you want to use
	// 	    // $client = new \Github\HttpClient\CachedHttpClient();
	// 	    // $client->setCache(
	// 	    //     // Built in one, or any cache implementing this interface:
	// 	    //     // Github\HttpClient\Cache\CacheInterface
	// 	    //     new \Github\HttpClient\Cache\FilesystemCache('/tmp/github-api-cache')
	// 	    // );

	// 	    // $client = new \Github\Client($client);

	// 		// if($data = $cache->get_cache('label')){
	// 		//     $data = json_decode($data);
	// 		// } else {
	// 		//     $data = $cache->do_curl('http://some.api.com/file.json');
	// 		//     $cache->set_cache('label', $data);
	// 		//     $data = json_decode($data);
	// 		// }
	// 	}

	// 	// $projectImgPath = './styles/img/projectImages/';
	// 	// $externalImageName = get_the_tail_value_of($image_url); // FIX
	// 	// $thumbImage = $projectImgPath . rtrim($externalImageName, '.png') . '-thumb.png';
	// 	// if (contains($projectImgPath . '*', $externalImageName)) { // FIX

	// 	// 	$cachedImage = $projectImgPath . $externalImageName; // still contains '.png' file extension

	// 	// 	if (getDate($image_url) is newer than getDate($cachedImage)) { // FIX
	// 	//         $pathToNewlyCachedImage = cache($image_url); // FIX
	// 	//         $pathToNewlyCachedImageThumb = exists($thumbImage) ? cache(createNewThumbImage($image_url) : $thumbImage ); // FIX:  cache()  &&  createNewThumbImage()

	// 	// 	    $this->image = $pathToNewlyCachedImage;
	// 	// 	    $this->imageThumb = $pathToNewlyCachedImageThumb;
	// 	// 	}

	// 	// } else {
	// 	// 	// create new image in './styles/img/projectImages/' titled $externalImageName
	// 	// 	createNewImage($projectImgPath . $externalImageName);
	// 	// 	createNewThumbImage($thumbImage);

	// 	// 	$this->image = $pathToNewlyCachedImage;
	// 	// 	// create new image thumb in './styles/img/projectImages/' titled rtrim($externalImageName, '.png') . '-thumb.png'
	// 	// 	// && cache the new image thumb
	// 	// 	$this->imageThumb = $pathToNewlyCachedImageThumb;
	// 	// }
	// }

	// public function createNewImage($imagePathOrUrl)
	// {
	// 	// make the new image in $imagePathOrUrl
	// 	if (type($imagePathOrUrl) == 'url') { // FIX
	// 		// make the new image from a url
	// 	} else {
	// 		// make the new image by pulling from
	// 	}
	// }

	private function addThumbImage($repositories)
	{
	//     $count = 0;
	//     // $images = array();
	//     foreach ($repositories as $repository) {
	//         $image = cacheNewerImage($repository);

	//         $repositories[$count]['image thumb'] = "";
	//         $count++;
	//     }
	//     return $repositories;
	}
}