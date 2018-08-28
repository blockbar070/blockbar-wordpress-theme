<?php
$isIndex = $_SERVER['REQUEST_URI'] == '/';

get_header();
?>

<!-- <p>
  Do you work on a blockchain/distributed/crypto project? <a href="https://www.meetup.com/blockbar/events/nzwqxpyxkbrb/" target="_blank">Join Blockbar</a>, the <b>blockchain cowork</b> space in <b>The Hague</b>.
</p>

<p>
  At Blockbar you can work on blockchain projects, develop ideas & get to know other people in the scene.
</p>

<p>
  Be welcome to join at Blockbar at <a href="https://www.thehaguetech.nl/" target="_blank">The Hague Tech</a>. Every Friday, from 10am. <a href="https://www.meetup.com/blockbar/" target="_blank">RSVP on Meetup</a>.
</p>

&nbsp;
 -->

<?php get_template_part( 'content', get_post_format() ); ?>


<h2>
  <?php echo $isIndex ? 'Posts' : 'Other posts'; ?> from the Blockbar community
</h2>

<div class="Index-community-posts">
  <?php
  global $post;
  $args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 53 );

  $myposts = get_posts( $args );
  foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <div class="Index-community-post">
      <div style="height: 280px; position: relative;">
        <a href="<?php the_permalink(); ?>" style="position: absolute; bottom: 0;">
          <?php the_post_thumbnail( array( 280, 280 ), ['class' => 'img-responsive responsive--full'] ); ?>
        </a>
      </div>
      <?php if(get_post_meta(get_the_ID(), 'session-url', true)): ?>
        <a href="<?php echo get_post_meta(get_the_ID(), 'session-url', true) ?>" target="_blank" style="color: #000; font-weight: bold; margin-top: 10px; display: block;">
          Community post by
          <?php echo get_post_meta(get_the_ID(), 'session-author', true) ?>
        </a>
      <?php endif; ?>
      <a class="Index-title" href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
      <div>
        <?php the_excerpt(); ?>
      </div>
    </div>
  <?php endforeach; 
  wp_reset_postdata();
  ?>
</div>

<h2>Latest news</h2>

<?php
echo do_shortcode('[fts_twitter twitter_name=blockbar070 tweets_count=30 cover_photo=no stats_bar=yes show_retweets=no show_replies=no search=%23blockbar%20OR%20%23biw070%20OR%20%40blockbar070%20OR%20%40the_hague_tech]');
?>

<style type="text/css">
  
.Index-community-posts {
  width: 600px;
  max-width: 100%;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.Index-community-post {
  width: 280px;
  max-width: 100%;
  margin: 8px;
}
.Index-title {
  display: block;
  font-weight: bold;
  font-size: 20px;
  margin: 10px 0 20px;
}
img.img-responsive.responsive--full {
  width: 100%;
  margin: 0 auto;
}

</style>

<?php include 'footer.php'; ?>
