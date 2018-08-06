<?php
class ModelErrorpage extends ModelRoot
{
    public function badRequest()
    {
        $this->notFound();
        $this->dataObject->set('httpCode', 400);
        return $this->dataObject;
    }

    public function unauthorized()
    {
        $this->dataObject->set('title', 'Unauthorized');
        $this->dataObject->set('errorMessage', 'You are not authorized to do this');
        $this->dataObject->set("httpCode", 401);
        return $this->dataObject;
    }

    public function forbidden()
    {
        $this->dataObject->set('title', 'Not allowed');
        $this->dataObject->set('errorMessage', 'This is not allowed!');
        $this->dataObject->set('httpCode', 403);
        return $this->dataObject;
    }

    public function notFound()
    {
        $this->dataObject->set('title', 'Page not found');
        $this->dataObject->set('errorMessage', 'Oops... Page can not be found...');
        $this->dataObject->set('httpCode', 404);
        return $this->dataObject;
    }

    public function methodNotAllowed()
    {
        $this->notFound();
        $this->dataObject->set('httpCode', 405);
        return $this->dataObject;
    }

    public function serverError()
    {
        $this->dataObject->set('title', 'Server Error');
        $this->dataObject->set('errorMessage', 'An unknown error has occurred...');
        $this->dataObject->set('httpCode', 500);
        return $this->dataObject;
    }

    public function standard()
    {
        $this->dataObject->set('title', 'Error');
        $this->dataObject->set('errorMessage', 'An unknown error has occurred...');
        $this->dataObject->set('httpCode', 520);
        return $this->dataObject;
    }

    public function custom()
    {
        $this->dataObject->set('title', 'Error');
        $this->dataObject->set('httpCode', 0);
        return $this->dataObject;
    }
}
