<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property string $courseID
 * @property string $courseName
 * @property string $courseDescription
 * @property integer $credits
 * @property string $prerequisiteCourse
 *
 * The followings are the available model relations:
 * @property Course $prerequisiteCourse0
 * @property Course[] $courses
 */
class Course extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseID, courseName, courseDescription, credits', 'required'),
			array('credits', 'numerical', 'integerOnly'=>true),
			array('courseID, courseName, prerequisiteCourse', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('courseID, courseName, courseDescription, credits, prerequisiteCourse', 'safe', 'on'=>'search'),
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
			'prerequisiteCourse0' => array(self::BELONGS_TO, 'Course', 'prerequisiteCourse'),
			'courses' => array(self::HAS_MANY, 'Course', 'prerequisiteCourse'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'courseID' => 'Course',
			'courseName' => 'Course Name',
			'courseDescription' => 'Course Description',
			'credits' => 'Credits',
			'prerequisiteCourse' => 'Prerequisite Course',
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

		$criteria->compare('courseID',$this->courseID,true);
		$criteria->compare('courseName',$this->courseName,true);
		$criteria->compare('courseDescription',$this->courseDescription,true);
		$criteria->compare('credits',$this->credits);
		$criteria->compare('prerequisiteCourse',$this->prerequisiteCourse,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Course the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
