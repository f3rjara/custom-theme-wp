<?php
/**
 * The Index Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ *
 * @package PLAYTIC
 */
get_header();
?>

<main id="main-page" class="site-main-page">
  <section class="section-index-content">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php
          if ( have_posts() ) : ?>
            <div class="row pt-4 row-post d-flex justify-content-center">
              <?php while (have_posts()) : the_post();
                get_template_part( 'template-parts/content', 'content' );
              endwhile;
              ?>
            </div>
          <?php
          else :
            get_template_part('template-parts/content', 'none');
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer();
