<?php

/**
 * This is the model class for table "tbl_teacher".
 *
 * The followings are the available columns in table 'tbl_teacher':
 * @property integer $teacher_id
 * @property string $teacher_name
 * @property integer $teacher_faculty
 * @property string $teacher_subject
 * @property string $teacher_profile
 * @property integer $teacher_rate
 * @property string $teacher_url
 * @property string $teacher_comment
 *
 * The followings are the available model relations:
 * @property Faculty[] $faculties
 * @property Subject[] $subjects
 * @property Faculty $teacherFaculty
 */
class Teacher extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teacher_faculty, teacher_rate', 'numerical', 'integerOnly'=>true),
			array('teacher_name, teacher_subject, teacher_url', 'length', 'max'=>100),
			array('teacher_profile, teacher_comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('teacher_id, teacher_name, teacher_faculty, teacher_subject, teacher_profile, teacher_rate, teacher_url, teacher_comment', 'safe', 'on'=>'search'),
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
			'faculties' => array(self::HAS_MANY, 'Faculty', 'teacher_id'),
			'subjects' => array(self::HAS_MANY, 'Subject', 'teacher_id'),
			'teacherFaculty' => array(self::BELONGS_TO, 'Faculty', 'teacher_faculty'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'teacher_id' => 'Teacher',
			'teacher_name' => 'Teacher Name',
			'teacher_faculty' => 'Teacher Faculty',
			'teacher_subject' => 'Teacher Subject',
			'teacher_profile' => 'Teacher Profile',
			'teacher_rate' => 'Teacher Rate',
			'teacher_url' => 'Teacher Url',
			'teacher_comment' => 'Teacher Comment',
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

		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('teacher_name',$this->teacher_name,true);
		$criteria->compare('teacher_faculty',$this->teacher_faculty);
		$criteria->compare('teacher_subject',$this->teacher_subject,true);
		$criteria->compare('teacher_profile',$this->teacher_profile,true);
		$criteria->compare('teacher_rate',$this->teacher_rate);
		$criteria->compare('teacher_url',$this->teacher_url,true);
		$criteria->compare('teacher_comment',$this->teacher_comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teacher the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
