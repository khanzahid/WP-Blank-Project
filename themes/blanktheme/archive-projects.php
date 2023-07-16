<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
get_header();
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if ( have_posts() ) : ?>

			<header class="page-header  mt-5 mb-5">
				<h1 class="page-title"><?php echo post_type_archive_title( '', false );?></h1>
			</header>
            
            <div class="row">
			<?php
			while ( have_posts() ) : the_post();?>
          
             	<div class="col-md-4">
             		<div class="shadow-sm p-3 mb-5 bg-white rounded">
             		<a href="<?=get_the_permalink();?>"><?php the_title(); ?></a>
             		<?php the_content(); ?>
             		</div>
             	</div>
			<?php endwhile; ?>
		</div>
		<div class="pagination mt-4">
		  <?php the_posts_pagination(wp_custom_pagination()); ?>
		</div>
		<?php else :

			echo "Records not Founds";

		endif;
		?>
		</div>
	</div>
</div>	

<?php get_footer(); ?>
