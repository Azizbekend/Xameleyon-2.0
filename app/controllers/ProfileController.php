<?php

namespace app\controllers;

use app\core\Controller;

class ProfileController extends Controller
{
    public function profileAction()
    {
        $this->view->render('Личный кабинет');
    }

    public function infoUserAction()
    {
        // Удаляем профиль
        if (isset($_POST["delete"])) {
            $userId = $_SESSION['user']['id'];
            if ($this->userMod->deleteUser($userId)) {
                unset($_SESSION['user']);
                header("Location: ../../");
            }
        }

        if (isset($_POST["deleteUserFoto"])) {
            $this->imgValidator->deleteImg("users", $_SESSION['user']['img']);
            $this->userMod->deleteUserFoto($_SESSION["user"]["id"]);
            $_SESSION['user'] = $this->userMod->getInfoUser($_SESSION["user"]["id"]);
        }

        // Обновляем данные пользователя
        if (isset($_POST["update"])) {

            if (isset($_FILES['userFoto']) && !empty($_FILES['userFoto']['name'])) {
                if (empty($_SESSION['user']['img'])) {
                    $resultImg = $this->imgValidator->uploadImg('users', $_FILES['userFoto'], 8, 'imgUser');
                } else {
                    $resultImg = $this->imgValidator->updatePathImg('users', $_FILES['userFoto'], $_SESSION['user']['img'], 8, 'imgUser');
                }

                if ($resultImg != false) {
                    $userImg = $resultImg;
                } else {
                    $userImg = "";
                }
            } else {
                $userImg = "";
            }

            if (empty($_POST['surname'])) {
                $_SESSION['errors']['surname'] = "Поле не должно быть пустым";
            }

            if (empty($_POST['name'])) {
                $_SESSION['errors']['name'] = "Поле не должно быть пустым";
            }

            if (!empty($_POST['telegaLink']) && strpos($_POST['telegaLink'], 'https') === false) {
                $_SESSION['errors']['link'] = "Поле ссылки некорректно";
            }

            if (empty($_POST['telNumber'])) {
                $_SESSION['errors']['tel'] = "Поле не должно быть пустым";
            }

            if ($_POST['email'] != $_SESSION['user']['email']) {
                if ($this->userMod->getRegisterUser($_POST['email'])) {
                    $_SESSION['errors']['email'] = 'Почта уже зарегистрирована';
                } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['errors']['email'] = 'Поле почты некорректно';
                } else if (empty($_POST['email'])) {
                    $_SESSION['errors']['email'] = "Поле пустое";
                }
            }

            if (!empty($_POST['password'])) {
                if (strlen($_POST['password']) < 6)
                    $_SESSION['errors']['password'] = "Не менее 6 символов. Нехватает ещё " . 6 - strlen($_POST['password']) . " символов";

                if (empty($_POST['password_r']))
                    $_SESSION['errors']['password_r'] = "Поле не должно быть пустым";
                else if ($_POST['password_r'] == $_POST['password'])
                    $_SESSION['errors']['password_r'] = "Пароли не должны совподать";
                else if (strlen($_POST['password_r']) < 6)
                    $_SESSION['errors']['password_r'] = "Не менее 6 символов. Нехватает ещё " . 6 - strlen($_POST['password_r']) . " символов";
                else
                    $passwordGood = $_POST['password_r'];
            } else {
                $passwordGood = "";
            }

            if (empty($_POST["birthday"])) {
                $_POST["birthday"] = "0000-01-01";
            }

            if (empty($_SESSION['errors'])) {
                $data = [
                    "id" => $_SESSION['user']['id'],
                    "userFoto" => $userImg,
                    "surname" => $_POST["surname"],
                    "name" => $_POST["name"],
                    "middleName" => $_POST["middleName"],
                    "birthday" => $_POST["birthday"],
                    "telegaLink" => $_POST["telegaLink"],
                    "telNumber" => $_POST["telNumber"],
                    "email" => $_POST["email"],
                    "password" => $passwordGood,
                ];
                $this->userMod->updateInfoUser($data);
                $_SESSION['user'] = $this->userMod->getInfoUser($data['id']);
            }
        }

