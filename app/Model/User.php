<?php
App::uses('AppModel', 'Model');

App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property UserRole $UserRole
 * @property Image $Image
 */
class User extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';
/**
 * Validation rules
 *
 * @var array
 */

    public $name = 'User';
    
    //public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

    public $validate = array(
        'first_name' => array(
            'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'First Name is required',
			'allowEmpty' => false,
			'required' => false,
			'last' => false, // Stop validation after this rule
			'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
        'last_name' => array(
            'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'Last Name is required',
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
            ),
            'unique' => array(
                        'rule'      => 'isUnique',
                        'message'   => 'Already taken',
            ),
            'identicalFieldValues' => array(
                'rule' => array('identicalFieldValues', 'email_address_confirm' ),
                'message' => 'The email address you entered does not match',
                'on' => 'create'
             ),
        ),
        'email_address_confirm' => array(
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Email Address confirmation is required',
                'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(            
            'empty' => array(
                    'rule'      => 'notEmpty',
                    'message'   => 'Password is required',
                    'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
        'password_confirm' => array(
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Password Confirm is required',
                'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'identicalFieldValues' => array(
                    'rule' => array('identicalFieldValues', 'password_confirm' ),
                    'message' => 'The password you entered does not match',
                 )
        ),
        
    );
    
    function identicalFieldValues($field=array(), $compare_field=null) 
    {
        foreach($field as $key => $value){
            $v1 = $value;
            $v2 = $this->data[$this->name][$compare_field];

            if($v1 !== $v2) {
                return FALSE;
            } else {
                continue;
            }
        }
        return TRUE;
    } 


	public function beforeSave() {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        
        return true;
	}     
    

}
