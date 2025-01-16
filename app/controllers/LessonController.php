<?php

namespace app\controllers;

use app\core\Controller;

class LessonController extends Controller
{

    public function lessonAction()
    {

        if (isset($_POST['removeTheory'])) {
            $this->theoryMod->removeTheory($_POST['idheory']);
            header('Location: ');
        }

        // Проверка типа файла
        $allowedTypes = ["video/mp4", "video/x-msvideo", "video/quicktime", "video/x-ms-wmv", "video/x-flv", "video/webm", "video/ogg"];
        // Создаём новый урок
        if (isset($_POST['addLesson'])) {
            if (isset($_FILES['imgLesson']) && $_FILES['imgLesson']['error'] === UPLOAD_ERR_OK) {
                if (in_array($_FILES['imgLesson']['type'], $allowedTypes)) {
                    $resultImg = $this->imgValidator->uploadImg('lessons', $_FILES['imgLesson'], 50, 'theoryImg', 'video');
                    $mediaType = "video";
                } else {
                    $resultImg = $this->imgValidator->uploadImg('lessons', $_FILES['imgLesson'], 8, 'theoryImg');
                    $mediaType = "img";
                }

                if ($resultImg != false) {
                    $imgLesson = $resultImg;
                }
            } else {
                $_SESSION["errors"]["theoryImg"] = "Вставьте медиа";
            }

            if (empty($_POST['theoryName'])) {
                $_SESSION['errors']['theoryName'] = "Поле не должно быть пустым";
            }

            if (empty($_POST["textLesson"])) {
                $_SESSION["errors"]["textLesson"] = "Поле не должно быть пустым";
            }

            if (empty($_SESSION['errors'])) {

                $data = [
                    'media' => $imgLesson,
                    'theoryName' => $_POST["theoryName"],
                    'textLesson' => $_POST["textLesson"],
                    'mediaType' => $mediaType,
                ];

                $this->theoryMod->creatTheory($data);
                $lastTheory = $this->theoryMod->getLastTheory();
                $data = [
                    'idCours' => $_SESSION['coursLesson'],
                    'idTheoty' => $lastTheory['MAX(id)'],
                ];

                $this->lessonMod->createLesson($data);
                $lastLesson = $this->lessonMod->getLastLesson();
                $listUsersCours = $this->personalCoursesMod->getAllUserCourses($_SESSION['coursLesson']);
                foreach ($listUsersCours as $value) {
                    $data = [
                        'idStudent' => $value['idUser'],
                        'idLesson' => $lastLesson["MAX(id)"],
                    ];
                    $this->gradeStudentsMod->creatGradeStudents($data);
                }
            }
        }

        // Обновляем урок
        if (isset($_POST['updateLesson'])) {
            if (isset($_FILES['imgLesson']) && $_FILES['imgLesson']['error'] === UPLOAD_ERR_OK) {
                if (in_array($_FILES['imgLesson']['type'], $allowedTypes)) {
                    $resultImg = $this->imgValidator->uploadImg('lessons', $_FILES['imgLesson'], 50, 'theoryImg', 'video');
                    $mediaType = "video";
                } else {
                    $resultImg = $this->imgValidator->uploadImg('lessons', $_FILES['imgLesson'], 8, 'theoryImg');
                    $mediaType = "img";
                }

                if ($resultImg != false) {
                    $imgLesson = $resultImg;
                }
            } else {
                $imgLesson = "";
                $mediaType = "";
            }

            if (empty($_POST['theoryName'])) {
                $_SESSION['errors']['theoryName'] = "Поле не должно быть пустым";
            }

            if (empty($_POST["textLesson"])) {
                $_SESSION["errors"]["textLesson"] = "Поле не должно быть пустым";
            }

            if (empty($_SESSION['errors'])) {
                $data = [
                    'media' => $imgLesson,
                    'theoryName' => $_POST["theoryName"],
                    'textLesson' => $_POST["textLesson"],
                    'mediaType' => $mediaType,
                    'id' => $_POST["idLesson"],
                ];

                $this->theoryMod->updateTheory($data);
            }
        }

        // Выводим все уроки
        if (isset($_POST['idCourse'])) {
            $_SESSION['coursLesson'] = $_POST['idCourse'];
        }

        if (!empty($_SESSION['coursLesson'])) {
            $coursName = $this->courseMod->getCourse($_SESSION['coursLesson'])['name'];
            $lessonList = $this->lessonMod->getLesson($_SESSION['coursLesson']);
            $theoryList = [];

            if ($_SESSION['user']["idRole"] == 3) {
                foreach ($lessonList as $lesson) {
                    $contain = [
                        'theory' => $this->theoryMod->getTheory($lesson["idTheory"]),
                        'grade' => $this->gradeStudentsMod->getGradeStudents($_SESSION['user']['id'], $lesson['id'])["status"],
                    ];
                    array_push($theoryList, $contain);
                }
            } else {
                foreach ($lessonList as $lesson) {
                    array_push($theoryList, $this->theoryMod->getTheory($lesson["idTheory"]));
                }
            }

            $data = [
                "coursName" => $coursName,
                "theoryList" => $theoryList,
            ];
        }

        if (isset($_POST['nextLesson'])) {
            $idTheory = $_POST['idTheory'];

            for ($i = 0; $i < count($lessonList); $i++) {
                if ($lessonList[$i]['idTheory'] == $idTheory) {
                    $this->gradeStudentsMod->updateGradeStudents($_SESSION['user']['id'], $lessonList[$i]['id']);
                    if (isset($lessonList[++$i])) {
                        $_GET['idTheory'] = $lessonList[$i]['idTheory'];
                        header('Location: lesson?idTheory=' . $_GET['idTheory'] . '');
                    } else {
                        $_GET['idTheory'] = $lessonList[0]['idTheory'];
                        header('Location: lesson?idTheory=' . $_GET['idTheory'] . '');
                    }
                }
            }
        }

        // Конец вывода всех уроков
        $this->view->render('Урок', $data);
    }
}

?>