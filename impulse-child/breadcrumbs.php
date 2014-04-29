<!--based on Ivovic's code snippet here: 
http://wordpress.org/support/topic/display-page-parent-on-page-with-title.  Thanks Ivovic.-->

<div class="crumbs"> <!--NOT using Foundation's breadcrumbs class, I don't want that styling.-->

<?php 
$breadcrumbs = array();
//$parent_id = $post->ID;  //start (end) with yourself
$parent_id = $post->post_parent;
while ($parent_id) {
    $page = get_page($parent_id);
    
    //the title for the breadcrumbs is going to be the slug so we have to format it
    if ($page->post_name == "shabbat") {
        $title = "Shabbat: The REST of Limmud";
    } else {
		$title_array = explode('-', $page->post_name);
		$title = implode(' ', $title_array);
		$title = ucwords($title);
	}
    
    
    $breadcrumbs[] = '<a class="crumb" href="' . get_permalink($page) . '">'
    . $title . '</a>';
    $parent_id = $page->post_parent;
}

/*this is a hack, because I don't know how to use an array as a queue.
instead I'll pop the last element (the oldest grandparent) before reversing the array.*/
$crumb = array_pop($breadcrumbs);
echo $crumb;

$breadcrumbs = array_reverse($breadcrumbs);


foreach ($breadcrumbs as $crumb) {
    echo ' > ' . $crumb;
}
?>
</div>