<?php
/**
 * Used to store data returned from a model and passed to a view
 */
class DataObject
{
    private $values = [];

    public function set($key, $val)
    {
        $this->values[$key] = $val;
    }

    public function get($key)
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        } else {
            return null;
        }
    }
}
