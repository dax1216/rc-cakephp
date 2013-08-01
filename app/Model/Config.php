<?php
App::uses('AppModel', 'Model');

class Config extends AppModel {
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

    public $name = 'Config';
    
    
    public $validate = array(
        'var' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Config variable is required',
                'allowEmpty' => false                                
			)
        ),
        'value' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Value is required',
                'allowEmpty' => false
			)
        )
        
    );    

}
