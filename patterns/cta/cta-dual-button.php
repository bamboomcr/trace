<?php
/**
 * Title: CTA — Dual Button
 * Slug: trace/cta-dual-button
 * Categories: trace-cta
 * Keywords: cta, call to action, buttons
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"metadata":{"name":"CTA Dual Button"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:group {"layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--l)","bottom":"var(--wp--preset--spacing--l)"}}}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l)">
		<!-- wp:heading {"level":1} -->
		<h1><?php esc_html_e( 'A studio for clear, considered work.', 'trace' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"body-l"} -->
		<p class="has-body-l-font-size"><?php esc_html_e( 'A calm, editorial foundation for designers, studios, and writers who want their work to speak clearly.', 'trace' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#work"><?php esc_html_e( 'View work', 'trace' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#about"><?php esc_html_e( 'About us', 'trace' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->