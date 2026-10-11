<?php
/**
 * Title: Content Tabs
 * Slug: trace/content-tabs
 * Categories: trace-content
 * Keywords: tabs, content, panels, switcher
 * Viewport width: 1400
 * Description: Buttons across the top switch between 2-column content panels with a smooth fade.
 */
?>

<!-- wp:group {"metadata":{"name":"Content Tabs"},"className":"trace-tabs trace-ui","layout":{"type":"constrained"}} -->
<div class="wp-block-group trace-tabs trace-ui">

	<!-- wp:buttons {"className":"trace-tablist","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-buttons trace-tablist">

		<!-- wp:button {"className":"trace-tab"} -->
		<div class="wp-block-button trace-tab">
			<a class="wp-block-button__link wp-element-button" href="#panel-1"><?php esc_html_e( 'Tab One', 'trace' ); ?></a>
		</div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"trace-tab"} -->
		<div class="wp-block-button trace-tab">
			<a class="wp-block-button__link wp-element-button" href="#panel-2"><?php esc_html_e( 'Tab Two', 'trace' ); ?></a>
		</div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"trace-tab"} -->
		<div class="wp-block-button trace-tab">
			<a class="wp-block-button__link wp-element-button" href="#panel-3"><?php esc_html_e( 'Tab Three', 'trace' ); ?></a>
		</div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"trace-tab"} -->
		<div class="wp-block-button trace-tab">
			<a class="wp-block-button__link wp-element-button" href="#panel-4"><?php esc_html_e( 'Tab Four', 'trace' ); ?></a>
		</div>
		<!-- /wp:button -->

	</div>
	<!-- /wp:buttons -->


	<!-- wp:group {"className":"trace-panels","layout":{"type":"constrained"}} -->
	<div class="wp-block-group trace-panels">

		<!-- wp:group {"anchor":"panel-1","className":"trace-panel","layout":{"type":"constrained"}} -->
		<div class="wp-block-group trace-panel">
			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center">

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:heading {"level":3} -->
					<h3><?php esc_html_e( 'First headline', 'trace' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'Write your panel content here. This column is your text, CTA, list, etc.', 'trace' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button -->
						<div class="wp-block-button">
							<a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Call to action', 'trace' ); ?></a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:image {"sizeSlug":"large"} -->
					<figure class="wp-block-image size-large">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-hero.svg' ) ); ?>" alt="" />
					</figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->


		<!-- wp:group {"anchor":"panel-2","className":"trace-panel","layout":{"type":"constrained"}} -->
		<div class="wp-block-group trace-panel">
			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center">

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:heading {"level":3} -->
					<h3><?php esc_html_e( '2nd headline', 'trace' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'Swap in different copy and a different image. This panel will fade in.', 'trace' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:image {"sizeSlug":"large"} -->
					<figure class="wp-block-image size-large">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-hero.svg' ) ); ?>" alt="" />
					</figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->


		<!-- wp:group {"anchor":"panel-3","className":"trace-panel","layout":{"type":"constrained"}} -->
		<div class="wp-block-group trace-panel">
			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center">

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:heading {"level":3} -->
					<h3><?php esc_html_e( 'Panel Three headline', 'trace' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( '3rd panel content.', 'trace' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:image {"sizeSlug":"large"} -->
					<figure class="wp-block-image size-large">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-hero.svg' ) ); ?>" alt="" />
					</figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->


		<!-- wp:group {"anchor":"panel-4","className":"trace-panel","layout":{"type":"constrained"}} -->
		<div class="wp-block-group trace-panel">
			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center">

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:heading {"level":3} -->
					<h3><?php esc_html_e( 'Panel Four headline', 'trace' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( '4th panel content.', 'trace' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:image {"sizeSlug":"large"} -->
					<figure class="wp-block-image size-large">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-hero.svg' ) ); ?>" alt="" />
					</figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->