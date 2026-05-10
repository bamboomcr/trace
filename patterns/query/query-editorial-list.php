<?php
/**
 * Title: Editorial List
 * Slug: trace/query-editorial-list
 * Categories: trace-query
 * Keywords: query, list, editorial
 * Viewport Width: 1400
 */
?>

<!-- wp:query {"queryId":32,"query":{"perPage":10,"postType":"post","order":"desc","orderBy":"date","inherit":false,"offset":0},"metadata":{"categories":["trace-query"],"patternName":"trace/query-editorial-list","name":"Editorial List"}} -->
 
<div class="wp-block-query"><!-- wp:post-template {"style":{"typography":{"textTransform":"none"}}} -->
<!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|border","width":"1px"},"top":{},"right":{},"left":{}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-width:1px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"16px","right":"16px","bottom":"16px","left":"16px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>✴︎</p>
<!-- /wp:paragraph -->

<!-- wp:post-date {"textAlign":"left","format":"M j, Y","metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"textTransform":"uppercase"}},"textColor":"foreground","fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:post-terms {"term":"category","prefix":"✴︎ ","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"textTransform":"uppercase"}},"textColor":"foreground"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"16px","bottom":"1.2rem","right":"16px","left":"16px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:16px;padding-right:16px;padding-bottom:1.2rem;padding-left:16px"><!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"layout":{"selfStretch":"fit"},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.1","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"display-l"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"left"}} -->
<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query -->