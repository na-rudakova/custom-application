<?php

add_action('admin_menu', 'register_application_admin_page');

function register_application_admin_page() {
    add_menu_page('Заявки', 'Заявки', 'manage_options', 'application-admin-page', 'render_application_admin_page');
}

function render_application_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'applications';

    $applications = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<h2>Список заявок</h2>';
    echo '<ul>';
    foreach ($applications as $application) {
        echo '<li>';
        echo 'Пользователь: ' . get_user_by('ID', $application->user_id)->user_login . ', ';
        echo 'Заголовок: ' . esc_html($application->title) . ', ';
        echo 'Описание: ' . esc_html($application->description);
        echo '</li>';
    }
    echo '</ul>';
}