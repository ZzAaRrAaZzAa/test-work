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
class appmodelsTicket extends \yii\db\ActiveRecord
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
            [['status', 'category', 'created_date', 'agent'], 'required'],
            [['status', 'category', 'description'], 'string'],
            [['resolved_date', 'created_date'], 'safe'],
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
