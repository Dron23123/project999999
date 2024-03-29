<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 9:22 PM
 */

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

class SprintSearch extends Sprint
{
    public function rules() {
        return  [
            [['id'], 'integer'],
            [['start_date'], 'safe'],
            [['project_id'], 'safe']
        ];
    }
    public function scenarios()
    {
        return parent::scenarios(); // TODO: Change the autogenerated stub
    }
    public function search($params) {
        //$query = Sprint::findBySql("SELECT Sprint.id, Sprint.start_date, Sprint.project_id FROM Sprint, Projects WHERE Projects.user_id=" . Yii::$app->user->identity->getId());
        $query = Sprint::find()->joinWith('project')->where(['user_id' => Yii::$app->user->identity->getId()]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->getAttribute('id'),
            'start_date' => $this->getAttribute('Date'),
            'project_id' => $this->getAttribute('project_id')
        ]);

        return $dataProvider;
    }
}