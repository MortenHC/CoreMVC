<?php
class ModelFrontpage extends ModelRoot
{
    public function standard()
    {
        $this->dataObject->set('title', 'Front page title');
        $this->dataObject->set('titlePostfix', ' - CoreMVC');
        return $this->dataObject;
    }
}
