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
    
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public $virtualFields = array('name' => 'CONCAT(User.first_name, " ", User.last_name)');

    public $validate = array(
        'first_name' => array(
            'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'First Name is required',
			'allowEmpty' => false,			
			),
        ),
        'last_name' => array(
            'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'Last Name is required',
			'allowEmpty' => false,			
			)
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
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'identicalFieldValues' => array(
                    'rule' => array('identicalFieldValues', 'password' ),
                    'message' => 'The password you entered does not match',
                    //'on' => 'create'
                 )
        ),
        
    );

    public $belongsTo = array(
        'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
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
    

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['role_id'])) {
            $role_id = $this->data['User']['role_id'];
        } else {
            $role_id = $this->field('role_id');
        }
        if (!$role_id) {
            return null;
        } else {
            return array('Role' => array('role_id' => $role_id));
        }
    }

    public function bindNode($user) {
        return array('model' => 'Role', 'foreign_key' => $user['User']['role_id']);
    }
}
