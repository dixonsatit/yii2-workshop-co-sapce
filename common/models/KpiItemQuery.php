<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[KpiItem]].
 *
 * @see KpiItem
 */
class KpiItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return KpiItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KpiItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}