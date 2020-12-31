<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'requiered';
    public const RULE_UNIQUE = 'unique';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_EMAIL = 'email';
    public array $errors = []; // ['form_name'=>[str,str,str]]



    /**
     * loadData
     * @param array $data - values from form
     * Populates the Model with the data from the form
     */
    public function loadData(array $data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * rules
     * Returns a array of rules
     */
    abstract public function rules(): array;


    /**
     * gets the rules for each attribute in the rules array
     * foreach sub rules in rules will validate, if an error 
     * is found then add error to error array
     * retunrs TRUE if errors array is empty.      
     */
    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            $this->errors[$attribute] = [];
            foreach ($rules as $rule) {
                $rule_name = $rule;
                $sub_rule = null;
                if (!is_string($rule_name)) {
                    $rule_name = $rule[0];
                    echo "<br>";
                    var_dump($rule);
                    echo "<br>";
                    // $sub_rule = $rule[1];
                }

                if ($rule_name === self::RULE_REQUIRED && !$value) {
                    // errors
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if ($rule_name === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }

                if ($rule_name === self::RULE_MATCH) {
                    if ($value !== $this->{$rule['match']}) {
                        $this->addError($attribute, self::RULE_MATCH, 'match', $rule['match']);
                    }
                }

                if ($rule_name === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute, self::RULE_MIN, 'min', $rule['min']);
                }

                if ($rule_name === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX, 'max', $rule['max']);
                }
            }
        }
        return empty($this->errors);
    }

    /**
     * Adds the error message to the error array
     */
    public function addError(string $attribute, string $rule, $replace_key = null, $replace_value = null): void
    {
        $message = $this->errorMessages()[$rule] ?? 'Error';
        if ($replace_key && $replace_value) {
            $message = str_replace("{{$replace_key}}", $replace_value, $message);
        }
        array_push($this->errors[$attribute], $message);
    }

    /**
     * error messages 
     */
    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => 'this is required',
            self::RULE_UNIQUE => 'this is already being used',
            self::RULE_MIN => 'minimum length for this field must be {min}',
            self::RULE_MAX => 'maximum lenght for this field must be {max}',
            self::RULE_MATCH => 'this field must be the same as {match}',
            self::RULE_EMAIL => 'must be a real email',
        ];
    }
}
