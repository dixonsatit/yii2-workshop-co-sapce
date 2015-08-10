<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%evauate_score}}".
 *
 * @property integer $id
 * @property integer $kpi_id
 * @property integer $user_id
 * @property integer $value
 * @property string $year
 * @property integer $level
 * @property string $hospitall_code
 *
 * @property KpiItem $kpi
 * @property User $user
 */
class EvauateScore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%evauate_score}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id', 'user_id', 'value', 'level'], 'integer'],
            [['year'], 'string', 'max' => 4],
            [['hospitall_code'], 'string', 'max' => 6],
            [['kpi_id', 'user_id', 'year', 'level', 'hospitall_code'], 'unique', 'targetAttribute' => ['kpi_id', 'user_id', 'year', 'level', 'hospitall_code'], 'message' => 'The combination of Kpi ID, User ID, Year, Level and Hospitall Code has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kpi_id' => Yii::t('app', 'Kpi ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'value' => Yii::t('app', 'Value'),
            'year' => Yii::t('app', 'Year'),
            'level' => Yii::t('app', 'Level'),
            'hospitall_code' => Yii::t('app', 'Hospitall Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKpi()
    {
        return $this->hasOne(KpiItem::className(), ['id' => 'kpi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return EvauateScoreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EvauateScoreQuery(get_called_class());
    }
}
