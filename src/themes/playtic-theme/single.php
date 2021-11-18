<?php get_header(); ?>
  <section class="section-single-post">
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content">
        <h1><?php __(the_title()); ?></h1>
        <hr>
        <?php the_content();	?>
      </div><!-- .entry-content -->
    </article>
    
  </section>

<?php get_footer(); ?>
