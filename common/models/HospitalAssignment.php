<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%hospital_assignment}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $hospital_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property LibHospital $hospital
 */
class HospitalAssignment extends \yii\db\ActiveRecord
{
  public function behaviors()
  {
      return [
          [
              'class' => TimestampBehavior::className(),
              'createdAtAttribute' => 'created_at',
              'updatedAtAttribute' => 'updated_at'
          ],
          [
              'class' => BlameableBehavior::className(),
              'createdByAttribute'=>'created_by',
              'updatedByAttribute' => 'updated_by',
          ]
      ];
  }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hospital_assignment}}';
    }

    /**
     * @inheritdoc
     */
     public function rules()
     {
         return [
             [['user_id', 'hospital_id'], 'required'],
             [['user_id', 'hospital_id'], 'integer']
         ];
     }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'รหัสผู้ใช้งาน'),
            'hospital_id' => Yii::t('app', 'รหัสสถานพยาบาล'),
            'created_at' => Yii::t('app', 'สร้างวันที่'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'ให้สิทธิโดยใคร'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospital()
    {
        return $this->hasOne(Hospital::className(), ['id' => 'hospital_id']);
    }

    /**
     * @inheritdoc
     * @return HospitalAssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HospitalAssignmentQuery(get_called_class());
    }
}
