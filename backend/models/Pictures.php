<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pictures}}".
 *
 * @property integer $id
 * @property integer $itemid
 * @property integer $userid
 * @property string $thumb
 * @property string $middle
 * @property string $big
 * @property string $etype
 * @property integer $addtime
 */
class Pictures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pictures}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'userid'], 'required'],
            [['itemid', 'userid', 'addtime'], 'integer'],
            [['thumb', 'middle', 'big','original'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'itemid' => 'Itemid',
            'userid' => 'Userid',
            'thumb' => 'Thumb',
            'middle' => 'Middle',
			'original'=>'original',
            'big' => 'Big',
            'etype' => 'Etype',
            'addtime' => 'Addtime',
        ];
    }
}
