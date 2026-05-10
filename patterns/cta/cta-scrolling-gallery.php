<?php
/**
 * Title: CTA — Scrolling Gallery
 * Slug: trace/cta-scrolling-gallery
 * Categories: trace-cta
 * Keywords: cta, scrolling, gallery, marquee
 * Viewport Width: 1400
 */

$imgs = [
	get_theme_file_uri( 'assets/images/70s-model.jpg' ),
	get_theme_file_uri( 'assets/images/decor-furniture-mobile.jpg' ),
	get_theme_file_uri( 'assets/images/right-on-magazine.jpg' ),
	get_theme_file_uri( 'assets/images/vreality.jpg' ),
	get_theme_file_uri( 'assets/images/ogo.jpg' ),
	get_theme_file_uri( 'assets/images/trace-id-cards.jpg' ),
];
?>

<!-- wp:group {"metadata":{"name":"CTA Scrolling Gallery"},"className":"cta-scrolling-gallery trace-scroll-cta","align":"full","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignfull cta-scrolling-gallery trace-scroll-cta" style="padding-right:0;padding-left:0">

	<!-- wp:paragraph {"fitText":true} -->
	<p class="has-fit-text">Get started today.</p>
	<!-- /wp:paragraph -->

	<!-- wp:gallery {"columns":1,"linkTo":"none","sizeSlug":"thumbnail","aspectRatio":"4/3"} -->
	<figure class="wp-block-gallery has-nested-images columns-1 is-cropped">

		<!-- wp:image {"aspectRatio":"4/3","sizeSlug":"thumbnail","linkDestination":"none"} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( $imgs[0] ); ?>" alt="" style="aspect-ratio:4/3"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"aspectRatio":"4/3","sizeSlug":"thumbnail","linkDestination":"none"} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( $imgs[1] ); ?>" alt="" style="aspect-ratio:4/3"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"aspectRatio":"4/3","sizeSlug":"thumbnail","linkDestination":"none"} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( $imgs[2] ); ?>" alt="" style="aspect-ratio:4/3"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"aspectRatio":"4/3","sizeSlug":"thumbnail","linkDestination":"none"} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( $imgs[3] ); ?>" alt="" style="aspect-ratio:4/3"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"aspectRatio":"4/3","sizeSlug":"thumbnail","linkDestination":"none"} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( $imgs[4] ); ?>" alt="" style="aspect-ratio:4/3"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"aspectRatio":"4/3","sizeSlug":"thumbnail","linkDestination":"none"} -->
		<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( $imgs[5] ); ?>" alt="" style="aspect-ratio:4/3"/></figure>
		<!-- /wp:image -->

	</figure>
	<!-- /wp:gallery -->

</div>
<!-- /wp:group -->


<!-- wp:columns {"metadata":{"name":"CTA Scrolling Gallery — Footer Row"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl"},"blockGap":{"left":"var:preset|spacing|5xl"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--2-xl);margin-bottom:var(--wp--preset--spacing--2-xl)"><!-- wp:column {"verticalAlignment":"bottom","width":"100%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:100%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"right","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"xl"} -->
<h2 class="wp-block-heading has-text-align-right has-xl-font-size" style="font-style:normal;font-weight:400">Your Theme. Your Rules</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-primary-arrow","style":{"spacing":{"padding":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}},"fontSize":"body-l"} -->
<div class="wp-block-button is-style-primary-arrow"><a class="wp-block-button__link has-body-l-font-size has-custom-font-size wp-element-button" href="/" style="padding-top:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m)">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->