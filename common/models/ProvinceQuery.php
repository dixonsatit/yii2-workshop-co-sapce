<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Province]].
 *
 * @see Province
 */
class ProvinceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Province[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Province|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}