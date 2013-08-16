<?php
App::uses('BlogAppModel', 'Model');

/**
 * Blog Model
 *
 * @property UserRole $UserRole
 * @property Image $Image
 */
class Blog extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'blog_id';
/**
 * Validation rules
 *
 * @var array
 */

    public $name = 'Blog';


    public $validate = array(
        'title' => array(
            'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'Title is required',
			'allowEmpty' => false,
			),
        ),
        'content' => array(
            'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'Content is required',
			'allowEmpty' => false,
			)
        )

    );

}
