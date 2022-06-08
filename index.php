<?php include('function.php'); 
 $dataFlag = false;
 $number = 30;
 $current_page = 1;
 $context = false;
 if(isset($_GET['category']) && $_GET['count'] ){

 	$content_check = $_GET['category'];
 	if($content_check == 'latest-news' || $content_check == 'editorial' || $content_check == 'apheadline' || $content_check == 'politics' || $content_check == 'sports' || $content_check == 'interview' || $content_check == 'opinion' || $content_check == 'economy' || $content_check == 'health' || $content_check == 'tech' || $content_check == 'foreign'){
 		$context = $content_check;
 		$dataFlag = true;
 	}

 	$number = $_GET['count'];

 }
 $start  = 0;
 $per_page=5;
 if(isset($_GET['start'])){
 	 $start = $_GET['start'];
 	 $current_page = $start;
 	 $start--;

 	 $start = $start*$per_page;
 	

 }

$pagination = ceil($number/$per_page);

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search</title>
</head>
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}
.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

</style>
<body style="padding: 30px;">
<h5>Categories: latest-news,editorial,apheadline,politics,sports,foreign,tech</h5>
	 <form action="<?php  $_PHP_SELF; ?>" method="GET">
                           
     	<input type="text" name="category" required placeholder="Search by category">
	    <input type="number" max="100" min="1" name="count" required placeholder="Number of article">
        <button  type="submit">Search
        </button>
     </form>
     <h4 style= 'color:#ff0000;'><?php if(isset($_GET['category']) && !$dataFlag){
     		echo "Invalid requested data format. Please use above categories.";
     	} ?></h4>
      <?php if($dataFlag){ ?>
     <div class="container">
     	<?php  if($dataFlag){ $articleDataAll =  getArticleList($context,$number);

     	} ?>
     	<h2>Articles</h2>
     	<ul>
     		<?php $count = 0;


     		while ( $count < $per_page ){
     			$final = $start+$count;
     			
     			$articleData = $articleDataAll[$final];

     			?>
     			<h2><ul><a href="view.php?id=<?php echo $articleData['id'];?>&amp;slug=<?php echo $articleData['slug'];?>&amp;featuredImage=<?php echo $articleData['featuredImage'];?>"><?php echo $articleData['title'] ;$count++;?></a></ul></h2>
     		<?php if($final == $number-1){break;}}; ?>
     	</ul>
     	
       <div class="pagination" style="padding-left: 80px;">
		  
	   <?php for($i=1; $i<=$pagination;$i++){?>
	   	<a class="<?php echo  ($current_page == $i) ? 'active': '';?>" href="index.php?category=<?php echo $context?>&amp;count=<?php echo $number;?>&amp;start=<?php echo $i;?>"><?php echo $i; ?></a>

	   <?php  }; ?>
		  
       </div>
     </div>
 <?php ;}?>



</body>
</html>