        $this->view->render('Личная информация');
    }

    public function userInfoForAdminAction()
    {
        // Вывод пользователя
        // $data контейнир для данных
        $data = [];
        if (isset($_GET['idUser'])) {
            $_SESSION['userForAdmin'] = $_GET['idUser'];
            $_SESSION['userMore'] = $this->userMod->getInfoUser($_SESSION['userForAdmin']);
            $idCourseList = $this->personalCoursesMod->getAllCourses($_SESSION['userForAdmin']);
            foreach ($idCourseList as $idCourse) {
                array_push($data, $this->courseMod->getCourse($idCourse['idCours']));
            }
        }
        $this->view->render('Информация о пользователе', $data);
    }

    public function coursesMyAction()
    {
        // Вывод курсов
        $courses = [];
        $IdCourses = $this->personalCoursesMod->getAllCourses($_SESSION['user']['id']);

        foreach ($IdCourses as $IdCours) {
            $course = $this->courseMod->getCourse($IdCours['idCours']);
            $lessonList = $this->lessonMod->getCourseLesson($IdCours['idCours']);

            $i = 0;
            $j = 0;

            foreach ($lessonList as $lessonId) {
                $i++;
                if ($this->gradeStudentsMod->getGradeStudents($_SESSION['user']['id'], $lessonId['id'])['status'] == 1) {
                    $j++;
                }
            }

            $data = [
                'idCourse' => $course['id'],
                'nameCourse' => $course['name'],
                'gradeCountGood' => $j,
                'gradeCountAll' => $i,
            ];
            array_push($courses, $data);
        }

        if (isset($_POST['delete'])) {
            $this->courseMod->deleteCourse($_POST[' id_cours']);
        }

        $this->view->render('Каталог курсов', $courses);
    }

    public function coursesAction()
    {
        if (isset($_SESSION['updateCourseId'])) {
            unset($_SESSION['updateCourseId']);
        }

        // Открыть/закрыть курс
        if (isset($_POST['openCourse'])) {
            $this->courseMod->releaseOpenCourse($_POST['id_cours']);
        }
        if (isset($_POST['closeCourse'])) {
            $this->courseMod->releaseCloseCourse($_POST['id_cours']);
        }

        // Вывод курсов
        $data = [];
        if ($_SESSION['user']['idRole'] == 2) {
            $IdCourses = $this->directionMod->getTeacherDirection($_SESSION['user']['id']);
            foreach ($IdCourses as $IdCours) {
                array_push($data, $this->courseMod->getCourse($IdCours['idCours']));
            }
        } else if ($_SESSION['user']['idRole'] == 3) {
            $listCourse = $this->personalCoursesMod->getAllCourses($_SESSION['user']['id']);
            $courses = $this->courseMod->getAllCourses();

            $listIdCourse = [];
            foreach ($listCourse as $idCourse) {
                array_push($listIdCourse, $idCourse['idCours']);
            }


            $data = [
                'listIdCourse' => $listIdCourse,
                'courses' => $courses,
            ];


        } else {
            $data = $this->courseMod->getAllCourses();
        }

        if (isset($_POST['delete'])) {
            $this->courseMod->deleteCourse($_POST['id_cours']);
            header('Location: courses');
        }

        $this->view->render('Каталог курсов', $data);
    }

    public function statisticsAction()
    {

        // Переключатели
        if (isset($_POST['statistics__feedback'])) {
            $_SESSION['userMore']['idRole'] = 5;
        }
        if (isset($_POST['statistics__student'])) {
            $_SESSION['userMore']['idRole'] = 3;
        }
        if (isset($_POST['statistics__teacher'])) {
            $_SESSION['userMore']['idRole'] = 2;
        }

        // ---Вывод данных---
        $feedbackFrom = $this->feedbackFromMod->getAllFeedbackFrom();
        $studentsList = $this->userMod->getAllUserRole(3);
        $teachersList = $this->userMod->getAllUserRole(2);

        $courseList = $this->courseMod->getAllCourses();

        // Выводим студентов и их курсы
        $studCoursList = [];
        foreach ($studentsList as $student) {
            $coursList = $this->personalCoursesMod->getAllCourses($student["id"]);

            $coursListName = [];

            if (isset($coursList)) {
                foreach ($coursList as $cours) {
                    array_push($coursListName, $this->courseMod->getCourse($cours['idCours'])['name']);
                }
            }

            $data = [
                'student' => $student,
                'coursList' => $coursListName,
            ];

            array_push($studCoursList, $data);
        }

        // Выводим учителей и их курсы
        $teachCoursList = [];

        foreach ($teachersList as $teacher) {
            $coursList = $this->directionMod->getTeacherDirection($teacher['id']);
            $coursListName = [];

            if (isset($coursList)) {
                foreach ($coursList as $cours) {
                    array_push($coursListName, $this->courseMod->getCourse($cours['idCours']));
                }
            }

            $data = [
                'teachers' => $teacher,
                'coursList' => $coursListName,
            ];

            array_push($teachCoursList, $data);
        }

        $result = [
            "feedbackFrom" => $feedbackFrom,
            "studentsStatistic" => $studCoursList,
            "teachersStatistic" => $teachCoursList,
            "courseList" => $courseList,
        ];

        // ---Работа с запросами---
        if (isset($_POST["deletFeedback"])) {
            $this->feedbackFromMod->deleteFeedbackFrom($_POST['idFeedback']);
            unset($_SESSION['userMore']);
            header("Location: statistics");
        }

        if (isset($_POST["ban"])) {
            $this->userMod->banUser($_POST['idUser']);
            header("Location: statistics");
        }

        if (isset($_POST["razBan"])) {
            $this->userMod->razBanUser($_POST['idUser']);
            header("Location: statistics");
        }

        if (isset($_POST["addCoursTeacher"])) {
            $dirData = [
                "idTeacher" => $_POST['idTech'],
                "idCours" => $_POST['idCours'],
            ];

            for ($i = 0; $i < count($teachCoursList) - 1; $i++) {
                if ($teachCoursList[$i]["teachers"]["id"] == $_POST['idTech']) {

                    $listIdCourse = [];
                    foreach ($teachCoursList[$i]["coursList"] as $courseInfo) {
                        array_push($listIdCourse, $courseInfo['id']);
                    }

                    if (!in_array($_POST['idCours'], $listIdCourse)) {
                        $this->directionMod->createDirection($dirData);
                        header('Location: statistics');
                    }
                }
            }
        }

        if (isset($_POST['removeCourseTech'])) {
            $dirData = [
                "idTeacher" => $_POST['idTech'],
                "idCours" => $_POST['idCours'],
            ];
            $this->directionMod->deleteDirection($dirData);
            header('Location: statistics');
        }


        $this->view->render('Статистика', $result);
    }

    public function addcoursAction()
    {
        $data = [];
        if (isset($_POST['id_cours'])) {
            $_SESSION['updateCourseId'] = $_POST['id_cours'];
        }

        if (isset($_SESSION['updateCourseId'])) {
            $course = $this->courseMod->getCourse($_SESSION['updateCourseId']);
            $salaryes = $this->salaryCourseMod->getAllSalaryCourse($course['id']);

            $data = [
                'course' => $course,
                'salaryes' => $salaryes,
            ];
        }

        if (isset($_POST['updateCours'])) {

            if (isset($_FILES['imgCourse'])) {
                if ($_FILES['imgCourse']['error'] === UPLOAD_ERR_OK) {
                    $resultImg = $this->imgValidator->updatePathImg('cours-cards', $_FILES['imgCourse'], $course['img'], 8, 'img');
                }
            }

            self::inpCheckCourse();

            if (empty($_SESSION['errors'])) {
                $dataUpdate = [
                    'id' => $_SESSION['updateCourseId'],
                    'name' => $_POST['cours-name'],
                    'price' => $_POST['cours-price'],
                    'specialist' => $_POST['cours-specialist'],
                    'miniDiscription' => $_POST['cours-discriptionMini'],
                    'slogan' => $_POST['cours-slogan'],
                    'discription' => $_POST['cours-discription'],
                    'telegLink' => $_POST['telegLink'],
                ];
                $this->courseMod->updateCourse($dataUpdate);

                $dataSalary = [
                    'salary' => [],
                    'idCours' => [],
                ];

                array_push($dataSalary['idCours'], $_POST['idJunior']);
                array_push($dataSalary['idCours'], $_POST['idMiddle']);
                array_push($dataSalary['idCours'], $_POST['idSenior']);
                array_push($dataSalary['salary'], $_POST['income-junior']);
                array_push($dataSalary['salary'], $_POST['income-middle']);
                array_push($dataSalary['salary'], $_POST['income-senior']);

                $this->salaryCourseMod->updateSalaryCourse($dataSalary);
            }
        }

        if (isset($_POST['addCours'])) {
            if (isset($_FILES['imgCourse'])) {
                $resultImg = false;
                if ($_FILES['imgCourse']['error'] === UPLOAD_ERR_OK) {
                    $resultImg = $this->imgValidator->uploadImg('cours-cards', $_FILES['imgCourse'], 8, 'img');
                } else {
                    $_SESSION['errors']['img'] = 'Добавьте фото';
                }

                if ($resultImg != false) {
                    $imgCourse = $resultImg;
                }
            }

            self::inpCheckCourse();

            if (empty($_SESSION['errors'])) {
                $dataCreat = [
                    'img' => $imgCourse,
                    'name' => $_POST['cours-name'],
                    'price' => $_POST['cours-price'],
                    'specialist' => $_POST['cours-specialist'],
                    'miniDiscription' => $_POST['cours-discriptionMini'],
                    'slogan' => $_POST['cours-slogan'],
                    'discription' => $_POST['cours-discription'],
                    'telegLink' => $_POST['telegLink'],
                ];

                $this->courseMod->createCourse($dataCreat);
                $lastCourse = $this->courseMod->getLastCourse();

                $dataCreat = [
                    'salary' => [
                        $_POST['income-junior'],
                        $_POST['income-middle'],
                        $_POST['income-senior'],
                    ],
                    'idcours' => $lastCourse['id'],
                ];

                $this->salaryCourseMod->createSalaryCourse($dataCreat);

                if (isset($_SESSION["skills"])) {
                    foreach ($_SESSION["skills"] as $skill) {
                        $dataCreat = [
                            'title' => $skill["nameSkill"],
                            'text' => $skill["discriptionSkill"],
                            'idcours' => $lastCourse['id'],
                        ];
                    }
                }

                unset($_SESSION["skills"]);
                header('Location: courses');
            }
        }
        $this->view->render('Регистрация', $data);
    }

    static function inpCheckCourse()
    {
        self::inpCheck('cours-name', 'name');
        self::inpCheck('cours-price', 'price');
        self::inpCheck('cours-specialist', 'specialist');
        self::inpCheck('cours-discriptionMini', 'discriptionMini');
        self::inpCheck('cours-slogan', 'slogan');
        self::inpCheck('cours-discription', 'discription');
        self::inpCheck('income-junior', 'income-junior');
        self::inpCheck('income-middle', 'income-middle');
        self::inpCheck('income-senior', 'income-senior');
        self::inpCheck('telegLink', 'telegLink');
    }

    static function inpCheck($pName, $sName)
    {
        if (empty(trim($_POST[$pName]))) {
            $_SESSION['errors'][$sName] = 'Поле пустое';
        } else {
            $_SESSION['infoCourse'][$pName] = trim($_POST[$pName]);
        }
    }

    public function welcomeAction()
    {
        $this->view->render('Регистрация');
    }
    public function infoCourseAction()
    {

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
            $useres = $this->userMod->getAllUserRole(2);
            $profUseres = [];


            $listLesson = $this->lessonMod->getLesson($id);
            $listTheory = [];
            foreach ($listLesson as $idTheory) {
                array_push($listTheory, $this->theoryMod->getTheory($idTheory['idTheory']));
            }

            foreach ($useres as $user) {
                $profUser = [
                    'name' => $this->professionMod->getProfession($user['id'])['name'],
                    'img' => $this->professionMod->getProfession($user['id'])['img'],
                    'user' => $user['id']
                ];
                array_unshift($profUseres, $profUser);
            }
        }

        $data = [
            'courses' => $courses,
            'listTheory' => $listTheory,
            'salaryes' => $salaryes,
            'useres' => $useres,
            'profUseres' => $profUseres
        ];
        $this->view->render('Информация курса', $data);
    }
    public function exitAction()
    {
        unset($_SESSION['user']);
        header('Location: ../../');
        $this->view->render('Выход');
    }
    public function buyAction()
    {
        if (isset($_POST['pay'])) {
            // Номер карты
            if (empty(trim($_POST['number']))) {
                $_SESSION['errors']['number'] = 'Поле пустое';
            } else if (strlen($_POST['number']) != 19) {
                $_SESSION['errors']['number'] = 'Не корректно заполнено';
            } else {
                $_SESSION['infoBuy']["number"] = trim($_POST["number"]);
            }
            // Имя владельца
            if (empty(trim($_POST['name']))) {
                $_SESSION['errors']['name'] = 'Поле пустое';
            } else {
                $_SESSION['infoBuy']["name"] = trim($_POST["name"]);
            }
            // Срок карты
            if (empty(trim($_POST['date']))) {
                $_SESSION['errors']['date'] = 'Поле пустое';
            } else if (strlen($_POST['date']) != 5) {
                $_SESSION['errors']['date'] = 'Не корректно заполнено';
            } else {
                $_SESSION['infoBuy']["date"] = trim($_POST["date"]);
            }
            // Номер cvc
            if (empty(trim($_POST['cvc']))) {
                $_SESSION['errors']['cvc'] = 'Поле пустое';
            } else if (strlen($_POST['cvc']) != 3) {
                $_SESSION['errors']['cvc'] = 'Не корректно заполнено';
            } else {
                $_SESSION['infoBuy']["cvc"] = trim($_POST["cvc"]);
            }

            if (empty($_SESSION["errors"])) {

                $this->personalCoursesMod->createCourses($_SESSION['user']['id'], $_SESSION['idCours']);
                $theoryList = $this->lessonMod->getCourseLesson($_SESSION['idCours']);

                foreach ($theoryList as $theory) {
                    $dataGrade = [
                        'idStudent' => $_SESSION['user']['id'],
                        'idLesson' => $theory['id'],
                    ];
                    $this->gradeStudentsMod->creatGradeStudents($dataGrade);
                }

                unset($_SESSION['infoBuy']);
                header("Location: coursesMy");
            }
        }
        if (isset($_POST['buy'])) {
            $_SESSION['idBuy'] = $_POST['idCours'];
            $_SESSION['rate'] = $_POST['rate'];
        }

        if (isset($_SESSION['idBuy'])) {
            $course = $this->courseMod->getCourse($_SESSION['idBuy']);

            $data = [
                'id' => $course['id'],
                'img' => $course['img'],
                'name' => $course['name'],
                'price' => $course['price'],
                'rate' => $_SESSION['rate'],
            ];
        }
        $this->view->render('Покупка', $data);
    }
    public function studentscoursAction()
    {
        $this->view->render('Регистрация');
    }
}

?>