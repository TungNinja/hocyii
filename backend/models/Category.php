<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Category".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $parent
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    private $_cats = [];

    public static function tableName()
    {
        return 'Category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'created_at', 'updated_at'], 'required'],
            [['parent', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên danh mục',
            'slug' => 'Đường dẫn tĩnh',
            'parent' => 'Danh mục cha',
            'status' => 'Trang thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }

    public function getParent($parent = 0, $leval=''){

        $data = Category::find()->where(['parent'=>$parent])->all();
        $leval .='- ';
        if ($data) :
            foreach ($data as $item):
                
                if ($item->parent == 0) {
                    $leval = '';
                }
                $this->_cats[$item->id] = $leval.$item->name;
               
                $this->getParent($item->id,$leval);

            endforeach;
        endif;

        return $this->_cats;

    }
}
