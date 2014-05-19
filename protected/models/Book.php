<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property integer $id
 * @property string $title
 * @property integer $type_id
 * @property string $publication_date
 * @property double $value
 * @property double $price
 * @property string $notes
 * @property integer $signed
 * @property integer $grade_id
 * @property integer $bagged
 */
class Book extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, type_id, publication_date, value, price, notes, signed, grade_id, bagged', 'required'),
			array('type_id, signed, grade_id, bagged', 'numerical', 'integerOnly'=>true),
			array('value, price', 'numerical'),
			array('title', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, type_id, publication_date, value, price, notes, signed, grade_id, bagged', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'type_id' => 'Type',
			'publication_date' => 'Publication Date',
			'value' => 'Value',
			'price' => 'Price',
			'notes' => 'Notes',
			'signed' => 'Signed',
			'grade_id' => 'Grade',
			'bagged' => 'Bagged',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('publication_date',$this->publication_date,true);
		$criteria->compare('value',$this->value);
		$criteria->compare('price',$this->price);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('signed',$this->signed);
		$criteria->compare('grade_id',$this->grade_id);
		$criteria->compare('bagged',$this->bagged);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}