<?php

class m160217_204225_create_publishers_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('publishers', [
            'id' => 'pk',
            'name' => 'string NOT NULL',
        ]);

        $publishers = [];
        for ($i=1 ; $i<5 ; $i++) {
            $publishers[] = [
                'name' => "Publisher {$i}",
            ];
        }
        $this->insertMultiple('publishers', $publishers);
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
