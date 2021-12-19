<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleTodosCreateTodosStream extends Migration
{

    /**
     * This migration creates the stream.
     * It should be deleted on rollback.
     *
     * @var bool
     */
    protected $delete = true;

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'todos',
        'title_column' => 'name',
        'translatable' => true,
        'versionable' => false,
        'trashable' => true,
        'searchable' => false,
        'sortable' => false,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'translatable' => false,
            'required' => true,
        ],
        // 'slug' => [
        //     'unique' => true,
        //     'required' => false,
        // ],
        'description',
        'datetime',
        'isDone' => [
            'config'   => [
                'default_value' => 0
            ]
        ]
        
    ];

}
