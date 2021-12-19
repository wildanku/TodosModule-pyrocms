<?php namespace Anomaly\TodosModule\Todo\Table;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\TodosModule\Todo\Contract\TodoRepositoryInterface;
use Anomaly\UsersModule\User\User;

class TodoTableBuilder extends TableBuilder
{
    public function __construct(Table $table)
    {
        parent::__construct($table);
        $user = User::all()->pluck('username','id')->toArray();
        $this->filters['created_by_id']['options'] = $user;

    }

    /**
     * The table views.
     *
     * @var array|string
     */
    protected $views = [];

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'name',
        'created_by_id' => [
            'filter'  => 'select',
            'options' => [],
        ]
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'name',
        'entry.created_by_id' => [
            'wrapper' => '{{ user({value}).display_name }}'
        ],
        'datetime',
        'description'
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
