<?php

namespace common\models;

use Yii;
/**
 * This is the ActiveQuery class for [[HospitalAssignment]].
 *
 * @see HospitalAssignment
 */
class HospitalAssignmentQuery extends \yii\db\ActiveQuery
{
    public function byUser()
    {
        $this->andWhere('user_id=:user_id',[':user_id'=>Yii::$app->user->id]);
        return $this;
    }

    public function byHospitalProvince(){
      $this->joinWith([
        'hospital'=>function($q){
            $q->joinWith('province');
          }
       ]);
       return $this;
    }

    /**
     * @inheritdoc
     * @return HospitalAssignment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HospitalAssignment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
