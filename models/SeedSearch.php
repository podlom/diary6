<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seed;


/**
 * SeedSearch represents the model behind the search form of `app\models\Seed`.
 */
class SeedSearch extends Seed
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'virtue_id', 'user_id', 'is_positive'], 'integer'],
            [['seed_time', 'seed_date', 'description', 'added_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $userId = Yii::$app->user->getId();
        Yii::info(__METHOD__ . ' +' . __LINE__ . ' $userId: ' . var_export($userId, true));
        if (!is_null($userId)) {
            $query = Seed::find()->where(['user_id' => $userId])->orderBy(['id' => SORT_DESC]);
        } else {
            $query = Seed::find()->orderBy(['id' => SORT_DESC]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'virtue_id' => $this->virtue_id,
            'seed_time' => $this->seed_time,
            'seed_date' => $this->seed_date,
            // 'user_id' => $this->user_id,
            'is_positive' => $this->is_positive,
            'added_at' => $this->added_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
