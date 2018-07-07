<?php get_header(); ?>

<p>
  Do you work on a blockchain/distributed/crypto project? <a href="https://www.meetup.com/blockbar/events/nzwqxpyxkbrb/" target="_blank">Join Blockbar</a>, the blockchain cowork space in The Hague.
</p>

<p>
  At Blockbar you can work on blockchain projects, develop ideas & get to know other people in the scene.
</p>

<p>
  Be welcome to join at Blockbar at <a href="https://www.thehaguetech.nl/" target="_blank">The Hague Tech</a>. Every Friday, from 10am. <a href="https://www.meetup.com/blockbar/" target="_blank">RSVP on Meetup</a>.
</p>

<h2>Latest news</h2>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php
// echo do_shortcode('[fts_twitter twitter_name=blockbar070 tweets_count=3 cover_photo=no stats_bar=no show_retweets=yes show_replies=no]');
echo do_shortcode('[fts_twitter twitter_name=blockbar070 tweets_count=4 cover_photo=no stats_bar=yes show_retweets=yes show_replies=no search=@blockbar070 OR #blockbar]');
?>

<?php include 'footer.php'; ?>