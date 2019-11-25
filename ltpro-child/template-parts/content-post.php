<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package laptrinhcomvn
 * @subpackage ltpro-child
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

		if ( is_singular() ) {
			the_title( '<h2 class="entry-title">', '</h2>' );
		} else {
			the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		}
	?>

	<div class="post-inner thin">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'laptrinhcomvn' ) );
			}
			?>

		</div>

	</div>

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'laptrinhcomvn' ) . '"><span class="label">' . __( 'Pages:', 'laptrinhcomvn' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		//edit_post_link();

		// Single bottom post meta.
		//ltpro_the_post_meta( get_the_ID(), 'single-bottom' );

		//if ( is_single() ) {
		//	get_template_part( 'template-parts/entry-author-bio' );
		//}
		?>

	</div>

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->