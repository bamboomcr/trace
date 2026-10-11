<?php
/**
 * Title: Contact — Two Column
 * Slug: trace/content-contact-page-2-column
 * Categories: trace-contact
 * Keywords: contact, form, page, two column
 * Viewport Width: 1400
 * Description: Contact section: intro and social links beside a contact form.
 */
?>

<!-- wp:columns {"metadata":{"categories":["trace-contact"],"patternName":"trace/content-contact-page-2-column","name":"Contact Page - Two Column"}} -->

<div class="wp-block-columns"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading {"style":{"typography":{"lineHeight":"1"}},"fontSize":"heading-xl"} -->
<h2 class="wp-block-heading has-heading-xl-font-size" style="line-height:1"><?php echo wp_kses_post( __( 'We\'d love to hear from you', 'trace' ) ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Have a question or a project in mind?', 'trace' ); ?><br><?php esc_html_e( 'Tell us a little about it.', 'trace' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"60px"} -->
<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"fontSize":"body-l"} -->
<p class="has-body-l-font-size"><?php esc_html_e( 'Follow us', 'trace' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"background","iconBackgroundColor":"foreground","size":"has-normal-icon-size","layout":{"type":"flex","justifyContent":"left"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"https://www.linkedin.com","service":"linkedin"} /-->

<!-- wp:social-link {"url":"https://www.google.com","service":"google"} /-->

<!-- wp:social-link {"url":"https://www.instagram.com","service":"instagram"} /-->

<!-- wp:social-link {"url":"https://x.com","service":"x"} /-->

<!-- wp:social-link {"url":"https://www.facebook.com","service":"facebook"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Send a message', 'trace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color"><?php esc_html_e( 'Replace this text with your form. Add the block from your form plugin here: Trace styles Contact Form 7, WPForms and Gravity Forms fields to match.', 'trace' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-primary-arrow"} -->
<div class="wp-block-button is-style-primary-arrow"><a class="wp-block-button__link wp-element-button" href="mailto:hello@example.com"><?php esc_html_e( 'Email us', 'trace' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->