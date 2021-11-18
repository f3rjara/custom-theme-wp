<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package PLAYTIC
 */
  get_header();
  $s = get_search_query();
?>

  <main id="main-page" class="site-search-page">
    <section class="section-search-page">

      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <?php
              if ( have_posts() ) : ?>
                <div class="row pt-4 d-flex justify-content-center">
                <h2 class="ps-0">
                  Search results for: <span><?php echo $s; ?></span>
                </h2>
                <hr class="separator-text"> <br>
                <p class="ps-0">
                  <?php esc_html_e( 'Nothing matches your search terms? Please try again with a few different keywords.', 'PLAYTIC' ); ?>
                </p>
                <div class="form-div mb-5 ps-0">
                  <?php  get_search_form(); ?>
                </div>
                  
                  <?php
                    while ( have_posts() ) : the_post();
                      get_template_part( 'template-parts/content', 'content' );
                    endwhile; 
                  ?>
                </div>
            <?php 
              else: 
                get_template_part( 'template-parts/content', 'none' );
              endif;	
            ?>
          </div>
        </div>
      </div>

    </section>
  </main>

<?php get_footer(); ?>
