<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books_authors".
 *
 * @property integer $id
 * @property string $fio
 * @property string $created_at
 */
class BooksAuthors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['created_at'], 'safe'],
            [['fio'], 'string', 'max' => 350]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'created_at' => 'Created At',
        ];
    }

    public static function getAuthorsName($authors = null, $html = false){
        $returnArray = array();
        $returnHtml = '';

        foreach (BooksAuthors::find()->where(((!empty($authors))?('id in ('.($authors).')'):('')))->all() as $data){
            $returnArray[$data->id] = $data->fio;
            $returnHtml .= $data->fio.'<BR>';
        }

        return ((!$html)?($returnArray):($returnHtml));
    }

    public static function getAuthorBooks($author_id, $return_count = true){
        $author_id = (int)$author_id;
        $data = Books::find()->where('authors LIKE "%,'.$author_id.'" OR authors LIKE "%'.$author_id.'," OR authors LIKE "'.$author_id.'"');

        if ($return_count){
            $data = (int)$data->count();
        } else {
            $data = $data->all();
        }

        return $data;
    }



}
