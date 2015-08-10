<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%evauate_score}}".
 *
 * @property integer $id
 * @property integer $kpi_id
 * @property integer $user_id
 * @property integer $value
 * @property string $year
 * @property integer $level
 * @property string $hospital_id
 *
 * @property KpiItem $kpi
 * @property User $user
 */
class EvauateScore extends \yii\db\ActiveRecord
{
  public $theMust;
  public $theBest;
  public $groupName;

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
              'createdByAttribute'=>'user_id',
              'updatedByAttribute' => 'user_id',
          ],
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'theMust'
              ],
              'value' => function ($event) {
                  return $this->kpi->the_must;
              },
          ],
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'theBest'
              ],
              'value' => function ($event) {
                  return $this->kpi->the_best;
              },
          ],
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'groupName'
              ],
              'value' => function ($event) {
                  return $this->kpi->group->name;
              },
          ]
      ];
  }
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
            [['hospital_id'], 'string', 'max' => 6],
            [['kpi_id', 'user_id', 'year', 'level', 'hospital_id'], 'unique', 'targetAttribute' => ['kpi_id', 'user_id', 'year', 'level', 'hospital_id'], 'message' => 'The combination of Kpi ID, User ID, Year, Level and Hospitall Code has already been taken.']
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
            'hospital_id' => Yii::t('app', 'Hospitall Code'),
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
