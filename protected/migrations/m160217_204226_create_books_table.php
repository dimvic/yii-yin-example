<?php

class m160217_204226_create_books_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('books', [
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'pages' => 'int',
            'publisher_id' => 'int',
        ]);

        Yii::import('application.models.Publisher');
        $publishers = Publisher::model()->findAll();
        $books = [];
        for ($i=1 ; $i<5 ; $i++) {
            $books[] = [
                'title' => "Book {$i}",
                'pages' => $i*100,
                'publisher_id' => $publishers[rand(0,count($publishers)-1)]->id,
            ];
        }
        $this->insertMultiple('books', $books);
	}

	public function down()
	{
        echo __CLASS__." does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
