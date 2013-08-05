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


}
