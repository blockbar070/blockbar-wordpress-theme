<?php while (have_posts()) : the_post(); ?>
  
  <?php if(is_page()) { ?>

    <?php the_content(__('(lees meer...)')); ?>

  <?php } else { ?>

    <div class="the-post">

      <div class="the-post-content">
        <div class="the-post-content-body">

          <h1 class="the-post-title"><?php the_title(); ?></h1>

          <p class="the-post-meta">
            <?php the_date( 'F j, Y', 'Date: ', '', true );
            echo ' | ';
            $post_categories = wp_get_post_categories( get_the_ID() );
            $cats = array();

            $catsString = '';
            foreach($post_categories as $c){
                $cat = get_category( $c );
                // var_dump($cat);
                $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
                $catsString = $catsString . ( $catsString != '' ? ', ' : '') . $cat->name;
            }
            echo $catsString;
            ?>

          </p>

          <?php the_content(__('(lees meer...)')); ?>
        </div>
      </div>        
    <?php } ?>

  <?php endwhile; ?>
