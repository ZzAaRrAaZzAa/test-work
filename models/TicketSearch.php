<?php

namespace app\models;

use yii\base\Model;
use yii\data\ArrayDataProvider;
use Yii;

/**
 * TicketSearch represents the model behind the search form of `app\models\Ticket`.
 */
class TicketSearch extends Model
{
    public $date_from;
    public $date_to;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * Returns a data provider with ticket counts by agent and category for a specified date range.
     *
     * @param array $params
     * @return ArrayDataProvider
     */
    public function searchByAgentAndDate($params)
    {
        // SQL query to fetch data grouped by agent and category
        $sql = "
            SELECT 
                agent, 
                SUM(category = 'Відключення') AS disconnections,
                SUM(category = 'Перевірка/здешевлення') AS optimizations,
                SUM(category = 'Технічне питання') AS technical_issues,
                SUM(category = 'Інше') AS others,
                COUNT(*) AS total
            FROM 
                tickets
            WHERE 
                resolved_date BETWEEN :date_from AND :date_to
                AND status = 'Вирішена'
            GROUP BY 
                agent
        ";

        $this->load($params);

        if (!$this->validate()) {
            return new ArrayDataProvider([
                'allModels' => [],
            ]);
        }

        // Set default date range if not provided
        $dateFrom = $this->date_from ?: '2000-01-01';
        $dateTo = $this->date_to ?: date('Y-m-d');

        // Execute query
        $results = Yii::$app->db->createCommand($sql, [
            ':date_from' => $dateFrom,
            ':date_to' => $dateTo,
        ])->queryAll();

        // Create data provider
        $dataProvider = new ArrayDataProvider([
            'allModels' => $results,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['agent', 'disconnections', 'optimizations', 'technical_issues', 'others', 'total'],
            ],
        ]);

        return $dataProvider;
    }
}
