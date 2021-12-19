<?php 

namespace Anomaly\TodosModule\Http\Controller;

use Anomaly\TodosModule\Todo\Form\TodoFormBuilder;
use Anomaly\TodosModule\Todo\Table\TodoTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\TodosModule\Todo\TodoModel;

class TodosController extends PublicController
{

    public function __construct()
    {
        $this->middleware('login');
    }

    /**
     * Display an index of existing entries.
     *
     * @param TodoTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TodoTableBuilder $table)
    {
        return $this->view->make('anomaly.module.todos::index');
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
        $form->skipField('slug');
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
        $form->skipField('slug');
        $form->skipField('isDone');
        
        $todo = TodoModel::find($id);
        $this->isBelongToUser($todo);
        if(!$todo) {
            return redirect(url('/todos'));
        }

        return $form->render($id);
    }


    private function isBelongToUser($todo) 
    {
        if($todo->created_by_id != auth()->user()->id) {
            return redirect(url('/todos'));
        }

        return true;
    }
}
