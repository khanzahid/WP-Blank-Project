<?php
/**
* Template Name: coffeeQuotes
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
get_header();
?>
<div class="row">
<?php 
for($count=0;$count<5;$count++){
 $response = wp_remote_get('https://api.kanye.rest/');

 if (is_wp_error($response)) {
     return 'Unable to fetch Coffee quotes.';
 }

 $body = wp_remote_retrieve_body($response);
 $data = json_decode($body, true);
if (isset($data['quote'])) {?>
    <div class="col-lg-12 mt-5">
        <div id="coffe-quote"><h4><strong> Quote: <?=$count+1;?> - </strong><i>"<?=$data['quote'];?>"</i></h4></div>
    </div>

<?php  } else {
    echo 'Unable to fetch Coffee quotes.';
}
} //endfor loop
?>

</div>
   



<?php get_footer();?>