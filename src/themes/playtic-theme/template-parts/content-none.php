<?php
/**
 * Template part for displaying a message that posts cannot be found *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ *
 * @package playtic
 */
  $s = get_search_query();
?>

<section class="no-results not-found">
  <h2 class="wits_blue_text">
    Search results for: <span class="wits_text_contrast_text"><?php echo $s; ?></span>
  </h2>
  <hr class="separator-text"> <br>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			printf(
				'<p>' . wp_kses(
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'playtic' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ):  ?>

			<p class="wits_text_contrast_text">
        <?php 
          esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'playtic' ); 
        ?>
      </p>
			<?php
			get_search_form();
		else : ?>

			<p>
        <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'playtic' ); ?>
      </p>
			<?php
			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
