<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%group}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
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
            'name' => Yii::t('app', 'Name'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return GroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GroupQuery(get_called_class());
    }

    /**
     * [getHierarchy description]
     * @return [type] [description]
     * @url - See more at: http://blog.smartwebsitetips.com/502/yii2-dropdown-select-optgroup/#sthash.quxZtEMW.dpuf
     */
    public static function getHierarchy() {
        $options = [];

        $parents = self::find()->where("parent_id is null")->all();
        foreach($parents as $id => $p) {
            $children = self::find()->where("parent_id=:parent_id", [":parent_id"=>$p->id])->all();
            $child_options = [];
            foreach($children as $child) {
                $child_options[$child->id] = $child->name;
            }
            $options[$p->name] = $child_options;
        }
        return $options;
    }

}
