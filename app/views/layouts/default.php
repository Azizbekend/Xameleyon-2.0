<?php

$site = require 'app/config/routes.php';

// Делаем динамические ссылки
switch ($linksPage) {
    case 'welcome':
        $links = [
            'about' => '#about',
            'cours' => '#cours',
            'teacher' => '#teacher',
            'contact' => '#contact',
            'login' => 'login',
        ];
        break;
    case 'about':
        $links = [
            'about' => '#about',
            'cours' => '../main/#cours',
            'teacher' => '../main/#teacher',
            'contact' => '#contact',
            'login' => 'login',
        ];
        break;

    case 'cours':
        $links = [
            'about' => '../main/#about',
            'cours' => '../main/#cours',
            'teacher' => '../main/#teacher',
            'contact' => '#contact',
            'login' => 'login',
        ];
        break;

    default:
        $links = [
            'about' => '../main/#about',
            'cours' => '../main/#cours',
            'teacher' => '../main/#teacher',
            'contact' => '../main/#contact',
            'login' => 'login',
        ];
        break;
}

require_once ('app/views/partials/header.php');


echo $content;

if ($headFoot != "profile" && $headFoot != "lesson" && $pannelActive != "login" && $pannelActive != "register") {
    require_once ('app/views/partials/contact.php');
}


require_once ('app/views/partials/footer.php');

?>
</body>

</html>