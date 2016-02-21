<?php

class m160217_204238_create_book_authors_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('book_authors', [
            'id' => 'pk',
            'book_id' => 'integer NOT NULL',
            'author_id' => 'integer NOT NULL',
        ]);

        Yii::import('application.models.Book');
        $books = Book::model()->findAll();
        Yii::import('application.models.Author');
        $authors = Author::model()->findAll();
        $book_authors = [];
        foreach ($books as $book) {
            for ($i=0 ; $i<2 ; $i++) {
                $book_authors[] = [
                    'book_id' => $book->id,
                    'author_id' => $authors[rand(0,count($authors)-1)]->id,
                ];
            }
        }
        $this->insertMultiple('book_authors', $book_authors);
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
