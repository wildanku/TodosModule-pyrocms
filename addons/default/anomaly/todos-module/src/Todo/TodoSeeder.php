<?php namespace Anomaly\TodosModule\Todo;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Anomaly\TodosModule\Todo\Contract\TodoRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    protected $widgets;

    public function __construct(TodoRepositoryInterface $widgets)
    {
        $this->widgets = $widgets;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $sampleDesc = `Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.`;
        $this->widgets->create([   
            'name'          => 'Todo List #1',
            'description'   => $sampleDesc,
            'created_by_id' => 1,
            'isDone'        => 0,
            'datetime'      => Carbon::now()->addWeek(1)
        ]);
        $this->widgets->create([   
            'name'          => 'Todo List #2',
            'description'   => $sampleDesc,
            'created_by_id' => 1,
            'isDone'        => 0,
            'datetime'      => Carbon::now()->addWeek(1)
        ]);
        $this->widgets->create([   
            'name'          => 'Todo List #3',
            'description'   => $sampleDesc,
            'created_by_id' => 1,
            'isDone'        => 0,
            'datetime'      => Carbon::now()->addWeek(1)
        ]);
    }
}
