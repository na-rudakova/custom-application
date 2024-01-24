<?php

add_shortcode('application_form', 'render_application_form');

function render_application_form() {
    ob_start();
    ?>
    <form id="application-form">
        <label for="user">Выберите пользователя:</label>
        <?php
        wp_dropdown_users(array('name' => 'user'));
        ?>
        <br>
        <label for="title">Заголовок:</label>
        <input type="text" name="title" required>
        <br>
        <label for="description">Описание:</label>
        <textarea name="description" required></textarea>
        <br>
        <input type="submit" value="Отправить заявку">
    </form>
    <div id="application-result"></div>
    <?php
    wp_enqueue_script('jquery');
    add_action('wp_enqueue_scripts', 'enqueue_custom_application_scripts');

    function enqueue_custom_application_scripts() {
        // Подключаем скрипт jQuery
        wp_enqueue_script('jquery');
    
        // Подключаем скрипт формы и передаем rest_url
        wp_enqueue_script('custom-application-script', plugin_dir_url(__FILE__) . '/js/custom-application.js', array('jquery'), false, true);
    
        // Определяем переменные, которые будем передавать в скрипт
        $script_vars = array(
            'rest_url' => rest_url('applications/v1/submit'),
        );
    
        // Локализуем скрипт с определенными переменными
        wp_localize_script('custom-application-script', 'custom_application_vars', $script_vars);
    }
    return ob_get_clean();
}