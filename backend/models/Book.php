<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cate
 * @property string $slug
 * @property string $image
 * @property string $desc
 * @property string $content
 * @property integer $price
 * @property integer $quantity
 * @property string $author
 * @property integer $pages
 * @property integer $status
 * @property integer $publish_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public $qtt;
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'content', 'pages', 'publish_at', 'created_at', 'updated_at'], 'required'],
            [['cate', 'price', 'quantity', 'pages', 'status', 'publish_at', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['name', 'slug', 'image', 'desc'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 100],
            [['slug'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên sách',
            'cate' => 'Tên danh mục',
            'slug' => 'Đường link tĩnh',
            'image' => 'Ảnh',
            'desc' => 'Mô tả',
            'content' => 'Nội dung',
            'price' => 'Giá',
            'quantity' => 'Số lượng',
            'author' => 'Tác giả',
            'pages' => 'Số trang ',
            'status' => 'Trạng thái',
            'publish_at' => 'Ngày xuất bản',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày update',
        ];
    }
}
