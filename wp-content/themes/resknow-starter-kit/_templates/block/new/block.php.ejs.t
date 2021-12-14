---
to: views/blocks/<%= name %>/block.php
---
<?php

add_filter( 'theme.block.<%= name %>', function( $context ) {
    // Manipulate block data before render
    return $context;
} );