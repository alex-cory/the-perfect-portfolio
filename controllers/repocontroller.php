<?php

/**
* Repository Controller
*/
class RepoController //  extends Controller
{
    public $repos = array();
    public $error = 'error not set';

    function __construct($githubUsername)
    {
        if (GITHUB_USERNAME) {
            $githubUsername = GITHUB_USERNAME;
        }
        // This file is generated by Composer
        if (file_exists('./vendor/autoload.php') && file_exists('./models/repomodel.php')) {
            require_once "./vendor/autoload.php";
            require_once './models/repomodel.php';
            // $client = new \Github\Client();

            // cache the data for faster referencing
            $client = new \Github\Client(
                new \Github\HttpClient\CachedHttpClient(array('cache_dir' => './repos'))
            );

            $repositories = $client->api('user')->repositories($githubUsername);
            // d($repositories);

            foreach ($repositories as $repository) {
                $repo = new Repo($repository);
                $this->repos[] = $repo;
            }
            // return $repositories;
        } else {
            $this->error = 'the file path must be off';
            echo $this->error;
        }
    }

    /**
     * GET ALL REPOSITORIES:
     *
     * @param  string $username     [the username of the person]
     * @return array  $repositories [contains an array of repositories]
     */
    function getAllRepositories()
    {
        // This file is generated by Composer
        if (file_exists('./vendor/autoload.php')) {
            return $this->repos;
        } else {
            $error = 'the file path must be off.  "autoload.php" isn\'t getting loaded.';
            return $error;
        }
    }


    /**
     * ADD IMAGES FROM REPOS:
     *
     * @param  string $username [the username of the person]
     * @param  object $repos    [these contain all the data for each repo]
     * @return string $images   [url for the image!]
     */
    function addImagesFromRepos($repositories)
    {
        $count = 0;
        // $images = array();
        foreach ($repositories as $repository) {
            $repositories[$count]['image'] = "https://raw.githubusercontent.com/" . GITHUB_USERNAME . "/". $repository['name'] . "/" . $repository['default_branch'] . "/" . $repository['name'] . ".png";
            $count++;
        }
        return $repositories;
    }


    // $image_urls[] = "http://url_of_image_to_be_resized"; // image being pulled in from github
    // $cachedImages = array(); // array of locally cached images

    // if (empty(dirName($cachedImages))) {
    //     // pull in all the images and cache them with the ending of the url
    // } else {
    //     foreach ($cachedImages as $cachedImage) {
    //         foreach ($image_urls as $image_url) {
    //             if (getName($image_url) == getName($cachedImage) && sizex($image_url) < sizex($cachedImage)) { // if the size of the external image is smaller than the size of the internal image
    //                 // cache the external image overwriting the old one
    //                 // $new_cached_image = "file path to the newly cached image";
    //                 // $images[] = $new_cached_image; // add the newly cached image
    //             } else {
    //                 // run the image resize function on the external image url
    //                 // then cache that
    //             }
    //         }
    //     }
    // }

    /**
     * URL EXISTS:
     *
     * @param  string  $url [the url to be tested]
     * @return boolean      [true or false]
     */
    function url_exists($url)
    {
        $file = $url;
        $file_headers = @get_headers($file);
        if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
        } else {
            $exists = true;
        }
        return $exists;
    }

    /**
     * LIVE DEMO:
     */
    function addLiveDemo()
    {
        # code...
    }
}


// /**
//  * GET ALL REPOSITORIES:
//  *
//  * @param  string $username     [the username of the person]
//  * @return array  $repositories [contains an array of repositories]
//  */
// function getAllRepositories()
// {
//     // This file is generated by Composer
//     if (file_exists('./vendor/autoload.php')) {
//         require_once "./vendor/autoload.php";
//         $client = new \Github\Client();
//         $repositories = $client->api('user')->repositories(GITHUB_USERNAME);
//         $repositories = addImagesFromRepos($repositories);
//         return $repositories;
//     } else {
//         return 'the file path must be off';
//     }
// }


// /**
//  * ADD IMAGES FROM REPOS:
//  *
//  * @param  string $username [the username of the person]
//  * @param  object $repos    [these contain all the data for each repo]
//  * @return string $images   [url for the image!]
//  */
// function addImagesFromRepos($repositories)
// {
//     $count = 0;
//     // $images = array();
//     foreach ($repositories as $repository) {
//         $repositories[$count]['image'] = "https://raw.githubusercontent.com/" . GITHUB_USERNAME . "/". $repository['name'] . "/" . $repository['default_branch'] . "/" . $repository['name'] . ".png";
//         $count++;
//     }
//     return $repositories;
// }


// public function addThumbImages($repositories)
// {
//     $count = 0;
//     // $images = array();
//     foreach ($repositories as $repository) {
//         $image = cacheNewerImage($repository);

//         $repositories[$count]['image thumb'] = "";
//         $count++;
//     }
//     return $repositories;
// }

// public function cacheNewerImage($externalImage, $cachedImage)
// {
//     // if date(image) is newer than date(cachedImage)
//         // cache the image
//     // return $pathToNewlyCachedImage
// }
// $image_urls[] = "http://url_of_image_to_be_resized"; // image being pulled in from github
// $cachedImages = array(); // array of locally cached images

// if (empty(dirName($cachedImages))) {
//     // pull in all the images and cache them with the ending of the url
// } else {
//     foreach ($cachedImages as $cachedImage) {
//         foreach ($image_urls as $image_url) {
//             if (getName($image_url) == getName($cachedImage) && sizex($image_url) < sizex($cachedImage)) { // if the size of the external image is smaller than the size of the internal image
//                 // cache the external image overwriting the old one
//                 // $new_cached_image = "file path to the newly cached image";
//                 // $images[] = $new_cached_image; // add the newly cached image
//             } else {
//                 // run the image resize function on the external image url
//                 // then cache that
//             }
//         }
//     }
// }



// /**
//  * LIVE DEMO:
//  */
// function addLiveDemo()
// {
//     # code...
// }

