<?php

/**
 * This is the model class for table "transcript".
 *
 * The followings are the available columns in table 'transcript':
 * @property integer $transcriptID
 * @property string $associateStudentID
 * @property integer $associatedSectionID
 * @property string $grade
 * @property string $status
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property User $associateStudent
 * @property Section $associatedSection
 */
class Transcript extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transcript';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('associateStudentID, associatedSectionID, grade, status, created, modified', 'required'),
			array('associatedSectionID', 'numerical', 'integerOnly'=>true),
			array('associateStudentID', 'length', 'max'=>20),
			array('grade', 'length', 'max'=>3),
			array('status', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('transcriptID, associateStudentID, associatedSectionID, grade, status, created, modified', 'safe', 'on'=>'search'),
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
			'associateStudent' => array(self::BELONGS_TO, 'User', 'associateStudentID'),
			'associatedSection' => array(self::BELONGS_TO, 'Section', 'associatedSectionID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'transcriptID' => 'Transcript',
			'associateStudentID' => 'Associate Student',
			'associatedSectionID' => 'Associated Section',
			'grade' => 'Grade',
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

		$criteria->compare('transcriptID',$this->transcriptID);
		$criteria->compare('associateStudentID',$this->associateStudentID,true);
		$criteria->compare('associatedSectionID',$this->associatedSectionID);
		$criteria->compare('grade',$this->grade,true);
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
	 * @return Transcript the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
