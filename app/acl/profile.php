<?php
return [
    'all' => [],
    'guest' => [],
    'student' => [
        'infoUser',
        'coursesMy',
        'courses',
        'infoCourse',
        'buy',
        'exit',
    ],
    'teacher' => [
        'infoUser',
        'courses',
        'exit',
    ],
    'admin' => [
        'infoUser',
        'courses',
        'statistics',
        'addcours',
        'userInfoForAdmin',
        'exit',
    ],
];
?>