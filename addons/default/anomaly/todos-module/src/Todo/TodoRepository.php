<?php namespace Anomaly\TodosModule\Todo;

use Anomaly\TodosModule\Todo\Contract\TodoRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class TodoRepository extends EntryRepository implements TodoRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var TodoModel
     */
    protected $model;

    /**
     * Create a new TodoRepository instance.
     *
     * @param TodoModel $model
     */
    public function __construct(TodoModel $model)
    {
        $this->model = $model;
    }
}
