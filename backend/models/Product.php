<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $userid
 * @property integer $addtime
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['content','addtime','title','userid'], 'required'],
            [['content'], 'string'],
            [['addtime'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['userid'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'userid' => '用户id',
            'addtime' => '添加时间',
        ];
    }
}
