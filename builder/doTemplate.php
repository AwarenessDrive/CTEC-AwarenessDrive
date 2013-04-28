<?php
$baseDir = "../";
$sourceDir = "../source/";

$templateFileName = "template.html";

$fileList = array ( 
		"about" =>
			array("base" => "about.html", "outfile" => "about.html",
					"title" => "AwarenessDrive.org - About"),
		"blog" =>
			array("base" => "blog.html", "outfile" => "blog.html",
					"title" => "AwarenessDrive.org - BeAware Blog"),
		"contact" => 
			array("base" => "contact.php", "outfile" => "contact.php",
					"title" => "AwarenessDrive.org - Contact"),
		"events" => 
			array("base" => "events.html", "outfile" => "events.html",
					"title" => "AwarenessDrive.org - Events"),
		"index" => 
			array("base" => "index.html", "outfile" => "index.html",
					"title" => "AwarenessDrive.org - Home"),
		"library"=> 
			array("base" => "library.html", "outfile" => "library.html",
					"title" => "AwarenessDrive.org - BeAware Library"),
		"links" =>
			array("base" => "links.html", "outfile" => "links.html",
					"title" => "AwarenessDrive.org - Links"),
		"posters" => 
			array("base" => "posters.html", "outfile" => "posters.html",
					"title" => "AwarenessDrive.org - Posters")
);

function buildFromTemplate($templateFileName, $breakString, $baseFileName, $outFileName, $pageTitle) {

	$tmpltAry = file($templateFileName);
	$outHandle = fopen($outFileName, 'w');
	
	$baseHandle = fopen($baseFileName, 'r');
	while ($line = array_shift($tmpltAry)) {
			// depends on title all being on one line...
			if (preg_match("/<title./", $line)) {
				$line = preg_replace("/(<title.*>).*(<.title>)/","\${1}$pageTitle\$2", $line);
			}
			if (preg_match("/$breakString/", $line)) {
			break;
		}
		fwrite($outHandle, $line, strlen($line));
	}
	$line = fread($baseHandle, filesize($baseFileName));
	$line .= "\n";
	fwrite($outHandle, $line, strlen($line));
	while ($line = array_shift($tmpltAry)) {
		fwrite($outHandle, $line, strlen($line));
	}
}


foreach ($fileList as $index => $target) {
	// 	echo $index ."=>" . print_r($target) . "\n";
	buildFromTemplate($baseDir . $templateFileName, 'TEMPLATE_BREAK', 
		$sourceDir . $target['base'], $baseDir . $target['outfile'], $target['title']);
	//	echo  $target=>base . "\n";
}
exit;

?>