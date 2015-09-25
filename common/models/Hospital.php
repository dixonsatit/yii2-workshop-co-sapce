<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lib_hospital}}".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $dept_add01
 * @property string $dept_add02
 * @property string $dept_add03
 * @property string $dept_prov_id
 * @property integer $zone_service_code
 * @property string $tel
 * @property string $fax
 * @property string $website
 * @property integer $officer
 * @property string $tumbol_id
 * @property string $ampher_id
 * @property string $zip_code
 * @property integer $dept_type
 * @property integer $dept_type_sorthor
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
            [['zone_service_code', 'officer', 'dept_type', 'dept_type_sorthor'], 'integer'],
            [['code', 'dept_prov_id', 'tumbol_id', 'ampher_id'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 255],
            [['dept_add01', 'dept_add02', 'dept_add03'], 'string', 'max' => 250],
            [['tel', 'fax', 'website'], 'string', 'max' => 100],
            [['zip_code'], 'string', 'max' => 5],
            [['code'], 'unique']
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
            'dept_add01' => Yii::t('app', 'Dept Add01'),
            'dept_add02' => Yii::t('app', 'Dept Add02'),
            'dept_add03' => Yii::t('app', 'Dept Add03'),
            'dept_prov_id' => Yii::t('app', 'Dept Prov ID'),
            'zone_service_code' => Yii::t('app', 'Zone Service Code'),
            'tel' => Yii::t('app', 'Tel'),
            'fax' => Yii::t('app', 'Fax'),
            'website' => Yii::t('app', 'Website'),
            'officer' => Yii::t('app', 'Officer'),
            'tumbol_id' => Yii::t('app', 'Tumbol ID'),
            'ampher_id' => Yii::t('app', 'Ampher ID'),
            'zip_code' => Yii::t('app', 'Zip Code'),
            'dept_type' => Yii::t('app', 'Dept Type'),
            'dept_type_sorthor' => Yii::t('app', 'Dept Type Sorthor'),
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

    public function getProvince(){
      return $this->hasOne(Province::className(),['PROVINCE_ID'=>'dept_prov_id']);
    }
}
