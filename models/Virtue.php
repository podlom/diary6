<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "virtue".
 *
 * @property int $id
 * @property string $name
 * @property string $added_at
 * @property string $updated_at
 *
 * @property Seed[] $seeds
 */
class Virtue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'virtue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['added_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'added_at' => 'Added At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Seeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeeds()
    {
        return $this->hasMany(Seed::className(), ['virtue_id' => 'id']);
    }

    public static function getVirtuesAsArray()
    {
        $retData = [];
        // Yii::info($retData);
        $virtue = self::find()->select('id,name')->asArray()->all();
        // Yii::info($virtue);
        if (!empty($virtue)) {
            $virtue = ArrayHelper::map($virtue, 'id', 'name');
            // Yii::info($virtue);
            $retData = $virtue;
        }
        Yii::info($retData);
        return $retData;
    }
}
