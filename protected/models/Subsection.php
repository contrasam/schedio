<?php

/**
 * This is the model class for table "subsection".
 *
 * The followings are the available columns in table 'subsection':
 * @property integer $SubsectionID
 * @property integer $associatedSectionID
 * @property string $sectionCode
 * @property string $classType
 * @property integer $roomNumber
 * @property string $buildingCode
 * @property integer $sectionSize
 * @property integer $currentSectionSize
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Enrollment[] $enrollments
 * @property Sectiontime[] $sectiontimes
 * @property Section $associatedSection
 */
class Subsection extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subsection';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('associatedSectionID, sectionCode, classType, roomNumber, buildingCode, sectionSize', 'required'),
			array('associatedSectionID, roomNumber, sectionSize, currentSectionSize', 'numerical', 'integerOnly'=>true),
			array('sectionCode, classType, buildingCode', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SubsectionID, associatedSectionID, sectionCode, classType, roomNumber, buildingCode, sectionSize, currentSectionSize', 'safe', 'on'=>'search'),
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
			'enrollments' => array(self::HAS_MANY, 'Enrollment', 'associateSubSectionID'),
			'sectiontimes' => array(self::HAS_MANY, 'Sectiontime', 'associatedSubSection'),
			'associatedSection' => array(self::BELONGS_TO, 'Section', 'associatedSectionID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SubsectionID' => 'Subsection',
			'associatedSectionID' => 'Associated Section',
			'sectionCode' => 'Section Code',
			'classType' => 'Class Type',
			'roomNumber' => 'Room Number',
			'buildingCode' => 'Building Code',
			'sectionSize' => 'Section Size',
			'currentSectionSize' => 'Current Section Size',
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

		$criteria->compare('SubsectionID',$this->SubsectionID);
		$criteria->compare('associatedSectionID',$this->associatedSectionID);
		$criteria->compare('sectionCode',$this->sectionCode,true);
		$criteria->compare('classType',$this->classType,true);
		$criteria->compare('roomNumber',$this->roomNumber);
		$criteria->compare('buildingCode',$this->buildingCode,true);
		$criteria->compare('sectionSize',$this->sectionSize);
		$criteria->compare('currentSectionSize',$this->currentSectionSize);
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
	 * @return Subsection the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
