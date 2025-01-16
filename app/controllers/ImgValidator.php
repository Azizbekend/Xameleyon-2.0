<?php
namespace app\controllers;

class ImgValidator
{
    // Добавить файл
    public function uploadImg($nameFolder, $file, $maxSize, $errorName, $type = "img")
    {
        // Расширение файла
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        $resultVald = false;
        if ($type == "img") {
            $resultVald = self::validateImg($file, $maxSize, $errorName);
        } else if ($type == "video") {
            $resultVald = self::validateVideo($file, $maxSize, $errorName);
        }

        if ($resultVald) {
            // Формируем название для файла
            $fileName = uniqid() . '.' . $extension;
            // Загружаем файл
            if (!move_uploaded_file($file['tmp_name'], 'public/media/' . $nameFolder . '/' . $file['name'])) {
                $_SESSION['errors'][$errorName] = "Файл не загрузился";
                return false;
            }
        } else {
            return false;
        }

        // Иначе возвращаем путь к картинке
        return $file['name'];
    }
    // Изменить файл
    public function updatePathImg($nameFolder, $file, $oldName, $maxSize, $errorName, $type = "img")
    {
        // Валидация
        $resultVald = false;
        if ($type == "img") {
            $resultVald = self::validateImg($file, $maxSize, $errorName);
        } else if ($type == "video") {
            $resultVald = self::validateVideo($file, $maxSize, $errorName);
        }

        if ($resultVald) {
            $fileName = $oldName;
            $this->deleteImg($nameFolder, $fileName);

            // Загружаем файл
            if (!move_uploaded_file($file['tmp_name'], 'public/media/' . $nameFolder . '/' . $file['name'])) {
                $_SESSION['errors'][$errorName] = "Файл не загрузился";
            } else {
                return false;
            }
        } else {
            return false;
        }
        return $file['name'];
    }
    // Проверка на валидность файла 
    static function validateImg($file, $maxSize, $errorName)
    {
        // Проверка размера файла
        if ($file['size'] > $maxSize * 1024 * 1024) { // Размер в байтах (8 MB)
            $_SESSION['errors'][$errorName] = "Размер файла превышает допустимый лимит (" . $maxSize . " MB).";
            return false;
        }

        // Проверка типа файла
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            $_SESSION['errors'][$errorName] = "Недопустимый тип файла. Разрешены только JPEG, PNG и GIF.";
            return false;
        }

        // Проверка на наличие повреждений файла
        if (!@getimagesize($file['tmp_name'])) {
            $_SESSION['errors'][$errorName] = "Файл не является изображением или поврежден.";
            return false;
        }

        return true; // Все проверки прошли успешно
    }

    static function validateVideo($file, $maxSize, $errorName)
    {
        // Проверка размера файла
        if ($file['size'] > $maxSize * 1024 * 1024) { // Размер в байтах (8 MB)
            $_SESSION['errors'][$errorName] = "Размер файла превышает допустимый лимит (" . $maxSize . " MB).";
            return false;
        }

        // Проверка типа файла
        $allowedTypes = ["video/mp4", "video/x-msvideo", "video/quicktime", "video/x-ms-wmv", "video/x-flv", "video/webm", "video/ogg"];

        if (!in_array($file['type'], $allowedTypes)) {
            $_SESSION['errors'][$errorName] = "Недопустимый тип файла. Разрешены только MP4, AVI, MOV, WMV, FLV, WebM и Ogg.";
            return false;
        }

        return true; // Все проверки прошли успешно
    }

    // Удалить файл
    public function deleteImg($nameFolder, $fileName)
    {
        $path = 'public/media/' . $nameFolder . '/' . $fileName;
        if (file_exists($path)) {
            unlink($path);
            return true;
        } else {
            return false;
        }
    }
}
?>