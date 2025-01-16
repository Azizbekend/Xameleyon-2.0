<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{

    public function feedbackFrom()
    {
        if (empty($_POST['fio'])) {
            $_SESSION['errors']['fioFeedback'] = 'Поле пустое';
        }

        if (empty($_POST['tel'])) {
            $_SESSION['errors']['telFeedback'] = 'Поле пустое';
        }

        if (empty($_SESSION['errors']['telFeedback'])) {
            $data = [
                'name' => $_POST['fio'],
                'telNumber' => $_POST['tel'],
            ];
            $this->feedbackFromMod->creatFeedbackFrom($data);
        }
    }

    public function welcomeAction()
    {
        // Активация формы обратной связи
        if (isset($_POST['feedback'])) {
            $this->feedbackFrom();
        }

        $courses = $this->courseMod->getAllCourses();
        $useres = $this->userMod->getAllUserRole(2);
        $profUseres = [];

        foreach ($useres as $user) {
            $getProf = $this->professionMod->getProfession($user['id']);

            $profUser = [
                'img' => $user['img'],
                'name' => $user['name'],
                'surname' => $user['surname'],
                'nameProf' => $getProf['name'],
                'imgProf' => $getProf['img'],
            ];
            array_unshift($profUseres, $profUser);
        }

        $data = [
            'courses' => $courses,
            'profUseres' => $profUseres
        ];

        $this->view->render('Xameleyon', $data);
    }

    public function coursAction()
    {

        // Активация формы обратной связи
        if (isset($_POST['feedback'])) {
            $this->feedbackFrom();
        }

        // Сохраняем id курса в сессии для того чтобы,
        // когда менял язык и страница обновлялась,
        // сохранить курс
        if (isset($_POST['oneCourse'])) {
            $_SESSION["idCours"] = $_POST['id'];
        }

        if (!empty($_SESSION["idCours"])) {
            $id = $_SESSION["idCours"];
            $courses = $this->courseMod->getCourse($id);
            $salaryes = $this->salaryCourseMod->getAllSalaryCourse($id);

            $courseListProf = $this->directionMod->getCourseDirection($id);
            $profUseres = [];

            foreach ($courseListProf as $userId) {
                $getProf = $this->professionMod->getProfession($userId['idTeacher']);
                $user = $this->userMod->getInfoUser($userId['idTeacher']);
                $profUser = [
                    'img' => $user['img'],
                    'name' => $user['name'],
                    'surname' => $user['surname'],
                    'nameProf' => $getProf['name'],
                    'imgProf' => $getProf['img'],
                ];
                array_unshift($profUseres, $profUser);
            }

            $listLesson = $this->lessonMod->getLesson($id);
            $listTheory = [];
            foreach ($listLesson as $idTheory) {
                array_push($listTheory, $this->theoryMod->getTheory($idTheory['idTheory']));
            }
        }

        $data = [
            'courses' => $courses,
            'listTheory' => $listTheory,
            'salaryes' => $salaryes,
            'profUseres' => $profUseres
        ];

        $this->view->render('Курс', $data);
    }

    public function aboutAction()
    {
        // Активация формы обратной связи
        if (isset($_POST['feedback'])) {
            $this->feedbackFrom();
        }

        $this->view->render('О нас');
    }

    public function loginAction()
    {
        if (isset($_POST['login'])) {
            $_SESSION['email'] = $_POST['email'];
            // Проверка почты
            if (empty($_POST['email']))
                $_SESSION['errors']['email'] = "Поле пустое";
            else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                $_SESSION['errors']['email'] = 'Поле почты некорректно';

            // Проверка пароля
            if (empty($_POST['password']))
                $_SESSION['errors']['password'] = "Поле пусое";

            if (empty($_SESSION['errors'])) {
                $chekUser = $this->userMod->getLoginUser($_POST['email'], $_POST['password']);
                if (in_array(false, $chekUser) && $chekUser['email'] == false) {
                    $_SESSION['errors']['email'] = "Данного пользователя не существует";
                } else if (in_array(false, $chekUser) && $chekUser['email'] != false) {
                    $_SESSION['errors']['password'] = "неверный пароль";
                } else {
                    $_SESSION['user'] = $this->userMod->getRegisterUser($_POST['email'])[0];
                    header("Location: ../../profile/infoUser");
                }
            }
        }
        $this->view->render('Авторизация');
    }

    public function registerAction()
    {
        if (isset($_POST['register'])) {
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['surname'] = $_POST['surname'];
            $_SESSION['middleName'] = $_POST['middleName'];
            $_SESSION['link'] = $_POST['link'];
            $_SESSION['tel'] = $_POST['tel'];
            $_SESSION['email'] = $_POST['email'];

            if (empty($_POST['surname']))
                $_SESSION['errors']['surname'] = "Поле обязательно для заполнения";
            if (empty($_POST['name']))
                $_SESSION['errors']['name'] = "Поле обязательно для заполнения";
            if (!empty($_POST['link']) && strpos($_POST['link'], 'https') === false)
                $_SESSION['errors']['link'] = "Поле ссылки некорректно";
            if (empty($_POST['tel']))
                $_SESSION['errors']['tel'] = "Поле обязательно для заполнения";
            if ($this->userMod->getRegisterUser($_POST['email'])) {
                $_SESSION['errors']['email'] = 'Почта уже зарегистрирована';
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errors']['email'] = 'Поле почты некорректно';
            } else if (empty($_POST['email'])) {
                $_SESSION['errors']['email'] = "Поле пустое";
            }
            if (empty($_POST['password'])) {
                $_SESSION['errors']['password'] = "Поле обязательно для заполнения";
            } else if (strlen($_POST['password']) < 6) {
                $_SESSION['errors']['password'] = "Не менее 6 символов. Нехватает ещё " . 6 - strlen($_POST['password']) . " символов";
            }
            if (empty($_POST['password_r'])) {
                $_SESSION['errors']['password_r'] = "Поле обязательно для заполнения";
            } else if ($_POST['password_r'] != $_POST['password']) {
                $_SESSION['errors']['password_r'] = "Пароли не совподают";
            }
            if (empty($_SESSION['errors'])) {
                $data = [
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'middleName' => $_POST['middleName'],
                    'telegaLink' => $_POST['link'],
                    'telNumber' => $_POST['tel'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'idRole' => 3,
                ];

                if ($this->userMod->createUser($data)) {
                    $_SESSION['user'] = $this->userMod->getLastUser();
                    header("Location: ../../profile/infoUser");
                }
                ;
            }
            ;
        }
        $this->view->render('Регистрация');
    }
}

?>