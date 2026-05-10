<?php
/**
 * Title: Portfolio Grid (Animated)
 * Slug: trace/query-portfolio-grid-animated
 * Categories: trace-query
 * Keywords: portfolio, query, grid, animated
 * Viewport Width: 1400
 */
?>

<!-- wp:query {"queryId":31,"query":{"perPage":9,"postType":"post","order":"desc","orderBy":"date","inherit":false},"metadata":{"categories":["trace-query"],"patternName":"trace/query-portfolio-grid-animated","name":"Portfolio Grid (Animated)"}} -->
 
<div class="wp-block-query trace-reveal">
	<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4"} /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group">
			<!-- wp:post-title {"isLink":true,"fontSize":"body-l"} /-->
			<!-- wp:post-date {"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->