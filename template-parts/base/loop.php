<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post() ?>
		<?php get_template_part( 'template-parts/base/content', get_post_format() ) ?>
	<?php endwhile ?>

	<?php the_posts_pagination() ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/base/content', 'none' ) ?>

<?php endif ?>
