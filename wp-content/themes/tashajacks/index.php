<?php

/*
 * @see https://timber.github.io/docs/reference/timber-post/
 */
Timber::render( 'posts.twig', get_context_with_fields([
    'posts' => new Timber\PostQuery()
]) );