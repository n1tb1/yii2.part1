<?php

namespace app\models;

use yii\base\Model;

/**
 * Activity класс
 *
 * Отражает сущность хранимого в календаре события
 */
class Activity extends Model
{
    /**
     * Приоритет события(главное, менее важное...)
     *
     * @var int
     */
    public $priority;

    /**
     * Повторяющееся ли событие
     *
     * @var boolean
     */
    public $isRepeatable;

    /**
     * Название события
     *
     * @var string
     */
    public $title;

    /**
     * День начала события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $startDay;

    /**
     * День завершения события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $endDay;

    /**
     * ID автора, создавшего события
     *
     * @var int
     */

    public $startTime;

    /**
     * Время начала события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $endTime;

    /**
     * IВремя завершения события. Хранится в Unix timestamp
     *
     * @var int
     */

    public $idAuthor;

    /**
     * Статус события (завершено или активно)
     *
     * @var boolean
     */
    public $status;

    /**
     * Описание события
     *
     * @var string
     */
    public $body;

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата завершения',
            'idAuthor' => 'ID автора',
            'body' => 'Описание события'
        ];
    }
}

