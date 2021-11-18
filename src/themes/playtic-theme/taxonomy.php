<?php
/**
 * The Taxonomy tempalte
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ *
 * @package PLAYTIC
 */
  get_header();

  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
  $taxo = 'Results For: '; 
  $isStudyOnly = FALSE;
  
  if ( strpos($term->taxonomy, 'tag') !== false) { $taxo = 'Results for Tag: ';  }                
  elseif( strpos($term->taxonomy, 'category') !== false  || strpos($term->taxonomy, 'categories') !== false )
  {  $taxo = 'Results for Category: '; }

  if ( strpos($term->taxonomy, 'online_programmes') !== false) { $isStudyOnly = TRUE;  }  

?>

  <main id="taxonomy-page" class="site-main taxonomy-page">
    <section>

      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          <div class="wrapper">
            <div class="primary-content">
              <h1>
                <?php echo $taxo." ".apply_filters( 'the_title', $term->name ); ?>
              </h1>
              <?php if ( !empty( $term->description ) ): ?>
                <div class="archive-description">
                  <small> <?php echo esc_html($term->description); ?> </small>
                </div>
                <hr class="separator-text mb-4">
              <?php else: ?>
                <hr class="separator-text mb-4">
              <?php endif; ?>

              <?php if ( have_posts() ): ?>
                <div class="row pt-4 row-post d-flex justify-content-center">
                  <?php 
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', 'content' );
                    endwhile; 
                  ?>
                </div>
              <?php else: ?>

                <h2 class="post-title">
                  No News in <?php echo apply_filters( 'the_title', $term->name ); ?>
                </h2>
                <div class="content clearfix">
                  <div class="entry">
                    <p>It seems there isn't anything happening in <strong>
                      <?php echo apply_filters( 'the_title', $term->name ); ?></strong> right now. Check back later, something is bound to happen soon.</p>
                  </div>
                </div>

              <?php endif; ?>
            </div><!--// end .primary-content -->

        </div> <!-- End wrapper -->

        </div> <!-- End Col -->
      </div> <!-- End Row -->

    </section>
  </main>

<?php get_footer(); ?>