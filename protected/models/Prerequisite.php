<?php

/**
 * This is the model class for table "prerequisite".
 *
 * The followings are the available columns in table 'prerequisite':
 * @property integer $PrerequisiteID
 * @property string $associatedCourse
 * @property string $prerequisite
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Course $associatedCourse0
 * @property Course $prerequisite0
 */
class Prerequisite extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prerequisite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('associatedCourse, prerequisite', 'required'),
			array('associatedCourse, prerequisite', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PrerequisiteID, associatedCourse, prerequisite', 'safe', 'on'=>'search'),
            array('modified','default',
                'value'=>new CDbExpression('NOW()'),
                'setOnEmpty'=>false,'on'=>'update'),
            array('created,modified','default',
                'value'=>new CDbExpression('NOW()'),
                'setOnEmpty'=>false,'on'=>'insert')
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'associatedCourse0' => array(self::BELONGS_TO, 'Course', 'associatedCourse'),
			'prerequisite0' => array(self::BELONGS_TO, 'Course', 'prerequisite'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PrerequisiteID' => 'Prerequisite',
			'associatedCourse' => 'Associated Course',
			'prerequisite' => 'Prerequisite',
			'created' => 'Created',
			'modified' => 'Modified',
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

		$criteria=new CDbCriteria;

		$criteria->compare('PrerequisiteID',$this->PrerequisiteID);
		$criteria->compare('associatedCourse',$this->associatedCourse,true);
		$criteria->compare('prerequisite',$this->prerequisite,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prerequisite the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
