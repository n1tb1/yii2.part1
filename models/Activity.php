<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $started_at
 * @property int|null $finished_at
 * @property int|null $author_id
 * @property int|null $main
 * @property int|null $cycle
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $author
 * @property Calendar[] $calendars
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['started_at', 'finished_at', 'author_id', 'main', 'cycle', 'created_at', 'updated_at'], 'integer'],
            [['title', 'started_at'], 'required'],
            [['title'], 'string', 'max' => 255],
            [
                ['author_id'], 'exist', 'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => ['author_id' => 'id']
            ],
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

    public function checkFinishedAt($attribute, $params) {
        if (!$this->hasErrors()) {
            if(empty($this->$attribute)) {
                $this->$attribute = $this->started_at;
            } elseif($this->$attribute < $this->started_at) {
                $this->addError($attribute, 'Finished at can not be lower then started at!');
            }
        }
    }
}
