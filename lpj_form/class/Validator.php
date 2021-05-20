<!-- Code inspiré de https://www.youtube.com/watch?v=Dw9R0NEXuYo -->
<?php

class Validator {

    private $datas = [];
    private $errors = [];

    public function __construct($datas){
        $this->datas = $datas ;
    }

    public function check($name, $rule){
        $validator = "validate_$rule";
        if(!$this->$validator($name)){
            $this->errors[$name] = "Le champs $name n'a pas été rempli correctement";
        }
    }
    public function validate_required($name){
        return array_key_exists($name, $this->datas) && $this->datas[$name] !='';
    }
    public function validate_email($name){
        return array_key_exists($name, $this->datas) && filter_var($this->datas[$name], FILTER_VALIDATE_EMAIL);
    }
    public function errors(){
        return $this->errors;
    }
}
?>