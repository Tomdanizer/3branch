<div id="post-<?php the_ID(); ?>" class="blog-entry">

<header>

<?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><?php the_title(); ?><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>

<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>

</header>

<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>



</div>