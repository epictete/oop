<?php

class Form
{
    private $data;
    private $select;
    public $surround = 'p';

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    private function surround($html)
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    private function getChecked($index, $input)
    {
        return ($this->data[$index] == $input) ? 'checked' : null;
    }

    private function getSelected($index, $value)
    {
        return ($this->data[$index] == $value) ? 'selected' : null;
    }

    public function formStart($action, $method)
    {
        return '<form action="' . $action . '" method="' . $method . '">';
    }

    public function formEnd()
    {
        return '</form>';
    }

    public function selectStart($name)
    {
        $this->select = $name;
        return $this->surround('<select name="' . $name . '" id="' . $name . '">');
    }

    public function selectEnd()
    {
        return '</select>';
    }

    public function selectOption($value)
    {
        return '<option value="' . $value . '" ' . $this->getSelected($this->select, $value) . '>' . ucfirst($value) . '</option>';
    }

    public function input($name)
    {
        return $this->surround
        (
            ucfirst($name) . ':<br><input type="text" name="' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }

    public function submit()
    {
        return $this->surround('<button type="submit">Envoyer</button>');
    }

    public function textArea($name, $rows, $cols)
    {
        return $this->surround
        ('
            <textarea id="' . $name . '" name="' . $name . '" rows="' . $rows . '" cols="' . $cols . '">' . $this->getValue($name) . '
            </textarea>
        ');
    }

    public function radio($name, $value)
    {
        return $this->surround
        ('
            <input type="radio" id="' . $value . '" name="' . $name . '" value="' . $value . '" ' . $this->getChecked($name, $value) . '>
            <label for="' . $value . '">' . ucfirst($value) . '</label>
        ');
    }

    public function checkbox($name, $value, $label)
    {
        return $this->surround
        ('
            <input type="checkbox" id="' . $name . '" name="' . $name . '" value="' . $value . '" ' . $this->getChecked($name, $value) . '>
            <label for="' . $name . '">' . $label . '</label>
        ');
    }
}

?>