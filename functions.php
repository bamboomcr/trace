<?php
declare(strict_types=1);
/**
 * Trace functions and definitions.
 *
 * @package trace
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Theme constants.
 */
define('TRACE_VERSION', '0.1.0');
define('TRACE_PATH', get_template_directory());
define('TRACE_URL', get_template_directory_uri());

/**
 * Theme setup.
 *
 * @return void
 */
function trace_setup()
{
	load_theme_textdomain(
		'trace',
		TRACE_PATH . '/languages'
	);

	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('responsive-embeds');
	add_theme_support('wp-block-styles');
	add_theme_support('editor-styles');
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'trace_setup');


/**
 * Shared block styles (front end + editor iframe).
 */
function trace_enqueue_shared_block_assets()
{

	$rel_path = '/assets/css/blocks.css';
	$abs_path = get_theme_file_path($rel_path);

	if (!file_exists($abs_path)) {
		return;
	}

	wp_enqueue_style(
		'trace-blocks',
		get_theme_file_uri($rel_path),
		array('wp-block-library'),
		(string) filemtime($abs_path)
	);
}

/**
 * Editor-only CSS (optional).
 */
function trace_enqueue_editor_only_assets()
{

	$rel_path = '/assets/css/editor.css';
	$abs_path = get_theme_file_path($rel_path);

	if (!file_exists($abs_path)) {
		return;
	}

	wp_enqueue_style(
		'trace-editor',
		get_theme_file_uri($rel_path),
		array('trace-blocks'),
		(string) filemtime($abs_path)
	);
}

/**
 * Front-end assets.
 */
function trace_enqueue_assets()
{

	// Front-end CSS should come AFTER your shared blocks.css
	wp_enqueue_style(
		'trace-front',
		TRACE_URL . '/assets/css/front.css',
		array('trace-blocks'), // 👈 important
		TRACE_VERSION
	);

	wp_enqueue_script(
		'trace-front',
		TRACE_URL . '/assets/js/front.js',
		array(),
		TRACE_VERSION,
		true
	);
}


/* Hooks */
add_action('wp_enqueue_scripts', 'trace_enqueue_shared_block_assets', 10);
add_action('enqueue_block_editor_assets', 'trace_enqueue_shared_block_assets', 10);
add_action('enqueue_block_editor_assets', 'trace_enqueue_editor_only_assets', 20);
add_action('wp_enqueue_scripts', 'trace_enqueue_assets', 20);


/**
 * Register TRACE block pattern categories.
 */
add_action('init', function () {
	register_block_pattern_category('trace-pages', ['label' => __('Trace: Pages', 'trace')]);
	register_block_pattern_category('trace-hero', ['label' => __('Trace: Hero', 'trace')]);
	register_block_pattern_category('trace-content', ['label' => __('Trace: Content', 'trace')]);
	register_block_pattern_category('trace-sections', ['label' => __('Trace: Sections', 'trace')]);
	register_block_pattern_category('trace-query', ['label' => __('Trace: Query', 'trace')]);
	register_block_pattern_category('trace-cta', ['label' => __('Trace: CTA', 'trace')]);
});





/**
 * Theme button and link styles.
 *
 * @return void
 */


function trace_register_block_styles()
{

	register_block_style(
		'core/button',
		array(
			'name' => 'outline',
			'label' => __('Outline', 'trace'),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name' => 'ghost',
			'label' => __('Ghost', 'trace'),
		)
	);

	// Button Arrow.
	register_block_style(
		'core/button',
		array(
			'name' => 'primary-arrow',
			'label' => __('Primary →', 'trace'),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name' => 'ghost-arrow',
			'label' => __('Ghost →', 'trace'),
		)
	);

	// Link Arrow.
	register_block_style(
		'core/paragraph',
		array(
			'name' => 'link-arrow',
			'label' => __('Link →', 'trace'),
		)
	);

	// Link Arrow (Left).
	register_block_style(
		'core/paragraph',
		array(
			'name' => 'link-arrow-left',
			'label' => __('← Link', 'trace'),
		)
	);

	// Button Arrow (Left).
	register_block_style(
		'core/button',
		array(
			'name' => 'primary-arrow-left',
			'label' => __('← Primary', 'trace'),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name' => 'ghost-arrow-left',
			'label' => __('← Ghost', 'trace'),
		)
	);

}
add_action('init', 'trace_register_block_styles');



