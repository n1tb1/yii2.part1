<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    public $authorEmail;
    public $authorName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'main', 'cycle', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'safe'],
            [['started_at', 'finished_at'], 'date', 'format' => 'php:d.m.Y'],
            [['authorEmail'], 'string'],
            [['authorName'], 'string'],
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
        $query = Activity::find();

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

        if(!empty($this->started_at)) {
            $this->filterByDate($query, 'started_at');
        }

        if(!empty($this->finished_at)) {
            $this->filterByDate($query, 'finished_at');
        }

        if(!empty($this->authorEmail)) {
            $query->joinWith('author as author');
            $query->andWhere(['like', 'author.email', $this->authorEmail]);
        }

        if(!empty($this->authorName)) {
            $query->joinWith('author as author');
            $query->andWhere(['like', 'author.username', $this->authorName]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'author_id' => $this->author_id,
            'main' => $this->main,
            'cycle' => $this->cycle,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }

    private function filterByDate($query, $attribute) {
        $start = (int)\Yii::$app->formatter->asTimestamp($this->$attribute . " 00:00:00");
        $end = (int)\Yii::$app->formatter->asTimestamp($this->$attribute . " 00:00:00");
        $query->andFilterWhere([
            'between',
            self::tableName() . ".$attribute",
            $start,
            $end,
        ]);
    }
}
