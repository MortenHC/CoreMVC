<?php
class DefaultResponse
{
    private static function generateErrorPage($type)
    {
        require_once __DIR__ . "/../controllers/ControllerErrorpage.php";
        $errorController = new ControllerErrorpage("standard", $type);
        $errorController->executeAction();
        die();
    }

    public static function badRequest()
    {
        self::generateErrorPage('badRequest');
    }

    public static function unauthorized()
    {
        self::generateErrorPage('unauthorized');
    }

    public static function forbidden()
    {
        self::generateErrorPage('forbidden');
    }

    public static function notFound()
    {
        self::generateErrorPage('notFound');
    }

    public static function methodNotAllowed()
    {
        self::generateErrorPage('methodNotAllowed');
    }

    public static function serverError()
    {
        self::generateErrorPage('serverError');
    }

    public static function unknown()
    {
        self::generateErrorPage('standard');
    }
}
