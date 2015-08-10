<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%kpi_item}}".
 *
 * @property integer $id
 * @property string $the_must
 * @property string $the_base
 * @property integer $group_id
 *
 * @property EvauateScore[] $evauateScores
 */
class KpiItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%kpi_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['the_must', 'the_base'], 'string'],
            [['group_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'the_must' => Yii::t('app', 'The Must'),
            'the_base' => Yii::t('app', 'The Base'),
            'group_id' => Yii::t('app', 'Group ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvauateScores()
    {
        return $this->hasMany(EvauateScore::className(), ['kpi_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return KpiItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KpiItemQuery(get_called_class());
    }
}
