<?php

namespace app\models;

use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property int $started_at
 * @property int $finished_at
 * @property int $author_id
 * @property int $main
 * @property int $cycle
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $author
 * @property Calendar[] $calendar
 * @property User[] $users - список всех пользователй из календаря
 */
class Activity extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => time()
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'main', 'cycle', 'created_at', 'updated_at'], 'integer'],
            [['title', 'started_at'], 'required'],
            [['started_at', 'finished_at'], 'date', 'format' => 'php:d.m.Y'],
            [['title'], 'string', 'max' => 255],
            [['finished_at'], 'checkFinishedAt', 'skipOnEmpty' => false, 'skipOnError' => false]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'started_at' => 'Started At',
            'finished_at' => 'Finished At',
            'author_id' => 'Author ID',
            'main' => 'Main',
            'cycle' => 'Cycle',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function checkEndDate($attr, $value)
    {
        $startDateTimestamp = \Yii::$app->formatter->asTimestamp($this->started_at);
        $endDateTimestamp = \Yii::$app->formatter->asTimestamp($this->finished_at);
        if ($startDateTimestamp < $endDateTimestamp) {
            $this->addError($attr, 'Дата конца события, не может быть больше даты начала');
        }
    }

    public function beforeValidate()
    {
        $this->author_id = \Yii::$app->user->getId();

        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        $this->started_at = \Yii::$app->formatter->asTimestamp($this->started_at);

        if (empty($this->finished_at)) {
            $this->finished_at = $this->started_at;
        } else {
            $this->finished_at = \Yii::$app->formatter->asTimestamp($this->finished_at);
        }

        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $this->started_at = \Yii::$app->formatter->asDate($this->started_at, 'php:d.m.Y');
        $this->finished_at = \Yii::$app->formatter->asDate($this->finished_at, 'php:d.m.Y');
        parent::afterFind();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendars()
    {
        return $this->hasMany(Calendar::className(), ['activity_id' => 'id']);
    }

    public function getUsers()
    {
        return  $this->hasMany(User::className(), ['id'=>'user_id'])
            ->via('calendar');
//        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('calendar', ['user_id' => 'id']);
    }

    public function checkFinishedAt($attribute) {
        if (!$this->hasErrors()) {
            if(empty($this->$attribute)) {
                $this->$attribute = $this->started_at;
            } elseif($this->$attribute < $this->started_at) {
                $this->addError($attribute, 'Finished at can not be lower then started at!');
            }
        }
    }
}
