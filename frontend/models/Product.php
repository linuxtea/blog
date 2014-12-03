<?php
namespace frontend\models;
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
class Product extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }
	
	public function getDetail($id){
		$sql = "select * from ".self::tableName()." where id=".$id;
		$connection=Yii::$app->db;
		$command = $connection->createCommand($sql);
		$row = $command->queryOne(); 
		return $row;		
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['content','addtime','title','userid'], 'required'],
            [['content'], 'string'],
            [['addtime','userid'], 'integer'],
            [['title'], 'string', 'max' => 255]
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
