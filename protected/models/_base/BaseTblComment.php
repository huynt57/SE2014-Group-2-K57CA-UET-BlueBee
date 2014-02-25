<?php

/**
 * This is the model base class for the table "tbl_comment".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TblComment".
 *
 * Columns in table "tbl_comment" available as properties of the model,
 * followed by relations of table "tbl_comment" available as properties of the model.
 *
 * @property integer $comment_id
 * @property integer $comment_post_id
 * @property integer $comment_author
 * @property string $comment_date
 * @property string $comment_content
 * @property integer $user_id
 *
 * @property TblPost $tblPost
 */
abstract class BaseTblComment extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_comment';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'TblComment|TblComments', $n);
	}

	public static function representingColumn() {
		return 'comment_date';
	}

	public function rules() {
		return array(
			array('comment_post_id, comment_author, user_id', 'numerical', 'integerOnly'=>true),
			array('comment_date, comment_content', 'safe'),
			array('comment_post_id, comment_author, comment_date, comment_content, user_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('comment_id, comment_post_id, comment_author, comment_date, comment_content, user_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'tblPost' => array(self::HAS_ONE, 'TblPost', 'post_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'comment_id' => Yii::t('app', 'Comment'),
			'comment_post_id' => Yii::t('app', 'Comment Post'),
			'comment_author' => Yii::t('app', 'Comment Author'),
			'comment_date' => Yii::t('app', 'Comment Date'),
			'comment_content' => Yii::t('app', 'Comment Content'),
			'user_id' => Yii::t('app', 'User'),
			'tblPost' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('comment_id', $this->comment_id);
		$criteria->compare('comment_post_id', $this->comment_post_id);
		$criteria->compare('comment_author', $this->comment_author);
		$criteria->compare('comment_date', $this->comment_date, true);
		$criteria->compare('comment_content', $this->comment_content, true);
		$criteria->compare('user_id', $this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}