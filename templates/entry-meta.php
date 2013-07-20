<div class="post-header row-fluid">
  <div class="post-meta clearfix">
    <div class="post-date">
      <i class="icon-calendar"></i><?php echo get_the_date(); ?>
    </div>
    <div class="post-author">
      <i class="icon-user"></i>
      <?php the_author_posts_link(); ?>
    </div>
    <div class="post-category">
      <i class="icon-folder-open"></i><span>
      <?php 	$categories = get_the_category();
            $seperator = ' , ';
            $output = '';
            $slugs = '';
            if($categories){
                foreach($categories as $category) {
                    if($slugs != '') $slugs .= ',';
                    $slugs .= $category->term_id;
                    $output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'wci'), $category->name ) ) . '">'.$category->cat_name.'</a>'.$seperator;
                }
            echo trim($output, $seperator);
            }
 ?>
      </span>
    </div>
    <div class="post-comments">
      <i class="icon-comment"></i><a href="<?php echo get_permalink(get_the_ID()).'#comments'; ?>">
      <?php comments_number(__('No Comment','wci'),__('1 Comment','wci'),__('% Comments','wci')); ?>
      </a>
    </div>
    <?php edit_post_link(__('Edit', 'wci'), '<div class="post-edit"><i class="icon-edit"></i>', '</div>'); ?>
    <div class="more">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more<i class="icon-play-sign"></i></a>
    </div>
  </div>
</div>
