<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property string $id
 * @property string $book_category_id
 * @property string $name
 * @property string $annotation
 * @property integer $views
 * @property string $year
 * @property string $authors
 * @property string $created_at
 *
 * @property BookCategory $bookCategory
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_category_id', 'name', 'year'], 'required'],
            [['book_category_id', 'views'], 'integer'],
            [['year', 'created_at', 'authors'], 'safe'],
            [['name', 'annotation'], 'string', 'max' => 120],
            //[['authors'], 'string', 'max' => 350]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_category_id' => 'Категория',
            'name' => 'Название',
            'annotation' => 'Аннотация',
            'views' => 'Просмотров',
            'year' => 'Год издания',
            'authors' => 'Автор(ы)',
            'created_at' => 'Created At',
            'count_books_author' => 'Количество книг',
            'list_books_author' => 'Список книг',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!empty($this->authors) && is_array($this->authors)){
                $this->authors = implode(",", $this->authors);
            }
            return true;
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookCategory()
    {
        return $this->hasOne(BookCategory::className(), ['id' => 'book_category_id']);
    }

    public static function getCategorys($id = null){
        $category = array();
        foreach ( BookCategory::find()->all() as $data ){
            $category[$data->id] = $data->name;
        }
        return ((empty($id))?($category):($category[$id]));
    }

    public static function getAuthors($id = null){
        $authors = array();
        foreach ( BooksAuthors::find()->all() as $data ){
            $authors[$data->id] = $data->fio;
        }
        return ((empty($id))?($authors):($authors[$id]));
    }
}
