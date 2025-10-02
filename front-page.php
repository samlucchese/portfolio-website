<?php get_header(); ?>

<main class="site-main">
  <div class="main-inner">
    <?php
  
      while ( have_posts() ) :
      the_post();
      the_content();
    endwhile;
    ?>
  </div>
</main>

<?php get_footer(); ?>


