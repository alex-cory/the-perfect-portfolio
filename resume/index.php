<?php
// echo $_SERVER['HTTP_HOST'];

function getRecentResume()
{
	$pwd = 'pwd';
	$directory = exec($pwd);

	$filename = null;
	if ($handle = opendir($directory)) {
	    while (false !== ($entry = readdir($handle))) {
	        if (!is_dir($entry) && strstr($entry, 'resume')) { // no directories, only files. (Otherwise exclude directories . and ..)
	            if ($filename === null || $tmp < filectime($entry)) { // or use filemtime() for last modified time in stead of last change time
	                $tmp = $time = filectime($entry);
	                $filename = $entry;
	            }
	        }
	    }
	    if ($filename === null) {
	        $error = "No files found";
	    } else {
	        // echo "Last changed file is: " . $filename . ". It was last changed at: " . date('r', $time) . ".";
	    	return $filename;
	    }
	    closedir($handle);
	} else {
	    $error = "Could not open directory";
	}
}

$most_recent_resume = getRecentResume();

$file = "./" . $most_recent_resume;
$filename = $most_recent_resume; /* Note: Always use .pdf at the end. */

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

@readfile($file);
?>