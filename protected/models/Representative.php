<?php

/**
 * This is the model class for table "representatives".
 *
 * The followings are the available columns in table 'representatives':
 * @property integer $id
 * @property integer $publisher_id
 * @property string $name
 * @property string $email
 *
 * @property Publisher $publisher
 */
class Representative extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'representatives';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return [
			['publisher_id, name, email', 'required'],
			['name, email', 'length', 'max'=>255],
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			['id, publisher_id, name, email', 'safe', 'on'=>'search'],
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
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'publisher_id' => 'Publisher ID',
			'name' => 'Name',
			'email' => 'Email',
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
		$criteria->compare("{$this->tableAlias}.publisher_id",$this->publisher_id);
		$criteria->compare("{$this->tableAlias}.name",$this->name,true);
		$criteria->compare("{$this->tableAlias}.email",$this->email,true);

		return new CActiveDataProvider($this, [
			'criteria'=>$criteria,
		]);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Representative the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
