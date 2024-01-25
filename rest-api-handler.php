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

    $entityManager = getEntityManager(); // Добавлено получение EntityManager

    $user = $entityManager->find('Entity\User', $user_id);
    if (!$user) {
        return 'Пользователь не найден.';
    }

    $application = new \Entity\User();
    $application->setUser($user);
    $application->setTitle($title);
    $application->setDescription($description);

    $entityManager->persist($application);
    $entityManager->flush();

    return 'Заявка успешно отправлена!';
}