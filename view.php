<?php  
include('function.php');

if(isset($_GET['id']) && isset($_GET['slug'])){
	$contentId = $_GET['id'];

	$contentSlug = $_GET['slug'];

	if(isset($_GET['featuredImage'])){
		$isImage = true;
		$contentImage = $_GET['featuredImage'];
	}

	$dom =  getOneArticle($contentId, $contentSlug);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data View</title> 
</head>
<body>

	<div style="padding: 30px;">
		<h1><?php
		    $scrape = $dom->getElementsByTagName('h1');

	        foreach($scrape as $title){
	        	echo "Title:\n".$title->nodeValue;
            }?>
        </h1>

		<p><?php 
			$scrape2 = $dom->getElementsByTagName('p');
	    	foreach($scrape2 as $p){
	    		echo $p->nodeValue;
	    	}?>
		 </p>
	</div>
	<div><?php if($isImage){?>
		<img  style="padding: 30px;" src="https://bg.annapurnapost.com<?php echo $contentImage?>" alt="" class="img-responsive" width="450">
	    <?php }?>
	</div>
</body>
</html>
