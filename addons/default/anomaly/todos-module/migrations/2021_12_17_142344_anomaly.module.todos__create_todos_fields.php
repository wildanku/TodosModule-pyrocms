<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\UsersModule\User\User;

class AnomalyModuleTodosCreateTodosFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'         => 'anomaly.field_type.text',
        'description'   => 'anomaly.field_type.textarea',
        // 'slug'          => [
        //     'type' => 'anomaly.field_type.slug',
        //     'config' => [
        //         'slugify'   => 'name',
        //         'type'      => '_'
        //     ],
        // ],
        'datetime'      => 'anomaly.field_type.datetime',
        'isDone'      => 'anomaly.field_type.boolean'
    ];

}
