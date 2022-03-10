<?php

/**
 * Populate the "Icon" select with visuals of the icons available in our theme
 */
add_filter( 'acf/load_field/key=buttons-icon', function( $field ) {
    $field['choices'] = get_list_of_icons();
    return $field;
} );