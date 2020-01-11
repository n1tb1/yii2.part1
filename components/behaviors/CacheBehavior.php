<?php
/**
 * Created by PhpStorm.
 * User: good
 * Date: 03/01/2020
 * Time: 13:10
 */

namespace app\components\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class CacheBehavior extends Behavior
{
    /*public function events()
    {
        return [
           // ActiveRecord::EVENT_AFTER_INSERT => 'deleteCache',
            ActiveRecord::EVENT_AFTER_UPDATE => 'deleteCache',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteCache',
        ];
    }

    public function deleteCache()
    {
        \Yii::$app->cache->delete(get_class($this->owner) . '_user_' . \Yii::$app->user->identity->getId());
    }*/
}