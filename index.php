<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/media/logo/logo-mini.svg" type="image/x-icon">
    <title>Xameleyon</title>
</head>

<body>
        <?php

            if(!isset($_GET["page"]) || ($_GET["page"]) != "office"){
                include 'incl/header.php';
            }

            if(isset($_GET['page'])){
                switch ($_GET['page']) {
                    case 'welcome':
                        include 'welcome.php';
                        break;

                    case 'about':
                        include 'page-about.php';
                        break;
                    
                    case 'curs':
                        include 'page-curs.php';
                        break;

                    case 'login':
                        include 'page-logIn.php';
                        break;

                    case 'register':
                        include 'page-register.php';
                        break;

                    case 'office':
                        include 'office.php';
                        break;

                    default:
                        include 'welcome.php';
                    break;
                }
            }
            else{
                include 'welcome.php';
            }

            if(isset($_GET['page'])){
                if($_GET['page'] == 'welcome' || $_GET['page'] == 'about' || $_GET['page'] == 'curs'){
                    include 'incl/contact.php';
                }
            }

            include 'incl/footer.php';
        ?>

        <script src="assets/js/script.js"></script>
        <script src="assets/js/yatranslate.js"></script>
</body>

</html>