<?php
App::uses('AppModel', 'Model');


class Role extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'role_id';
/**
 * Validation rules
 *
 * @var array
 */

    public $name = 'Role';

    public $validate = array(
        'name' => array(
            'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'Role Name is required',
			'allowEmpty' => false
			),
        )
    );

    public $hasMany = array(
        'User' => array(
			'className' => 'User',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );

    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        return null;
    }
    
}
