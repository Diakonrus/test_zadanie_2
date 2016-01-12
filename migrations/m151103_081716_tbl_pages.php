<?php

use yii\db\Schema;
use yii\db\Migration;

class m151103_081716_tbl_pages extends Migration
{


    public function up()
    {

        $this->createTable('book_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(120)->notNull(),
            'created_at' => Schema::TYPE_TIMESTAMP,
        ]);

        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'book_category_id' => $this->integer(),
            'name' => $this->string(120)->notNull(),
            'annotation' => $this->string(120),
            'views' => 'int(10) NOT NULL DEFAULT 0',
            'year' => 'YEAR NOT NULL',
            'authors' => $this->string(350),
            'created_at' => Schema::TYPE_TIMESTAMP,
        ]);

        $this->createTable('books_authors', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(350),
            'created_at' => Schema::TYPE_TIMESTAMP,
        ]);
        

    }

    public function down()
    {
        echo "m151103_081716_tbl_pages cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
