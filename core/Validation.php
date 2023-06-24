<?php

namespace Core;

abstract class Validation
{

    public const REQUIRED = 'Required';
    public const EMAIL = 'Email';
    public const MIN = 'min';
    public const MATCH = 'match';
    public array $errors = [];

    abstract protected function loadData():array;

    public function validator(array $rules)
    {
        if ($this->rules($rules)) {
            return true;
        }
    
    }

    private function rules(array $rules)
    {

        $data=$this->loadData();
        foreach ($data as $key => $value) {
            foreach ($rules[$key] as $rule) {
                if ($value == '' && empty($value)) {
                    if ($rule === 'Required' && $value === '' && empty($value)) {
                        $this->addError(self::REQUIRED, $key);
                    }
                }
                if ($value != '' && !empty($value)) {
                    if ($rule === 'Email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->addError(self::EMAIL, $key);
                    }
                    if ($rule === 'min' && strlen($value) <= 6) {
                        $this->addError(self::MIN, $key);
                    }
                    if ($rule === 'match' && $value != $data['password']) {
                        $this->addError(self::MATCH, $key);
                    }
                }
            }
        }
        return empty($this->errors);
    }

    private function addError($rule, $item)
    {
        if ($rule === self::REQUIRED) {
            $this->errors[$item] = 'This is field Required';
        }
        if ($rule === self::EMAIL) {
            $this->errors[$item] = 'Email Invalid';
        }

        if ($rule === self::MIN) {
            $this->errors[$item] = 'The field must be 6 characters';
        }
        if ($rule === self::MATCH) {
            $this->errors[$item] = 'Not Match Password';
        }
    }
}
