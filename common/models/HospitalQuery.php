<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Hospital]].
 *
 * @see Hospital
 */
class HospitalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Hospital[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Hospital|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}