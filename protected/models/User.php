<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $userID
 * @property integer $userStatus
 * @property string $roleID
 * @property string $deptID
 * @property string $netName
 * @property string $password
 * @property string $firstName
 * @property string $lastName
 * @property string $emailAddress
 * @property string $lastLogin
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Enrollment[] $enrollments
 * @property Messaging[] $messagings
 * @property Messaging[] $messagings1
 * @property Section[] $sections
 * @property Transcript[] $transcripts
 * @property Userstatus $userStatus0
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userID, userStatus, roleID, deptID, netName, password, firstName, lastName, emailAddress, created, modified', 'required'),
			array('userStatus', 'numerical', 'integerOnly'=>true),
			array('userID', 'length', 'max'=>20),
			array('roleID', 'length', 'max'=>9),
			array('deptID', 'length', 'max'=>5),
			array('netName, password, firstName, lastName, emailAddress', 'length', 'max'=>45),
			array('lastLogin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userID, userStatus, roleID, deptID, netName, password, firstName, lastName, emailAddress, lastLogin, created, modified', 'safe', 'on'=>'search'),
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
			'enrollments' => array(self::HAS_MANY, 'Enrollment', 'associatedStudentID'),
			'messagings' => array(self::HAS_MANY, 'Messaging', 'fromID'),
			'messagings1' => array(self::HAS_MANY, 'Messaging', 'toID'),
			'sections' => array(self::HAS_MANY, 'Section', 'assignedProfessorID'),
			'transcripts' => array(self::HAS_MANY, 'Transcript', 'associateStudentID'),
			'userStatus0' => array(self::BELONGS_TO, 'Userstatus', 'userStatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userID' => 'User',
			'userStatus' => 'User Status',
			'roleID' => 'Role',
			'deptID' => 'Dept',
			'netName' => 'Net Name',
			'password' => 'Password',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'emailAddress' => 'Email Address',
			'lastLogin' => 'Last Login',
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

		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('userStatus',$this->userStatus);
		$criteria->compare('roleID',$this->roleID,true);
		$criteria->compare('deptID',$this->deptID,true);
		$criteria->compare('netName',$this->netName,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('emailAddress',$this->emailAddress,true);
		$criteria->compare('lastLogin',$this->lastLogin,true);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
