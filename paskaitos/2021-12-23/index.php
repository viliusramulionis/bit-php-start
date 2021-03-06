<?php

//Validacija

$fields = [
    'prekes_pavadinimas' => 'text',
    'kaina' => 'int',
    'kiekis' => 'int'
]; //Schema

$post = [
    'prekes_pavadinimas' => 'citrina',
    'kaina' => 10,
    'kiekis' => 2
];


class Validator {

    // const FIELDS = [
    //     'prekes_pavadinimas' => 'text',
    //     'kaina' => 'int',
    //     'kiekis' => 'int'
    // ];

    public $post; //$_POST
    public $fields;

    public function __construct($post, $fields) {

        $this->post   = $post;
        $this->fields = $fields;

        //if($this->check_arg($this->post)) 

        $this->process_fields();
    }

    public function check_arg($arg) {

        // if(!empty($arg)) {
        //     return true;
        // }

        // return false;

        return !empty($arg) ? true : false;
        
    }

    public function test() {

        print_r($this->post);

    }

    public function process_fields() {

        $rezultatas = true;

        foreach($this->fields as $key => $val) {

            if( $this->process_field($key, $this->post) ) {

                //echo $this->post[$key] . '<br />';
                //if kondicijos
                switch($val) {
                    
                    case 'text': 
                        if( !is_string($this->post[$key]) )
                            $rezultatas = false;
                    break;

                    case 'int': 
                        if( !is_integer($this->post[$key]) )
                            $rezultatas = false;
                    break;

                }

                //echo $reiksme;
 
            }

        }

        return $rezultatas;

    }

    public function process_field($field) {
        return array_key_exists($field, $this->post) ? true : false;
    }

}

//new Validator($_POST['prekes'], $fields);
$objektas = new Validator($post, $fields);

if($objektas->process_fields()) {
    echo 'Yra';
}

$objektas->test();

//print_r($objektas);

//MVC 