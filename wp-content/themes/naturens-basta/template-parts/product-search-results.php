<?php
/*
Template Name: Product Search Result
*/

$list = array();
$item = array();
foreach($_POST as $key => $value){
	if($value != ''){
		//$item['taxonomy'] = htmlspecialchars($key);
        $item['taxonomy'] = ($key);
		//$item['terms'] = htmlspecialchars($value);
        $item['field'] = 'slug';
        $item['terms'] = ($value);
		$list[] = $item;
	}
}
$cleanArray = array_merge(array('relation' => 'AND'), $list);
//$cleanArray = array_merge(array(), $list);

print_r($cleanArray);

$args['post_type'] = 'produkt';
$args['showposts'] = 9;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args['paged'] = $paged;
$args['tax_query'] = $cleanArray;
$the_query = new WP_Query( $args );
?>

<?php echo ($the_query->found_posts > 0) ? '<h3 class="foundPosts">' . $the_query->found_posts. ' listings found</h3>' : '<h3 class="foundPosts">We found no results</h3>';?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>

	<?php the_title(); ?>

	<?php endwhile; wp_reset_postdata();?>

<div class="row page-navigation">
	 <?php next_posts_link('&laquo; Older Entries', $the_query->max_num_pages) ?>
	 <?php previous_posts_link('Newer Entries &raquo;') ?>
</div>