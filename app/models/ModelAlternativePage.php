<?php
class ModelAlternativePage extends ModelRoot
{
    public function standard()
    {
        $this->dataObject->set('title', 'Page title');
        $this->dataObject->set('random', rand(100, 200));
        return $this->dataObject;
    }

    public function doSomething()
    {
        $this->dataObject->set('title', 'Action');
        $this->dataObject->set('username', 'Alice');
        return $this->dataObject;
    }

    public function Alice()
    {
        $this->dataObject->set('title', 'Alice');
        $this->dataObject->set('username', 'Alice');
        $this->dataObject->set('mail', 'alice@core.mvc');
        return $this->dataObject;
    }
}
