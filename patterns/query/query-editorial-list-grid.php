<?php
/**
 * Title: Editorial List Grid
 * Slug: trace/query-editorial-list-grid
 * Categories: trace-query
 * Keywords: query, list, editorial, grid, preview
 * Viewport Width: 1400
 */
?>

<!-- wp:query {"queryId":9,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":{"category":[],"post_tag":[]},"parents":[],"format":[]},"metadata":{"categories":["trace-query"],"patternName":"trace/query-editorial-list-grid","name":"Editorial List Grid"},"className":"trace-list-grid"} -->

<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":5}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","sizeSlug":"medium"} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"fontSize":"body-l"} /-->

<!-- wp:post-terms {"term":"post_tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|muted"}}}},"textColor":"muted"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--m);margin-bottom:var(--wp--preset--spacing--m)"><!-- wp:query-pagination {"paginationArrow":"arrow"} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:group --></div>
<!-- /wp:query -->