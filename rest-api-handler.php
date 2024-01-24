<?php

add_action('rest_api_init', 'register_application_rest_endpoint');

function register_application_rest_endpoint() {
    register_rest_route('applications/v1', '/submit', array(
        'methods' => 'POST',
        'callback' => 'submit_application',
        'permission_callback' => '__return_true',
    ));
}

function submit_application($data) {
    $user_id = $data['user'];
    $title = sanitize_text_field($data['title']);
    $description = sanitize_text_field($data['description']);

    global $wpdb;
    $table_name = $wpdb->prefix . 'applications';

    $wpdb->insert($table_name, array(
        'user_id' => $user_id,
        'title' => $title,
        'description' => $description,
    ));

    return 'Заявка успешно отправлена!';
}