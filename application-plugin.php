<?php
/*
Plugin Name: Requests plugin via Doctrine
*/

// Подключение конфигурации Doctrine
require_once plugin_dir_path(__FILE__) . 'doctrine-config.php';

// Подключение активации плагина
require_once plugin_dir_path(__FILE__) . 'activate-plugin.php';

// Подключение обработчика REST API
require_once plugin_dir_path(__FILE__) . 'rest-api-handler.php';

// Подключение шорткода и скрипта для формы
require_once plugin_dir_path(__FILE__) . 'shortcode-form-script.php';

// Подключение административной страницы
require_once plugin_dir_path(__FILE__) . 'admin-page.php';