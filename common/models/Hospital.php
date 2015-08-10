<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lib_hospital}}".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 */
class Hospital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lib_hospital}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code','name'], 'required'],
            [['code'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'รหัสพยาบาล'),
            'name' => Yii::t('app', 'ชื่อสถานพยาบาล'),
        ];
    }

    /**
     * @inheritdoc
     * @return HospitalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HospitalQuery(get_called_class());
    }
}
