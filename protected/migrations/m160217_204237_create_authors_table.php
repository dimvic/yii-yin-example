<?php

class m160217_204237_create_authors_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('authors', [
            'id' => 'pk',
            'name' => 'string NOT NULL',
        ]);

        $authors = [];
        for ($i=0 ; $i<10 ; $i++) {
            $authors[] = [
                'name' => "Author {$i}_1",
            ];
        }
        $this->insertMultiple('authors', $authors);
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
