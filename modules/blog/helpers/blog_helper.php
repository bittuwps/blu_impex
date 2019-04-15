<?php
if ( ! function_exists('blog_rating')){	
	function blog_rating($blog_id){  
		$var="";
		$rating = custom_result_set("select avg(rating) as star_rating from wl_blog_comment WHERE ref_article_id='".$blog_id."' and status !=0");
		$starRating = $rating[0]['star_rating'];
		$starRating = ceil($starRating);
		for($i=1; $i<=$starRating;$i++ ){
			$var .='
				<img src="'.theme_url().'images/star.png" alt="">
			';
		}
		echo $var;
	}
}

if ( ! function_exists('blog_rating_single')){	
	function blog_rating_single($com_id){  
		$var="";
		$rating = custom_result_set("select rating as star_rating from wl_blog_comment WHERE comment_id='".$com_id."' and status !=0");
		$starRating = $rating[0]['star_rating'];
		$starRating = ceil($starRating);
		for($i=1; $i<=$starRating;$i++ ){
			$var .='
				<img src="'.theme_url().'images/star.png" alt="">
			';
		}
		echo $var;
	}
}