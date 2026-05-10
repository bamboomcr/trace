<?php
/**
 * Title: Hero — Call to Action Editorial
 * Slug: trace/hero-cta-editorial
 * Categories: trace-hero
 * Keywords: hero, banners, cover, cta, editorial, parallax
 * Viewport Width: 1400
 */
$img = get_theme_file_uri( 'assets/images/hero-default.png' );
?>

<!-- wp:cover {"metadata":{"name":"Hero — Call to Action Editorial"},"url":"<?php echo esc_url( $img ); ?>","hasParallax":true,"dimRatio":60,"overlayColor":"background","isUserOverlayColor":true,"minHeight":90,"minHeightUnit":"vh","contentPosition":"bottom left","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|5xl","bottom":"var:preset|spacing|5xl","left":"var:preset|spacing|3xl","right":"var:preset|spacing|3xl"}}}} -->
<div class="wp-block-cover alignfull has-parallax has-custom-content-position is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--5-xl);padding-right:var(--wp--preset--spacing--3-xl);padding-bottom:var(--wp--preset--spacing--5-xl);padding-left:var(--wp--preset--spacing--3-xl);min-height:90vh"><div class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url( $img ); ?>)"></div><span aria-hidden="true" class="wp-block-cover__background has-background-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading {"textAlign":"left","level":1,"style":{"typography":{"lineHeight":"1"}},"textColor":"foreground","fontSize":"display-l"} -->
<h1 class="wp-block-heading has-text-align-left has-white-color has-text-color has-display-l-font-size" style="line-height:1">Effortlessly build pages using pre-built Patterns.</h1>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--xl)"><!-- wp:paragraph {"className":"is-style-link-arrow"} -->
<p class="is-style-link-arrow">Get started today</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-primary-arrow","style":{"spacing":{"padding":{"top":"24px","right":"48px","bottom":"24px","left":"48px"}},"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"600","letterSpacing":"0px"}}} -->
<div class="wp-block-button is-style-primary-arrow"><a class="wp-block-button__link has-custom-font-size wp-element-button" href="#build-fast" style="padding-top:24px;padding-right:48px;padding-bottom:24px;padding-left:48px;font-size:16px;font-style:normal;font-weight:600;letter-spacing:0px">Click here to get started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->