add_action('init', function () {

	// List style: No bullets / numbers
	register_block_style(
		'core/list',
		array(
			'name' => 'no-markers',
			'label' => __('No bullets / numbers', 'trace'),
			'inline_style' => '
				.wp-block-list.is-style-no-markers {
					list-style: none;
					padding-left: 0;
					margin-left: 0;
				}
				.wp-block-list.is-style-no-markers li {
					margin-left: 0;
					padding-left: 0;
				}
			',
		)
	);

	// List style: No bullets / numbers (centred)
	register_block_style(
		'core/list',
		array(
			'name' => 'no-markers-centred',
			'label' => __('No bullets / numbers (centred)', 'trace'),
			'inline_style' => '
				.wp-block-list.is-style-no-markers-centred {
					list-style: none;
					padding-left: 0;
					margin-left: 0;
					text-align: center;
				}
				.wp-block-list.is-style-no-markers-centred li {
					margin-left: 0;
					padding-left: 0;
				}
				/* Optional rhythm */
				.wp-block-list.is-style-no-markers-centred li + li {
					margin-top: 0.5em;
				}
			',
		)
	);

});



add_action(
	'init',
	function () {

		register_block_style(
			'core/post-content',
			array(
				'name' => 'page-background',
				'label' => __('Page background', 'fse-v1'),
			)
		);

	}
);




/**
 * Register block styles for Latest Posts.
 */
function trace_register_latest_posts_styles(): void
{
	register_block_style(
		'core/latest-posts',
		[
			'name' => 'tight',
			'label' => __('Tight', 'trace'),
		]
	);

	register_block_style(
		'core/latest-posts',
		[
			'name' => 'comfortable',
			'label' => __('Comfortable', 'trace'),
		]
	);

	register_block_style(
		'core/latest-posts',
		[
			'name' => 'spacious',
			'label' => __('Spacious', 'trace'),
		]
	);

	register_block_style(
		'core/latest-posts',
		[
			'name' => 'cards',
			'label' => __('Cards', 'trace'),
		]
	);
}
add_action('init', 'trace_register_latest_posts_styles');

/**
 * Theme card block style.
 *
 * @return void
 */
function trace_register_card_block_style()
{
	register_block_style(
		'core/group',
		array(
			'name' => 'card',
			'label' => __('Card', 'trace'),
		)
	);
}
add_action('init', 'trace_register_card_block_style');

/**
 * Predefined radius styles for Group, Image, and Cover blocks.
 * Tokens are defined in theme.json → settings.custom.radius.
 *
 * @return void
 */
function trace_register_radius_block_styles()
{
	$blocks = array( 'core/group', 'core/image', 'core/cover', 'core/media-text' );

	$styles = array(
		array( 'name' => 'radius-none', 'label' => __( 'Sharp',   'trace' ) ),
		array( 'name' => 'radius-s',    'label' => __( 'Soft',     'trace' ) ),
		array( 'name' => 'radius-m',    'label' => __( 'Rounded',  'trace' ) ),
		array( 'name' => 'radius-l',    'label' => __( 'Large',    'trace' ) ),
		array( 'name' => 'radius-xl',   'label' => __( 'X-Large',  'trace' ) ),
		array( 'name' => 'radius-full', 'label' => __( 'Pill',     'trace' ) ),
	);

	foreach ( $blocks as $block ) {
		foreach ( $styles as $style ) {
			register_block_style( $block, $style );
		}
	}
}
add_action( 'init', 'trace_register_radius_block_styles' );

/**
 * Theme team member block style.
 *
 * @return void
 */
// function trace_register_team_member_block_style() {
// 	register_block_style(
// 		'core/group',
// 		array(
// 			'name'  => 'team-member',
// 			'label' => __( 'Team Member', 'trace' ),
// 		)
// 	);
// }
// add_action( 'init', 'trace_register_team_member_block_style' );



