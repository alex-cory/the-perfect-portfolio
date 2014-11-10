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
	public $demoLink = '#N/A';


	function __construct($repoObj)
	{
		// parse $repoObj
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
		$this->setdemoLink($this->name);                                       // LIVE DEMO LINK

		if (!file_exists($this->image)) {

			// save the image from the url
			$this->saveImageFromUrl($this->image_url);
			// resize the main image
			$this->setImageThumb($this->image, $this->name, 800, 500);
			// make a copy of that image, resize it to make a thumb, and set the path to the imageThumb variable
			$this->setImageThumb($this->image, $this->name . 'Thumb.png', 261, 195);   // IMAGE THUMB

		// current time - the time the file was saved >= the amount of seconds in 1 month
		} elseif ((time() - filemtime($this->image) >= (60 * 60 * 24 * 30)) && (filesize($this->image) > 50)) {

			// save the image from the url
			$this->saveImageFromUrl($this->image_url);
			// make a copy of that image, resize it to make a thumb, and set the path to the imageThumb variable
			$this->setImageThumb($this->image, $this->name . 'Thumb.png', 261, 195);   // IMAGE THUMB

		} elseif (!file_exists($this->imageThumb) && filesize($this->image) > 50) {

			// make a copy of the main image, resize it to make a thumb, and set the path to the imageThumb variable
			$this->setImageThumb($this->image , $this->name . 'Thumb.png', 261, 195);   // IMAGE THUMB
		}
	}

	/**
	 * Set Image Thumb:
	 * This copies the specified image, resizes it, and stores it in the default specified directory.
	 *
	 * @param string $imagePathToImage image you are trying to manipulate
	 * @param string $imageName        what you want to name the new image
	 * @param int    $width            width of new image
	 * @param int    $height           height of new image
	 */
	private function setImageThumb($imagePathToImage, $imageName, $width, $height)
	{
		$imageLayer = ImageWorkshop::initFromPath($imagePathToImage);
		// Resize to get the thumbnail
		$imageLayer->resizeInPixel($width, $height, false, 0, 0, 'MM');
		// Saving the result in a folder
		$imageLayer->save($this->localImagePath, $imageName, true, null, 95);
	}

	/**
	 * Save Image From URL:
	 * This saves an "image" from an "image url" to the specified "file path"
	 *
	 * @param  string $url the image url
	 */
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

	/**
	 * Set Repo Image:
	 * This sets each repo's "image url."
	 *
	 * @param string $repo the image url for a repo
	 */
	private function setRepoImageUrl($repo)
	{
		$this->image_url = "https://raw.githubusercontent.com/" . GITHUB_USERNAME . "/". $this->name . "/" . $repo['default_branch'] . "/" . $this->name . ".png";
		// ex: https://raw.githubusercontent.com/alex-cory/hackingedu-website/master/hackingedu-website.png
	}

	/**
	 * Set Image Name:
	 * This grabs the last value of the "url" and sets it to the image's name.
	 *
	 * @param   string $imageUrl the url of the image
	 * @return  string $end      the name of the image ie: name.png
	 */
	private function setImageName($imageUrl)
	{
		// grabs the path
		$path = parse_url($imageUrl, PHP_URL_PATH);
		// seperates the path into parts by "/" and stores them into an array
		$pathFragments = explode('/', $path);
		// grabbing the last value in the array
		$end = end($pathFragments);
		return $end;
	}

	/**
	 * Set Download Link:
	 * This generates a download link for each repository.
	 *
	 * @param object $repo an individual repo object
	 */
	private function setDownloadLink($repo)
	{
		$this->downloadLink = $repo['html_url'] . '/archive/master.zip';
	}

	/**
	 * Set Demo Link:
	 * This adds the proper demo link for each repository.
	 *
	 * @param string $repoName the name of the repo
	 */
	private function setDemoLink($repoName)
	{
		if ($repoName == 'mvc-website') {
			$this->demoLink = 'http://roomatematcher.com';
		} elseif ($repoName == 'vocaldash') {
			$this->demoLink = 'http://alexcory.com/vocaldash';
		} elseif ($repoName == 'geodometer') {
			$this->demoLink = 'http://geodometer.com';
		} elseif ($repoName == 'techtalksfsu') {
			$this->demoLink = 'http://alexcory.com/techtalksfsu';
		} elseif ($repoName == 'google-students') {
			$this->demoLink = 'http://alexcory.com/techtalknu';
		} elseif ($repoName == 'hackingedu-website') {
			$this->demoLink = 'http://hackingedu.co';
		} elseif ($repoName == 'iwantfood') {
			$this->demoLink = 'http://alexcory.com/iwantfood';
		}
	}


	// GETTERS
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

	public function getDemoLink()
	{
		return $this->demoLink;
	}
}