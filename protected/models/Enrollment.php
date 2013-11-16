<?php

/**
 * This is the model class for table "enrollment".
 *
 * The followings are the available columns in table 'enrollment':
 * @property integer $EnrollmentID
 * @property string $associatedStudentID
 * @property integer $associatedSubSectionID
 * @property string $associatedCourseID
 * @property string $status
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property User $associatedStudent
 * @property Subsection $associatedSubSection
 * @property Course $associatedCourse
 */
class Enrollment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'enrollment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('associatedStudentID, associatedSubSectionID, associatedCourseID, status', 'required'),
			array('associatedSubSectionID', 'numerical', 'integerOnly'=>true),
			array('associatedStudentID', 'length', 'max'=>20),
			array('associatedCourseID, status', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('EnrollmentID, associatedStudentID, associatedSubSectionID, associatedCourseID, status', 'safe', 'on'=>'search'),
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
			'associatedStudent' => array(self::BELONGS_TO, 'User', 'associatedStudentID'),
			'associatedSubSection' => array(self::BELONGS_TO, 'Subsection', 'associatedSubSectionID'),
			'associatedCourse' => array(self::BELONGS_TO, 'Course', 'associatedCourseID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EnrollmentID' => 'Enrollment',
			'associatedStudentID' => 'Associated Student',
			'associatedSubSectionID' => 'Associated Sub Section',
			'associatedCourseID' => 'Associated Course',
			'status' => 'Status',
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

		$criteria->compare('EnrollmentID',$this->EnrollmentID);
		$criteria->compare('associatedStudentID',$this->associatedStudentID,true);
		$criteria->compare('associatedSubSectionID',$this->associatedSubSectionID);
		$criteria->compare('associatedCourseID',$this->associatedCourseID,true);
		$criteria->compare('status',$this->status,true);
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
	 * @return Enrollment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
