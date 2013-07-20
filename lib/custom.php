<?php 
add_action( 'reverie_page_links', 'reverie_page_links', 10, 1 );
/**
 * Modification of wp_link_pages() for custom styling for foundation 2 & 3 by Zurb for use within wordpress.
 *
 * Please retain author links.
 *
 * @ author:     Flickapix Dezign
 * @ author url: http://dezign.flickapix.co.uk
 * @ param  array $args
 * @ return void
 */
function reverie_page_links( $args = array () )
{
    $defaults = array(
        'before'         => '<ul class="pagination">',
        'after'          => '</ul>',
        'link_before'    => '',
        'next_or_number' => 'number',
        'link_after'     => '',
        'pagelink'       => '%',
        'echo'           => 1,
        'pages'          => '<p class="pages">' . __('Pages','wci').':</p>',
        'current_first'  => '<li class="current"><a href="">',
        'current_last'   => '</a></li>',
    );
    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );
 
    global $page, $numpages, $multipage, $more, $pagenow;
    if ( ! $multipage )
    {
        return;
    }
    $output = $before;
    
    print $output . $pages;
    
    for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
    {
        $j       = str_replace( '%', $i, $pagelink );
        $output .= ' ';
 
        if ( $i != $page || ( ! $more && 1 == $page ) )
        {
            $output .= "<li>";
            $output .= _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a>";
            $output .= "</li>";
        }
        else
        {   
            $output .= "{$current_first}{$link_before}{$j}{$link_after}{$current_last}";
        }
    }
    print $output . $after;
}

/**
 * Display template for breadcrumbs.
 *
 */
function wci_breadcrumbs() {
  
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
  
  global $post;
  $homeLink = get_bloginfo('url');
  
  if (is_home() || is_front_page()) {
  
    if ($showOnHome == 1) echo '<div id="crumbs class="breadcrumb""><a href="' . $homeLink . '">' . $home . '</a></div>';
  
  } else {
  
    echo '<div id="crumbs" class="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
  
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
  
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
  
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
  
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
  
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
  
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
  
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
  
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
  
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
  
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
  
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
  
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','wci') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  
    echo '</div>';
  
  }
} // end wci_breadcrumbs()

//Display Excerpts of Child Pages with a Shortcode
// subpage_peek
function subpage_peek() {
	global $post;
	
	//query subpages
	$args = array(
		'post_parent' => $post->ID,
		'post_type' => 'page'
	);
	$subpages = new WP_query($args);
	
	// create output
	if ($subpages->have_posts()) : 
		$output = '<ul>';
		while ($subpages->have_posts()) : $subpages->the_post();
			$output .= '<li><strong><a href="'.get_permalink().'">'.get_the_title().'</a></strong>
						<p>'.get_the_excerpt().'
						</li>';
		endwhile;
		$output .= '</ul>';
	else :
		$output = '<p>No subpages found.</p>';
	endif;
	
	// reset the query
	wp_reset_postdata();
	
	// return something
	return $output;
}

// turn the function into a shortcode
add_shortcode('subpage_peek', 'subpage_peek');