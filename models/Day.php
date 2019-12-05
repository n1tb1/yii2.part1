<?php

namespace app\models;

use yii\base\Model;

/**
 * Day класс
 *
 * Отражает сущность дня в календаре
 */
class Day extends Model
{
    /**
     * Id дня
     *
     * @var int
     */
    public $id;

    /**
     * Тип дня (Будний или выходной день)
     *
     * @var int
     */
    public $type;

    /**
     * Дата в формате unixtimestamp
     *
     * @var date
     */
    public $date;

    /**
     * Массив с ID ключами событий, которые включает день
     *
     * @var array
     */
    public $activities;

    /**
     * Описание дня
     *
     * @var string
     */
    public $description;

    public function attributeLabels()
    {
        return [
            'title' => 'Задания на день',
            'author' => 'Автор',
            'activityName' => 'Название задания',
            'action' => 'Действие',
            'calendar' => 'Календарь'
        ];
    }
}

