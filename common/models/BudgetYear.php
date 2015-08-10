<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%budget_year}}".
 *
 * @property integer $id
 * @property string $year
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class BudgetYear extends \yii\db\ActiveRecord
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
        return '{{%budget_year}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['year'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'year' => Yii::t('app', 'Year'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @inheritdoc
     * @return BudgetYearQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BudgetYearQuery(get_called_class());
    }
}
