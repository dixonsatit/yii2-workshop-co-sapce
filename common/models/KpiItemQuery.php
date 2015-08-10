<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[KpiItem]].
 *
 * @see KpiItem
 */
class KpiItemQuery extends \yii\db\ActiveQuery
{
    public function byGroup($group_id)
    {
        $this->joinWith('group')->andWhere('group.parent_id=:parent_id',[':parent_id'=>$group_id]);
        return $this;
    }

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
