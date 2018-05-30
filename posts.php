<div class="posts-overview">

  <?php while (have_posts('posts_per_page=100')) : the_post(); ?>
  <div class="post">

    <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="post-title" data-id="<?php the_id(); ?>">
      <?php if( has_post_thumbnail() ) the_post_thumbnail(); ?>
    </a>

    <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="post-title" data-id="<?php the_id(); ?>">
      <?php the_title(); ?>
    </a>

  </div>
  <?php endwhile; ?>

</div>

