<!-- Code inspiré de https://www.youtube.com/watch?v=Dw9R0NEXuYo -->
<?php
class Form {

    private $datas = [];

    public function __construct($datas = []){
        $this->datas = $datas;
    }

    private function getValue($name){
        if(isset($this->datas[$name])){
            return $this->datas[$name];
        }else{
            return '';
        }
    }

    private function input($type, $name, $label){
        $value = $this->getValue($name);
        if($type == 'textarea'){
            $input = "<textarea required name=\"$name\" class=\"form-control\" id=\"input$name\">$value</textarea>";
        }else{
            $input = "<input required type=\"$type\" name=\"$name\" class=\"form-control\" id=\"input$name\" value=\"$value\">";
        }
        return "<div class=\"form-group\">
            <label for=\"input$name\">$label</label>
            $input
        </div>";
    }

    public function text($name, $label){
        return $this->input('text', $name, $label);
    }

    public function email($name,$label){
        return $this->input('email', $name, $label);
        }

    public function textarea($name,$label){
        return $this->input('textarea', $name, $label);
        }

    public function submit($label){
        return '<button type="submit" class="btn btn-primary">' .$label. '</button>';
        }
}