<?php 

namespace Anomaly\TodosModule\Http\Controller;

use Anomaly\TodosModule\Todo\Form\TodoFormBuilder;
use Anomaly\TodosModule\Todo\Table\TodoTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\TodosModule\Todo\TodoModel;
use Illuminate\Support\Facades\DB;

class TodosController extends PublicController
{

    // public function __construct()
    // {
    //     $this->middleware('login');
    // }

    /**
     * Display an index of existing entries.
     *
     * @param TodoTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TodoTableBuilder $table)
    {
        // return $table->render();
        $todos = TodoModel::where('created_by_id',auth()->user()->id)
                    ->orderBy(DB::raw('ISNULL(datetime), datetime'), 'ASC')->paginate(10);
        return $this->view->make('anomaly.module.todos::index',compact('todos'));
    }

    /**
     * Create a new entry.
     *
     * @param TodoFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TodoFormBuilder $form)
    {  
        $this->breadcrumbs->add('Todos','todos');
        $form->skipField('isDone');
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param TodoFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TodoFormBuilder $form, $id)
    {
        $this->breadcrumbs->add('Todos','todos');
        $form->skipField('slug');
        $form->skipField('isDone');
        
        $todo = TodoModel::find($id);
        $this->isBelongToUser($todo);
        if(!$todo) {
            return redirect(url('/todos'));
        }

        return $form->render($id);
    }

    /**
     * Update todo as done.
     *
     * @param $id
     * @return redirect
     */
    public function done($id)
    {
        $todo = TodoModel::find($id);
        $this->isBelongToUser($todo);

        $todo->isDone = 1;
        $todo->save();
        return redirect()->back()->with('success','Yeeah, you do better!');
    }

    /**
     * Update todo as unfinished.
     *
     * @param $id
     * @return redirect
     */
    public function unfinished($id)
    {
        $todo = TodoModel::find($id);
        $this->isBelongToUser($todo);

        $todo->isDone = 0;
        $todo->save();
        return redirect()->back();
    }

    /**
     * delete todo.
     *
     * @param $id
     * @return redirect
     */
    public function delete($id)
    {
        $todo = TodoModel::find($id);
        $this->isBelongToUser($todo);

        $todo->delete();
        return redirect()->back();
    }



    private function isBelongToUser($todo) 
    {
        if($todo->created_by_id != auth()->user()->id) {
            return redirect(url('/todos'));
        }

        return true;
    }
}
