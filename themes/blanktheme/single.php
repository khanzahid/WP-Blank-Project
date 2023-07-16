<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
get_header();
?>

<h1 class="mt-5 mb-5"><?=get_the_title();?></h1>

<a href="<?=get_home_url();?>/projects/">Back to Archive</a>
<?php 
get_footer();
?>
