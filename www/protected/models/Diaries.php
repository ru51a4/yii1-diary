<?php

/**
 * This is the model class for table "diaries".
 *
 * The followings are the available columns in table 'diaries':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $user_id
 */
class Diaries extends CActiveRecord
{

	public function behaviors()
	{
		return array(
			'userCard' => array(
				'class' => "ext.behaviors.userCardBehavior"
			),
		);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'diaries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'numerical', 'integerOnly' => true),
			array('name, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, user_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return [
			'posts' => [self::HAS_MANY, 'Posts', ["diary_id" => "id"]],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('user_id', $this->user_id);

		return new CActiveDataProvider(
			$this,
			array(
				'criteria' => $criteria,
			)
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Diaries the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}