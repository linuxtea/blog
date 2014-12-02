<?php
namespace frontend\models;
use Yii;
class BaseModel extends \yii\db\ActiveRecord
{
	public function getRows($whererows=array(),$orderby='',$limit = '',$table,$select="*"){
		$where = " where 1";
		foreach ($whererows as $k=>$v) {
			$where .= " and $k='".$v."' ";
		}
		$sql = "select {$select} from $table {$where} {$orderby} {$limit}";
		$connection=Yii::$app->db;
		$command = $connection->createCommand($sql);
		$rows = $command->queryAll(); 
		return $rows;	
	}
	
	public function getRow($whererows=array(),$table,$select="*"){
		$where = " where 1";
		foreach ($whererows as $k=>$v) {
			$where .= " and $k='".$v."' ";
		}
		$sql = "select {$select} from $table {$where}";
		$connection=Yii::$app->db;
		$command = $connection->createCommand($sql);
		$row = $command->queryRow(); 
		return $row;	
	}	
	
	public function customInsert($post,$table){
		$keysArr = array_keys($post);
		$keysStr = "`".implode("`,`",$keysArr)."`";
		$valsStr = "'".implode("','",$post)."'";
		$sql="insert into $table($keysStr) values($valsStr)";
		$connection=Yii::$app->db;
		$command = $connection->createCommand($sql);
		$command->execute();
		$id = $connection->getLastInsertID();
		return $id;	
	}
	
	public function customUpdate($post,$whererows,$table){
		$where = " where 1";
		foreach ($whererows as $k=>$v) {
			$where .= " and $k='".$v."' ";
		}
		$setTmp = array();
		foreach($post as $k=>$v){
			$setTmp[] = "$k='".$v."'";
		}
		$set = implode(",",$setTmp);
		$sql="update $table set ".$set.$where;
		$connection=Yii::$app->db;
		$command = $connection->createCommand($sql);
		$command->execute();
	}



}
