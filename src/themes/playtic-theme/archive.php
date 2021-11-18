<?php
/**
 * The Archive  Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ *
 * @package playtic
 */
  get_header();

  $tax = $wp_query->get_queried_object();
  $taxo = 'Results For: '; 

  if ( strpos($tax->taxonomy, 'tag') !== false) { $taxo = 'Results for Tag: ';  }                
  elseif( strpos($tax->taxonomy, 'category') !== false  || strpos($tax->taxonomy, 'categories') !== false )
  {  $taxo = 'Results for Category: '; }

?>

  <main id="archive-page" class="site-main archive-page">
    <section>

      <div class="container py-playtic">
        <div class="row">
          <div class="col-sm-12">

              <h1 class="wits_blue_text">
                <?php echo $taxo." ".apply_filters( 'the_title', $tax->name ); ?>
              </h1>
              <?php if ( !empty( $tax->description ) ): ?>
                <div class="archive-description">
                  <small class="wits_text_contrast_text"> <?php echo esc_html($tax->description); ?> </small>
                </div>
                <hr class="separator-text mb-4">
              <?php else: ?>
                <hr class="separator-text mb-4">
              <?php endif; ?>

            <?php
              if ( have_posts() ) : ?>
              <div class="row pt-4 row-post d-flex justify-content-center">
                <?php while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content'); 
                endwhile; ?>
              </div>
            <?php else: ?>

              <h2 class="post-title wits_text_contrast_text">
                No News in <?php echo apply_filters( 'the_title', $tax->name ); ?>
              </h2>
              <div class="content clearfix">
                <div class="entry">
                  <p>It seems there isn't anything happening in <strong><?php echo apply_filters( 'the_title', $tax->name ); ?></strong> right now. Check back later, something is bound to happen soon.</p>
                </div>
              </div>

            <?php endif; ?>
          </div>
        </div>
      </div>

    </section>
  </main>

<?php get_footer(); ?>