<?php

add_action('admin_menu', 'register_application_admin_page');

function register_application_admin_page() {
    add_menu_page('Заявки', 'Заявки', 'manage_options', 'application-admin-page', 'render_application_admin_page');
}

function render_application_admin_page() {
    $entityManager = getEntityManager(); 

    $applicationRepository = $entityManager->getRepository('Entity\User'); 
    $applications = $applicationRepository->findAll();

    echo '<h2>Список заявок</h2>';
    echo '<ul>';
    foreach ($applications as $application) {
        echo '<li>';
        echo 'Пользователь: ' . $application->getUser()->getLogin() . ', ';
        echo 'Заголовок: ' . esc_html($application->getTitle()) . ', ';
        echo 'Описание: ' . esc_html($application->getDescription());
        echo '</li>';
    }
    echo '</ul>';
}