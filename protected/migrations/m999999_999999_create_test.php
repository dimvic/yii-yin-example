<?php

class m999999_999999_create_test extends CDbMigration
{
    public function up()
    {
        return true;
        Yii::import('application.models.Publisher');
        Yii::import('application.models.Book');
        Yii::import('application.models.BookI18n');
        Yii::import('application.models.Author');
        Yii::import('application.models.BookAuthor');
        Yii::import('application.models.Representative');
        $books = Book::model()->findAll([
            'with'=>[
                'publisher'=>[
                    'with'=>[
                        'representatives',
                    ],
                ],
                'authors',
                'book_i18ns'
            ],
            'together'=>true,
        ]);

        foreach ($books as $book) {
            $attributes = $book->attributes;
            $attributes['publisher'] = $book->publisher->attributes;
            $attributes['publisher']['representatives'] = [];
            foreach ($book->publisher->representatives as $representative) {
                $attributes['publisher']['representatives'][] = $representative->attributes;
            }
            $attributes['authors'] = [];
            foreach ($book->authors as $author) {
                $attributes['authors'][] = $author->attributes;
            }
            $attributes['book_i18ns'] = [];
            foreach ($book->book_i18ns as $i18n) {
                $attributes['book_i18ns'][] = $i18n->attributes;
            }
            print_r($attributes);
        }
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
