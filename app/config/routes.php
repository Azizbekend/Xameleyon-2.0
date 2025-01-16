<?php

return [

    // Простые страницы
    '' => [
        'controller' => 'main',
        'action' => 'welcome',
    ],
    'main' => [
        'controller' => 'main',
        'action' => 'welcome',
    ],

    'main/about' => [
        'controller' => 'main',
        'action' => 'about',
    ],

    'main/cours' => [
        'controller' => 'main',
        'action' => 'cours',
    ],

    'main/login' => [
        'controller' => 'main',
        'action' => 'login',
    ],

    'main/register' => [
        'controller' => 'main',
        'action' => 'register',
    ],

    // Страница с уроками
    'lesson/lesson(\?.*)?$' => [
        'controller' => 'lesson',
        'action' => 'lesson',
        'params' => [],
    ],

    // Личный кабинет 
    'profile/infoUser' => [
        'controller' => 'profile',
        'action' => 'infoUser',
    ],

    'profile/userInfoForAdmin(\?.*)?$' => [
        'controller' => 'profile',
        'action' => 'userInfoForAdmin',
    ],

    'profile/group' => [
        'controller' => 'profile',
        'action' => 'group',
    ],

    'profile/infoGroup' => [
        'controller' => 'profile',
        'action' => 'infoGroup',
    ],

    'profile/courses' => [
        'controller' => 'profile',
        'action' => 'courses',
    ],

    'profile/coursesMy' => [
        'controller' => 'profile',
        'action' => 'coursesMy',
    ],

    'profile/statistics' => [
        'controller' => 'profile',
        'action' => 'statistics',
    ],

    'profile/addcours' => [
        'controller' => 'profile',
        'action' => 'addcours',
    ],

    'profile/studentscours' => [
        'controller' => 'profile',
        'action' => 'studentscours',
    ],

    'profile/infoCourse' => [
        'controller' => 'profile',
        'action' => 'infoCourse',
    ],

    'profile/buy' => [
        'controller' => 'profile',
        'action' => 'buy',
    ],

    'profile/exit' => [
        'controller' => 'profile',
        'action' => 'exit',
    ],

    // Страницы ошибки
    'profile/exit' => [
        'controller' => 'profile',
        'action' => 'exit',
    ],
];
?>