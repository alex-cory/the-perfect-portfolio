<?php

use PHPImageWorkshop\ImageWorkshop;

/**
* Repo Model
*/
class Repo /* extends Model */ {

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
}