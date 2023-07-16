	<footer class="footer">
		<div class="site-info">
		
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

<?php if (is_page_template('template-ajax-req.php')) {?>

    <script> var ajx_url = '<?php echo admin_url("admin-ajax.php", null); ?>';</script>
    <script>
        (function( $ ) {
        $(window).bind("load", function() {
            $.ajax({
                type: 'POST',
                url: ajx_url,
                data: {
                    action : 'get_project_func',
                },
                success: function( response ) {
                console.log(response);
                document.getElementById("myJsnData").innerHTML = JSON.stringify(response);;

                }
            });
            
        });
    })( jQuery );
    </script>

<?php } ?>
</body>
</html>
