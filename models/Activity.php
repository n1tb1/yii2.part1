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
     * Id события
     *
     * @var int
     */
    public $id;

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
    public $start;

    /**
     * День завершения события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $end;

    /**
     * ID автора, создавшего события
     *
     * @var int
     */

    public $id_user;

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

    /**
     * Файлы
     *
     * @var  array
     */
    public $files;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'title',
                    'start',
                    'end',
                    'priority',
                    'body'
                ],
                'required'
            ],
            [
                [
                    'start',
                    'end'
                ],
                'integer'
            ],
            ['priority', 'boolean'],
            ['body', 'string'],
            [['files'], 'file', 'maxFiles' => 10]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'priority' => 'Главное событие',
            'start' => 'Дата начала',
            'end' => 'Дата завершения',
            'idAuthor' => 'ID автора',
            'body' => 'Описание события',
            'files' => 'Файлы',
            'status' => 'Статус'
        ];
    }
}