add_action('init', 'trace_register_navigation_block_styles');

/**
 * Registers style options for the core/navigation block so they appear in the editor.
 *
 * @return void
 */
function trace_register_navigation_block_styles()
{
	if (function_exists('register_block_style')) {
		register_block_style(
			'core/navigation',
			array(
				'name' => 'nav-gap-s',
				'label' => __('Nav Gap · Small', 'trace'),
			)
		);

		register_block_style(
			'core/navigation',
			array(
				'name' => 'nav-gap-m',
				'label' => __('Nav Gap · Medium', 'trace'),
			)
		);

		register_block_style(
			'core/navigation',
			array(
				'name' => 'nav-gap-l',
				'label' => __('Nav Gap · Large', 'trace'),
			)
		);
	}
}








/**
 * Register Navigation Link block styles.
 */
add_action('init', function () {

	register_block_style(
		'core/navigation-link',
		array(
			'name' => 'as-button',
			'label' => 'Button',
		)
	);

	register_block_style(
		'core/navigation-link',
		array(
			'name' => 'as-button-outline',
			'label' => 'Button Outline',
		)
	);

});





add_action('init', function () {

	if (function_exists('register_block_style')) {
		register_block_style(
			'core/image',
			array(
				'name' => 'trace-parallax',
				'label' => __('Trace: Parallax', 'trace'),
			)
		);
	}

});


add_action('init', function () {

	if (!function_exists('register_block_style'))
		return;

	register_block_style(
		'core/cover',
		array(
			'name' => 'trace-parallax',
			'label' => __('Trace: Parallax', 'trace'),
		)
	);

});







function trace_register_media_text_styles()
{

	$styles = array(
		'ratio-1-1' => __('Ratio 1:1', 'trace'),
		'ratio-4-3' => __('Ratio 4:3', 'trace'),
		'ratio-3-2' => __('Ratio 3:2', 'trace'),
		'ratio-16-9' => __('Ratio 16:9', 'trace'),
		'ratio-9-16' => __('Ratio 9:16', 'trace'),
		'image-bleed-left' => __('Image Bleed Left', 'trace'),
		'image-bleed-right' => __('Image Bleed Right', 'trace'),
		'stack-reverse' => __('Stack Reverse', 'trace'),
		'media-rounded' => __('Rounded Media', 'trace'),
		'content-centered' => __('Content Centered', 'trace'),
		'content-bottom' => __('Content Bottom', 'trace'),
	);

	foreach ($styles as $name => $label) {
		register_block_style(
			'core/media-text',
			array(
				'name' => $name,
				'label' => $label,
			)
		);
	}
}
add_action('init', 'trace_register_media_text_styles');



/**
 * =============================================================================
 * Tools → Reset Trace Customizations
 * =============================================================================
 *
 * When a user edits Trace's templates, template parts, or global styles in the
 * Site Editor and clicks Save, WordPress stores a frozen snapshot of those
 * edits in the database. From that moment on, the editor uses the snapshot
 * instead of the file. The snapshot doesn't auto-update when you ship a new
 * theme version, so it can drift out of sync — producing errors like
 * "Template part has been deleted or is unavailable", missing palette slugs
 * after a schema update, or stale typography/layout overrides.
 *
 * This admin page lets users wipe each category independently, falling back
 * to the on-disk theme files. Posts, pages, menus, media, and plugins are
 * never touched.
 *
 * Categories handled:
 *   - Templates & template parts  (post types: wp_template, wp_template_part)
 *   - Global Styles               (post type:  wp_global_styles)
 */

add_action('admin_menu', function () {
	add_management_page(
		__('Reset Trace Customizations', 'trace'),
		__('Reset Trace Customizations', 'trace'),
		'manage_options',
		'trace-reset-customizations',
		'trace_render_reset_page'
	);
});

/**
 * Count or delete template / template-part customizations for the active theme.
 */
