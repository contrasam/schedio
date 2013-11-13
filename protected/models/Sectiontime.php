<?php

/**
 * This is the model class for table "sectiontime".
 *
 * The followings are the available columns in table 'sectiontime':
 * @property integer $SectionTimeID
 * @property integer $associatedSubSection
 * @property string $day
 * @property string $fromTime
 * @property string $toTime
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Subsection $associatedSubSection0
 */
class Sectiontime extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sectiontime';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('associatedSubSection, day, fromTime, toTime', 'required'),
			array('associatedSubSection', 'numerical', 'integerOnly'=>true),
			array('day', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SectionTimeID, associatedSubSection, day, fromTime, toTime', 'safe', 'on'=>'search'),
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
			'associatedSubSection0' => array(self::BELONGS_TO, 'Subsection', 'associatedSubSection'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SectionTimeID' => 'Section Time',
			'associatedSubSection' => 'Associated Sub Section',
			'day' => 'Day',
			'fromTime' => 'From Time',
			'toTime' => 'To Time',
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

		$criteria->compare('SectionTimeID',$this->SectionTimeID);
		$criteria->compare('associatedSubSection',$this->associatedSubSection);
		$criteria->compare('day',$this->day,true);
		$criteria->compare('fromTime',$this->fromTime,true);
		$criteria->compare('toTime',$this->toTime,true);
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
	 * @return Sectiontime the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
