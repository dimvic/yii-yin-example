<?php

class m160217_204227_create_book_i18ns_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('book_i18ns', [
            'id' => 'pk',
            'book_id' => 'int NOT NULL',
            'language' => 'string NOT NULL',
            'title' => 'string NOT NULL',
        ]);

        Yii::import('application.models.Book');
        $books = Book::model()->findAll();
        $i18ns = [];
        foreach ($books as $book) {
            foreach (['en', 'el'] as $language) {
                $i18ns[] = [
                    'book_id' => $book->id,
                    'language' => $language,
                    'title' => "{$book->title} {$language}"
                ];
            }
        }
        $this->insertMultiple('book_i18ns', $i18ns);
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
