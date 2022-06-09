<?php 

function getArticleList($category, $number){
	$file = file_get_contents("https://bg.annapurnapost.com/api/news/list?page=1&per_page={$number}&category_alias={$category}&isCategoryPage=1");

	$enc = json_decode($file, true);

	return $enc['data'];
}

function getOneArticle($id, $slug){
	$file = file_get_contents("https://annapurnapost.com/news/{$slug}-{$id}");


	$dom = new domDocument;
	@$dom->loadHTML($file);

	return $dom;
}

?>




