<?php
App::uses('AppModel', 'Model');
class Records extends AppModel {
    public $name = 'Records';
    public $validate = array(
        'first_name' => array(
            'first_name_rule1' => array(
                'rule' => 'alphaNumeric',
                'required' => false,
                'allowEmpty' => false,
                'message' => 'Alpha Numeric Only',
                'last' => false,
                //'on' => 'create'
            ),
            'first_name_rule2' => array(
                'rule' => array('lengthBetween', 5, 25),
                'message' => 'Between 5 to 25 Characters Onlyx',
                //'on' => 'create'
            )
        ),
        'last_name' => array(
            'last_name_rule1' => array(
                'rule' => 'alphaNumeric',
                'required' => false,
                'allowEmpty' => false,
                'message' => 'Alpha Numeric Only',
                'last' => false,
                //'on' => 'create'
            ),
            'last_name_rule2' => array(
                'rule' => array('customValidation', 'xx'),
                //'on' => 'create'
            )
        )
    );
    
    public function customValidation($check, $secondfield) {
        //print_r($check); die();
        return true;
    }
}
