<?php
App::uses('AppModel', 'Model');

class Contact extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */

/**
 * Validation rules
 *
 * @var array
 */

    public $name = 'Contact';
    
    public $useTable = false;
    
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Name is required',
                'allowEmpty' => false,
                'required' => false,
                'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
        'subject' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Subject is required',
                'allowEmpty' => false,
                'required' => false,
                'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
        'message' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Message is required',
                'allowEmpty' => false,
                'required' => false,
                'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
        'email_address' => array(
            'email_address' => array(
                        'rule'      => 'email',
                        'message'   => 'Must be a valid email address',
                        'allowEmpty' => false
            )            
        ),
    
        
    );    

}
