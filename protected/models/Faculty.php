<?php

/**
 * This is the model class for table "tbl_faculty".
 *
 * The followings are the available columns in table 'tbl_faculty':
 * @property integer $faculty_id
 * @property string $faculty_name
 * @property integer $subject_id
 * @property integer $teacher_id
 *
 * The followings are the available model relations:
 * @property Doc[] $docs
 * @property Teacher $teacher
 * @property Subject $subject
 * @property Subject[] $subjects
 * @property Teacher[] $teachers
 */
class Faculty extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_faculty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_id, teacher_id', 'numerical', 'integerOnly'=>true),
			array('faculty_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('faculty_id, faculty_name, subject_id, teacher_id', 'safe', 'on'=>'search'),
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
			'docs' => array(self::HAS_MANY, 'Doc', 'doc_faculty_id'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
			'subjects' => array(self::HAS_MANY, 'Subject', 'faculty_id'),
			'teachers' => array(self::HAS_MANY, 'Teacher', 'teacher_faculty'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'faculty_id' => 'Faculty',
			'faculty_name' => 'Faculty Name',
			'subject_id' => 'Subject',
			'teacher_id' => 'Teacher',
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

		$criteria->compare('faculty_id',$this->faculty_id);
		$criteria->compare('faculty_name',$this->faculty_name,true);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('teacher_id',$this->teacher_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Faculty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
