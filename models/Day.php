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
     * Тип дня (Будний или выходной день)
     *
     * @var int
     */
    public $type;

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

