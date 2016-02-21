<?php

class m160217_204302_create_representatives_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('representatives', [
            'id' => 'pk',
            'publisher_id' => 'integer NOT NULL',
            'name' => 'string NOT NULL',
            'email' => 'string NOT NULL',
        ]);

        Yii::import('application.models.Publisher');
        $publishers = Publisher::model()->findAll();
        $representatives = [];
        foreach ($publishers as $publisher) {
            $representatives[] = [
                'publisher_id' => $publisher->id,
                'name' => "Representative {$publisher->id}_1",
                'email' => "rep{$publisher->id}_1@mail.com",
            ];
            $representatives[] = [
                'publisher_id' => $publisher->id,
                'name' => "Representative {$publisher->id}_2",
                'email' => "rep{$publisher->id}_2@mail.com",
            ];
        }
        $this->insertMultiple('representatives', $representatives);
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
