<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property string $status
 * @property string $category
 * @property string|null $resolved_date
 * @property string $created_date
 * @property string $agent
 * @property string|null $description
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'category', 'agent'], 'required'],
            [['resolved_date', 'created_date'], 'date', 'format' => 'php:Y-m-d'],
            [['description'], 'string'],
            [['status'], 'in', 'range' => ['Нова', 'В роботі', 'Вирішена']],
            [['category'], 'in', 'range' => ['Відключення', 'Перевірка/здешевлення', 'Технічне питання', 'Інше']],
            [['agent'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'category' => 'Category',
            'resolved_date' => 'Resolved Date',
            'created_date' => 'Created Date',
            'agent' => 'Agent',
            'description' => 'Description',
        ];
    }
}
