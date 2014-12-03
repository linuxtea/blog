<?php
namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%item_tag}}".
 *
 * @property integer $id
 * @property integer $itemid
 * @property integer $tagid
 * @property string $etype
 */
class ItemTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%item_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'tagid'], 'required'],
            [['itemid', 'tagid'], 'integer'],
            [['etype'], 'string']
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
            'tagid' => 'Tagid',
            'etype' => 'Etype',
        ];
    }
}