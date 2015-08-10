<?php

namespace common\models;
use Yii;
/**
 * This is the ActiveQuery class for [[EvauateScore]].
 *
 * @see EvauateScore
 */
class EvauateScoreQuery extends \yii\db\ActiveQuery
{
    public function byUser()
    {
        $this->andWhere('user_id=:user_id',[':user_id'=>Yii::$app->user->id]);
        return $this;
    }

    public function byHospital($hospital_id)
    {
        $this->andWhere('hospital_id=:hospital_id',[':hospital_id' => $hospital_id]);
        return $this;
    }

    public function byYear($year)
    {
        $this->andWhere('year=:year',[':year' => $year]);
        return $this;
    }

    public function byLevel($level)
    {
        $this->andWhere('level=:level',[':level' => $level]);
        return $this;
    }

    public function byGroup($group_id){
      $this->innerJoinWith([
          'kpi'=>function($q) use ($group_id){
               $q->byGroup($group_id);
          }
      ]);
      return $this;
    }

    public function sumByValue($value){
      $this->andWhere('value=:value',['value'=>$value]);
      return $this;
    }



    /**
     * @inheritdoc
     * @return EvauateScore[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EvauateScore|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
