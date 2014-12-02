<?php
namespace frontend\models;
use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $des
 * @property integer $addtime
 */
class Tag extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

	public function opTag($str,$itemid,$etype){
		$connection=Yii::$app->db;
		$sql = "delete from lt_item_tag where itemid=$itemid and etype='".$etype."'";
		$command=$connection->createCommand($sql);
		$command->execute();
		$stags = str_replace(array("，",","," "),array("",""," "),$str);
		$exptmp = explode(" ",$stags);
		$exp = array_unique($exptmp);
		$time = time();
		foreach ($exp as $item) {
			if (empty($item)) {
				continue;	
			}
			$name = trim($item);	
			$sql = "select * from lt_tag where name='".$name."'";
			$command = $connection->createCommand($sql);
			$rows = $command->queryOne();
			if (empty($rows)){
				$sql = "insert into lt_tag(name,addtime) values('{$title}',{$time})";
				$command=$connection->createCommand($sql);
				$command->execute();
				$tagid = $connection->getLastInsertID();	
			} else {
				$tagid = $rows['id'];
			}
			$sql = "insert into lt_item_tag(itemid,tagid,etype) values($itemid,$tagid,$etype)";
			$command=$connection->createCommand($sql);
			$command->execute();
		}
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addtime'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['des'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'des' => 'Des',
            'addtime' => 'Addtime',
        ];
    }
}
