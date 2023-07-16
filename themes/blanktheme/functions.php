<?php
//redirect target IP
function redirect_target_ip_func() {
    $user_ip = get_the_user_ip();

    if (strpos($user_ip, '77.29') === 0) {
        wp_redirect('https://google.com', 301);
        exit();
    }
}
add_action('template_redirect', 'redirect_target_ip_func');