function trace_template_customizations(bool $do_delete = false): int
{
	global $wpdb;

	$theme = get_stylesheet();
	$term = get_term_by('name', $theme, 'wp_theme');
	if (!$term || is_wp_error($term)) {
		return 0;
	}

	$post_ids = $wpdb->get_col($wpdb->prepare(
		"SELECT p.ID
		 FROM {$wpdb->posts} p
		 INNER JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
		 WHERE tr.term_taxonomy_id = %d
		   AND p.post_type IN ( 'wp_template', 'wp_template_part' )",
		$term->term_taxonomy_id
	));

	if (!$do_delete) {
		return count($post_ids);
	}

	$deleted = 0;
	foreach ($post_ids as $id) {
		if (wp_delete_post((int) $id, true)) {
			$deleted++;
		}
	}
	return $deleted;
}

/**
 * Count or delete global-styles customizations for the active theme.
 *
 * WordPress always keeps an empty `wp_global_styles` placeholder for the
 * active theme — we don't count that as a "customization". A row is only
 * counted when its content has actual styles or settings overrides.
 *
 * On delete we drop ALL rows for the theme; WP recreates an empty placeholder
 * automatically on next editor load.
 */
function trace_global_styles_customizations(bool $do_delete = false): int
{
	global $wpdb;

	$theme = get_stylesheet();
	$term = get_term_by('name', $theme, 'wp_theme');
	if (!$term || is_wp_error($term)) {
		return 0;
	}

	$rows = $wpdb->get_results($wpdb->prepare(
		"SELECT p.ID, p.post_content
		 FROM {$wpdb->posts} p
		 INNER JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
		 WHERE tr.term_taxonomy_id = %d
		   AND p.post_type = 'wp_global_styles'",
		$term->term_taxonomy_id
	));

	if (!$do_delete) {
		// Count only rows with meaningful content
		$count = 0;
		foreach ($rows as $row) {
			if (trace_global_styles_is_meaningful($row->post_content)) {
				$count++;
			}
		}
		return $count;
	}

	// Delete every row for the theme; WP regenerates the empty placeholder later
	$deleted = 0;
	foreach ($rows as $row) {
		if (wp_delete_post((int) $row->ID, true)) {
			$deleted++;
		}
	}
	return $deleted;
}

/**
 * Detect whether a wp_global_styles post_content has actual customizations,
 * not just the empty placeholder WordPress creates by default.
 */
function trace_global_styles_is_meaningful(string $content): bool
{
	if ('' === trim($content)) {
		return false;
	}
	$data = json_decode($content, true);
	if (!is_array($data)) {
		return false;
	}
	// `styles` and `settings` are the two keys that hold actual overrides.
	$styles = $data['styles'] ?? null;
	$settings = $data['settings'] ?? null;
	return !empty($styles) || !empty($settings);
}

/**
 * Render the admin page.
 */
