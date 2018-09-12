<?php

namespace apaoww\AdminOci8\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * AssignmentSearch represents the model behind the search form about Assignment.
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Assignment extends Model
{
    public $ID;
    public $USERNAME;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'USERNAME'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('rbac-admin', 'ID'),
            'USERNAME' => Yii::t('rbac-admin', 'Username'),
            'NAME' => Yii::t('rbac-admin', 'Name'),
        ];
    }

    /**
     * Create data provider for Assignment model.
     * @param  array                        $params
     * @param  \yii\db\ActiveRecord         $class
     * @param  string                       $usernameField
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params, $class, $usernameField)
    {
        $query = $class::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', $usernameField, $this->USERNAME]);

        return $dataProvider;
    }
}
