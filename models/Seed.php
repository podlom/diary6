<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "seed".
 *
 * @property int $id
 * @property int $virtue_id
 * @property string $seed_time
 * @property string $seed_date
 * @property int $user_id
 * @property string $description
 * @property int $is_positive
 * @property string $added_at
 *
 * @property Virtue $virtue
 */
class Seed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['virtue_id', 'seed_time', 'seed_date', 'user_id', 'description', 'added_at'], 'required'],
            [['virtue_id', 'user_id', 'is_positive'], 'integer'],
            [['seed_time', 'seed_date', 'added_at'], 'safe'],
            [['description'], 'string'],
            [['virtue_id'], 'exist', 'skipOnError' => true, 'targetClass' => Virtue::className(), 'targetAttribute' => ['virtue_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'virtue_id' => 'Virtue ID',
            'seed_time' => 'Seed Time',
            'seed_date' => 'Seed Date',
            'user_id' => 'User ID',
            'description' => 'Description',
            'is_positive' => 'Is Positive',
            'added_at' => 'Added At',
        ];
    }

    /**
     * Gets query for [[Virtue]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVirtue()
    {
        return $this->hasOne(Virtue::className(), ['id' => 'virtue_id']);
    }

    public static function getGoodSeedsAsArray(int $userId)
    {
        $userId = intval($userId);

        return Yii::$app->db->CreateCommand('select count(s.virtue_id) as cnt_good_seeds_planted, s.virtue_id, v.name from seed AS s inner join virtue AS v on v.id = s.virtue_id where s.user_id = ' . $userId . ' and s.is_positive = 1 group by s.virtue_id')->queryAll();
    }

    public static function getNumGoodSeeds(int $userId)
    {
        $userId = intval($userId);

        return Yii::$app->db->CreateCommand('select count(s.virtue_id) as cnt_good_seeds_planted from seed AS s where s.user_id = ' . $userId . ' and s.is_positive = 1')->queryScalar();
    }

    public static function getNumSeeds(int $userId)
    {
        $userId = intval($userId);

        return Yii::$app->db->CreateCommand('select count(s.virtue_id) as cnt_good_seeds_planted from seed AS s where s.user_id = ' . $userId)->queryScalar();
    }
}