function trace_render_reset_page(): void
{
	if (!current_user_can('manage_options')) {
		wp_die(esc_html__('You do not have permission to access this page.', 'trace'));
	}

	$message = '';
	$message_class = 'notice-success';

	// Handle Templates form submission
	if (
		isset($_POST['trace_action']) && 'reset_templates' === $_POST['trace_action']
		&& check_admin_referer('trace_reset_templates')
	) {
		$count = trace_template_customizations(true);
		$message = sprintf(
			/* translators: %d: number cleared */
			_n(
				'Cleared %d template customization. The theme is using its on-disk files.',
				'Cleared %d template customizations. The theme is using its on-disk files.',
				$count,
				'trace'
			),
			$count
		);
	}

	// Handle Global Styles form submission
	if (
		isset($_POST['trace_action']) && 'reset_global_styles' === $_POST['trace_action']
		&& check_admin_referer('trace_reset_global_styles')
	) {
		$count = trace_global_styles_customizations(true);
		$message = sprintf(
			/* translators: %d: number cleared */
			_n(
				'Cleared %d Global Styles customization. The theme is using its theme.json palette and styles.',
				'Cleared %d Global Styles customizations. The theme is using its theme.json palette and styles.',
				$count,
				'trace'
			),
			$count
		);
	}

	$tpl_count = trace_template_customizations(false);
	$gs_count = trace_global_styles_customizations(false);

	?>
	<div class="wrap">
		<h1>
			<?php esc_html_e('Reset Trace Customizations', 'trace'); ?>
		</h1>

		<?php if ($message): ?>
			<div class="notice <?php echo esc_attr($message_class); ?> is-dismissible">
				<p>
					<?php echo esc_html($message); ?>
				</p>
			</div>
		<?php endif; ?>

		<p style="max-width:62em;">
			<?php esc_html_e('When you edit Trace in the Site Editor and click Save, WordPress stores a snapshot of those edits in the database. Snapshots don\'t update when the theme updates, so they can drift out of sync and cause editor errors. This page lets you reset each category back to the on-disk theme files. Your posts, pages, menus, media, and plugins are not affected.', 'trace'); ?>
		</p>

		<hr style="margin:2em 0;">

		<h2>
			<?php esc_html_e('Templates & Template Parts', 'trace'); ?>
		</h2>
		<p style="max-width:62em;">
			<?php esc_html_e('Snapshots of edits to footer, header, page templates, archive templates, and other parts. Reset this category if you see "Template part has been deleted or is unavailable" in the editor, or if a recent theme update isn\'t reflecting in your templates.', 'trace'); ?>
		</p>

		<?php if (0 === $tpl_count): ?>
			<p><strong>
					<?php esc_html_e('No customizations to reset.', 'trace'); ?>
				</strong>
				<?php esc_html_e('Templates and template parts are using their on-disk files.', 'trace'); ?>
			</p>
		<?php else: ?>
			<p>
				<?php
				printf(
					esc_html(_n(
						'You have %d template/template-part customization stored.',
						'You have %d template/template-part customizations stored.',
						$tpl_count,
						'trace'
					)),
					(int) $tpl_count
				);
				?>
			</p>
			<form method="post"
				onsubmit="return confirm( <?php echo wp_json_encode(__('Delete all template and template-part customizations? This cannot be undone without a database backup.', 'trace')); ?> );">
				<?php wp_nonce_field('trace_reset_templates'); ?>
				<input type="hidden" name="trace_action" value="reset_templates">
				<p>
					<button type="submit" class="button button-primary">
						<?php
						printf(
							esc_html(_n(
								'Delete %d template customization',
								'Delete %d template customizations',
								$tpl_count,
								'trace'
							)),
							(int) $tpl_count
						);
						?>
					</button>
				</p>
			</form>
		<?php endif; ?>

		<hr style="margin:2em 0;">

		<h2>
			<?php esc_html_e('Global Styles', 'trace'); ?>
		</h2>
		<p style="max-width:62em;">
			<?php esc_html_e('Snapshots of color overrides, typography changes, and layout tweaks made via Site Editor → Styles. Reset this category if a theme palette update isn\'t showing new color slugs, or if global typography/layout overrides are stuck on outdated values.', 'trace'); ?>
		</p>

		<?php if (0 === $gs_count): ?>
			<p><strong>
					<?php esc_html_e('No customizations to reset.', 'trace'); ?>
				</strong>
				<?php esc_html_e('Global styles are using the theme.json palette and styles.', 'trace'); ?>
			</p>
		<?php else: ?>
			<p>
				<?php
				printf(
					esc_html(_n(
						'You have %d Global Styles customization stored.',
						'You have %d Global Styles customizations stored.',
						$gs_count,
						'trace'
					)),
					(int) $gs_count
				);
				?>
			</p>
			<form method="post"
				onsubmit="return confirm( <?php echo wp_json_encode(__('Delete all Global Styles customizations? This cannot be undone without a database backup.', 'trace')); ?> );">
				<?php wp_nonce_field('trace_reset_global_styles'); ?>
				<input type="hidden" name="trace_action" value="reset_global_styles">
				<p>
					<button type="submit" class="button button-primary">
						<?php
						printf(
							esc_html(_n(
								'Delete %d Global Styles customization',
								'Delete %d Global Styles customizations',
								$gs_count,
								'trace'
							)),
							(int) $gs_count
						);
						?>
					</button>
				</p>
			</form>
		<?php endif; ?>
	</div>
	<?php
}
