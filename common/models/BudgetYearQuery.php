<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[BudgetYear]].
 *
 * @see BudgetYear
 */
class BudgetYearQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BudgetYear[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BudgetYear|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}