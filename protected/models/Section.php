<?php

/**
 * This is the model class for table "section".
 *
 * The followings are the available columns in table 'section':
 * @property integer $sectionID
 * @property string $associatedCourseID
 * @property string $assignedProfessorID
 * @property string $roomNumber
 * @property integer $allowedSectionSize
 * @property string $classType
 * @property string $session
 *
 * The followings are the available model relations:
 * @property Course $associatedCourse
 * @property User $assignedProfessor
 */
class Section extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'section';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sectionID, associatedCourseID, assignedProfessorID, roomNumber, allowedSectionSize, classType, session', 'required'),
			array('sectionID, allowedSectionSize', 'numerical', 'integerOnly'=>true),
			array('associatedCourseID, roomNumber, classType', 'length', 'max'=>45),
			array('assignedProfessorID', 'length', 'max'=>20),
			array('session', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sectionID, associatedCourseID, assignedProfessorID, roomNumber, allowedSectionSize, classType, session', 'safe', 'on'=>'search'),
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
			'associatedCourse' => array(self::BELONGS_TO, 'Course', 'associatedCourseID'),
			'assignedProfessor' => array(self::BELONGS_TO, 'User', 'assignedProfessorID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sectionID' => 'Section',
			'associatedCourseID' => 'Associated Course',
			'assignedProfessorID' => 'Assigned Professor',
			'roomNumber' => 'Room Number',
			'allowedSectionSize' => 'Allowed Section Size',
			'classType' => 'Class Type',
			'session' => 'Session',
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

		$criteria->compare('sectionID',$this->sectionID);
		$criteria->compare('associatedCourseID',$this->associatedCourseID,true);
		$criteria->compare('assignedProfessorID',$this->assignedProfessorID,true);
		$criteria->compare('roomNumber',$this->roomNumber,true);
		$criteria->compare('allowedSectionSize',$this->allowedSectionSize);
		$criteria->compare('classType',$this->classType,true);
		$criteria->compare('session',$this->session,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Section the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
