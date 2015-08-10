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
