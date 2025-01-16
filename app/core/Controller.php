<?php

namespace app\core;

use app\core\View;

// Модели таблиц
use app\models\CourseModel;
use app\models\DirectionModel;
use app\models\FeedbackFromModel;
use app\models\GradeStudentsModel;
use app\models\LessonModel;
use app\models\PersonalCoursesModel;
use app\models\ProfessionModel;
use app\models\SalaryCourseModel;
use app\models\TheoryModel;
use app\models\UserModel;

// Валидаторы
use app\controllers\ImgValidator;


abstract class Controller
{
    // Для контроллера
    public $route;
    public $view;
    public $acl;

    // Модели таблиц
    public $courseMod;
    public $directionMod;
    public $feedbackFromMod;
    public $gradeStudentsMod;
    public $lessonMod;
    public $personalCoursesMod;
    public $professionMod;
    public $salaryCourseMod;
    public $skillsCourseMod;
    public $theoryMod;
    public $userMod;

    // Валидаторы
    public $imgValidator;

    public function __construct($route)
    {
        $this->route = $route;

        if (!$this->checkAcl()) {
            View::errorCode(403);
            exit();
        }

        $this->view = new View($route);

        // Модели таблиц
        $this->courseMod = new CourseModel;
        $this->directionMod = new DirectionModel;
        $this->feedbackFromMod = new FeedbackFromModel;
        $this->gradeStudentsMod = new GradeStudentsModel;
        $this->lessonMod = new LessonModel;
        $this->personalCoursesMod = new PersonalCoursesModel;
        $this->professionMod = new ProfessionModel;
        $this->salaryCourseMod = new SalaryCourseModel;
        $this->theoryMod = new TheoryModel;
        $this->userMod = new UserModel;

        // Валидаторы
        $this->imgValidator = new ImgValidator;
    }

    public function checkAcl()
    {
        $role = $this->lookRole();
        $this->acl = require 'app/acl/' . $this->route['controller'] . '.php';

        if ($this->isAcl("all")) {
            return true;
        } elseif (!isset($_SESSION['user']['id']) and $this->isAcl($role)) {
            return true;
        } elseif (isset($_SESSION['user']['id']) and $this->isAcl($role)) {
            return true;
        } elseif (isset($_SESSION['user']['id']) and $this->isAcl($role)) {
            return true;
        } elseif (isset($_SESSION['user']['id']) and $this->isAcl($role)) {
            return true;
        }
        return false;
    }

    public function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }

    public function lookRole()
    {
        if (isset($_SESSION['user']['idRole'])) {
            switch ($_SESSION['user']['idRole']) {
                case '1':
                    return 'admin';
                    break;
                case '2':
                    return 'teacher';
                    break;
                case '3':
                    return 'student';
                    break;
            }
        } else {
            return 'guest';
        }
    }
}

?>