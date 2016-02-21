<?php

/**
 * This is the model class for table "books".
 *
 * The followings are the available columns in table 'books':
 * @property integer $id
 * @property string $title
 * @property integer $pages
 *
 * @property Author[] $authors
 * @property Publisher $publisher
 * @property BookI18n[] $book_i18ns
 */
class Book extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'books';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return [
			['title', 'required'],
			['pages', 'numerical', 'integerOnly'=>true],
			['title', 'length', 'max'=>255],
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			['id, title, pages', 'safe', 'on'=>'search'],
		];
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return [
            'publisher' => [self::BELONGS_TO, 'Publisher', 'publisher_id'],
            'book_authors' => [self::HAS_MANY, 'BookAuthor', 'book_id'],
            'authors' => [self::HAS_MANY, 'Author', 'author_id', 'through'=>'book_authors'],
            'book_i18ns' => [self::HAS_MANY, 'BookI18n', 'book_id'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Title',
			'pages' => 'Pages',
		];
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

		$criteria->compare("{$this->tableAlias}.id",$this->id);
		$criteria->compare("{$this->tableAlias}.",$this->title,true);
		$criteria->compare("{$this->tableAlias}.",$this->pages);

		return new CActiveDataProvider($this, [
			'criteria'=>$criteria,
		]);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
