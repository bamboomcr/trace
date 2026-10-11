<?php
/**
 * Title: Features — Style Guide
 * Slug: trace/section-style-guide
 * Categories: trace-features
 * Keywords: style guide, typography, colours, buttons, specimen
 * Viewport Width: 1400
 * Description: Type scale, button styles, colour palette and common blocks in one section.
 */
?>

<!-- wp:group {"metadata":{"name":"Style Guide"},"className":"trace-style-guide","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|3xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group trace-style-guide" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--3-xl)"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Typography', 'trace' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"fontSize":"display-xl"} -->
<h3 class="wp-block-heading has-display-xl-font-size"><?php esc_html_e( 'Display XL', 'trace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"fontSize":"display-l"} -->
<h3 class="wp-block-heading has-display-l-font-size"><?php esc_html_e( 'Display L', 'trace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"fontSize":"display-m"} -->
<h3 class="wp-block-heading has-display-m-font-size"><?php esc_html_e( 'Display M', 'trace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"fontSize":"heading-xl"} -->
<h3 class="wp-block-heading has-heading-xl-font-size"><?php esc_html_e( 'Heading XL', 'trace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"fontSize":"heading-l"} -->
<h3 class="wp-block-heading has-heading-l-font-size"><?php esc_html_e( 'Heading L', 'trace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"fontSize":"heading-m"} -->
<h3 class="wp-block-heading has-heading-m-font-size"><?php esc_html_e( 'Heading M', 'trace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"body-l"} -->
<p class="has-body-l-font-size"><?php esc_html_e( 'Body L. The quick brown fox jumps over the lazy dog. Body copy is set in Google Sans Flex.', 'trace' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"body-m"} -->
<p class="has-body-m-font-size"><?php esc_html_e( 'Body M. The quick brown fox jumps over the lazy dog. Body copy is set in Google Sans Flex.', 'trace' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"body-s"} -->
<p class="has-body-s-font-size"><?php esc_html_e( 'Body S. The quick brown fox jumps over the lazy dog. Body copy is set in Google Sans Flex.', 'trace' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Meta. Dates, captions and labels.', 'trace' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border"} -->
<hr class="wp-block-separator has-text-color has-border-color has-alpha-channel-opacity has-border-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Buttons and links', 'trace' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Fill', 'trace' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Outline', 'trace' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Ghost', 'trace' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-primary-arrow"} -->
<div class="wp-block-button is-style-primary-arrow"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Primary', 'trace' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost-arrow"} -->
<div class="wp-block-button is-style-ghost-arrow"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Ghost', 'trace' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"is-style-link-arrow"} -->
<p class="is-style-link-arrow"><a href="#"><?php esc_html_e( 'A text link with an arrow', 'trace' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border"} -->
<hr class="wp-block-separator has-text-color has-border-color has-alpha-channel-opacity has-border-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Colours', 'trace' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"9rem"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"background","layout":{"type":"default"}} -->
<div class="wp-block-group has-background-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Background', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"surface","layout":{"type":"default"}} -->
<div class="wp-block-group has-surface-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Surface', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"border","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Border', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"muted","layout":{"type":"default"}} -->
<div class="wp-block-group has-muted-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Muted', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"foreground","layout":{"type":"default"}} -->
<div class="wp-block-group has-foreground-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Foreground', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"body","layout":{"type":"default"}} -->
<div class="wp-block-group has-body-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Text', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"heading","layout":{"type":"default"}} -->
<div class="wp-block-group has-heading-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Heading', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"background-inverse","layout":{"type":"default"}} -->
<div class="wp-block-group has-background-inverse-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Background Inverse', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"action","layout":{"type":"default"}} -->
<div class="wp-block-group has-action-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Action', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"accent-2","layout":{"type":"default"}} -->
<div class="wp-block-group has-accent-2-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Accent 2', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"danger","layout":{"type":"default"}} -->
<div class="wp-block-group has-danger-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Danger', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"backgroundColor":"highlight","layout":{"type":"default"}} -->
<div class="wp-block-group has-highlight-background-color has-background"><!-- wp:spacer {"height":"4rem"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"meta"} -->
<p class="has-meta-font-size"><?php esc_html_e( 'Highlight', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border"} -->
<hr class="wp-block-separator has-text-color has-border-color has-alpha-channel-opacity has-border-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Blocks', 'trace' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Card', 'trace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color"><?php esc_html_e( 'A group with the Card style: surface background, border and padding.', 'trace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><?php esc_html_e( 'A plain list item', 'trace' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'A second list item', 'trace' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'A third list item', 'trace' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:quote -->
<blockquote class="wp-block-quote"><!-- wp:paragraph -->
<p><?php esc_html_e( 'The words should be loud and the layout should be quiet.', 'trace' ); ?></p>
<!-- /wp:paragraph --><cite><?php esc_html_e( 'Trace', 'trace' ); ?></cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:group -->
