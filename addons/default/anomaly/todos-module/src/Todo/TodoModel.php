<?php namespace Anomaly\TodosModule\Todo;

use Anomaly\TodosModule\Todo\Contract\TodoInterface;
use Anomaly\Streams\Platform\Model\Todos\TodosTodosEntryModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TodoModel extends TodosTodosEntryModel implements TodoInterface
{
    use HasFactory;

    /**
     * @return TodoFactory
     */
    protected static function newFactory()
    {
        return TodoFactory::new();
    }
}
