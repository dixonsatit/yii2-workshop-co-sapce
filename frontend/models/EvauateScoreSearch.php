<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EvauateScore;

/**
 * EvauateScoreSearch represents the model behind the search form about `common\models\EvauateScore`.
 */
class EvauateScoreSearch extends EvauateScore
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kpi_id', 'user_id', 'value', 'level'], 'integer'],
            [['year', 'hospital_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EvauateScore::find();
        $query->byUser();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'kpi_id' => $this->kpi_id,
            'user_id' => $this->user_id,
            'value' => $this->value,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'hospital_id', $this->hospital_id]);

        return $dataProvider;
    }
}
