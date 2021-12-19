<?php namespace Anomaly\TodosModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\TodosModule\Todo\Contract\TodoRepositoryInterface;
use Anomaly\TodosModule\Todo\TodoRepository;
use Anomaly\Streams\Platform\Model\Todos\TodosTodosEntryModel;
use Anomaly\TodosModule\Todo\Form\TodoFormBuilder;
use Anomaly\TodosModule\Todo\TodoModel;
use Illuminate\Routing\Router;

class TodosModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Additional addon plugins.
     *
     * @type array|null
     */
    protected $plugins = [];

    /**
     * The addon Artisan commands.
     *
     * @type array|null
     */
    protected $commands = [];

    /**
     * The addon's scheduled commands.
     *
     * @type array|null
     */
    protected $schedules = [];

    /**
     * The addon API routes.
     *
     * @type array|null
     */
    protected $api = [];

    /**
     * The addon routes.
     *
     * @type array|null
     */
    protected $routes = [

        'todos'         => [
            'as'            => 'todos.index',
            'uses'          => 'Anomaly\TodosModule\Http\Controller\TodosController@index',
            'middleware'    => [\Anomaly\TodosModule\Http\Middleware\LoginMiddleware::class]
        ],
        'todos/create'  => [
            'as'            => 'todos.create',
            'uses'          => 'Anomaly\TodosModule\Http\Controller\TodosController@create',
            'middleware'    => [\Anomaly\TodosModule\Http\Middleware\LoginMiddleware::class]
        ],

        'todos/edit/{id}'   => [
            'as'            => 'todos.edit',
            'uses'          => 'Anomaly\TodosModule\Http\Controller\TodosController@edit',
            'middleware'    => [\Anomaly\TodosModule\Http\Middleware\LoginMiddleware::class]
        ],

        'todos/done/{id}'   => [
            'as'            => 'todos.done',
            'verb'          => 'put',
            'uses'          => 'Anomaly\TodosModule\Http\Controller\TodosController@done',
            'middleware'    => [\Anomaly\TodosModule\Http\Middleware\LoginMiddleware::class]
        ],

        'todos/unfinished/{id}'   => [
            'as'            => 'todos.unfinished',
            'verb'          => 'put',
            'uses'          => 'Anomaly\TodosModule\Http\Controller\TodosController@unfinished',
            'middleware'    => [\Anomaly\TodosModule\Http\Middleware\LoginMiddleware::class]
        ],

        'todos/delete/{id}'   => [
            'as'            => 'todos.delete',
            'verb'          => 'delete',
            'uses'          => 'Anomaly\TodosModule\Http\Controller\TodosController@delete',
            'middleware'    => [\Anomaly\TodosModule\Http\Middleware\LoginMiddleware::class]
        ],

        'admin/todos'           => 'Anomaly\TodosModule\Http\Controller\Admin\TodosController@index',
        'admin/todos/create'    => 'Anomaly\TodosModule\Http\Controller\Admin\TodosController@create',
        'admin/todos/edit/{id}' => 'Anomaly\TodosModule\Http\Controller\Admin\TodosController@edit',
    ];

    /**
     * The addon middleware.
     *
     * @type array|null
     */
    protected $middleware = [
        // Anomaly\TodosModule\Http\Middleware\LoginMiddleware::class
    ];

    /**
     * Addon group middleware.
     *
     * @var array
     */
    protected $groupMiddleware = [
        //'web' => [
        //    Anomaly\TodosModule\Http\Middleware\ExampleMiddleware::class,
        //],
    ];

    /**
     * Addon route middleware.
     *
     * @type array|null
     */
    protected $routeMiddleware = [
        'login' => \Anomaly\TodosModule\Http\Middleware\LoginMiddleware::class,
    ];

    /**
     * The addon event listeners.
     *
     * @type array|null
     */
    protected $listeners = [
        //Anomaly\TodosModule\Event\ExampleEvent::class => [
        //    Anomaly\TodosModule\Listener\ExampleListener::class,
        //],
    ];

    /**
     * The addon alias bindings.
     *
     * @type array|null
     */
    protected $aliases = [
        //'Example' => Anomaly\TodosModule\Example::class
    ];

    /**
     * The addon class bindings.
     *
     * @type array|null
     */
    protected $bindings = [
        TodosTodosEntryModel::class => TodoModel::class,
        'my_form'   => TodoFormBuilder::class
    ];

    /**
     * The addon singleton bindings.
     *
     * @type array|null
     */
    protected $singletons = [
        TodoRepositoryInterface::class => TodoRepository::class,
    ];

    /**
     * Additional service providers.
     *
     * @type array|null
     */
    protected $providers = [
        //\ExamplePackage\Provider\ExampleProvider::class
    ];

    /**
     * The addon view overrides.
     *
     * @type array|null
     */
    protected $overrides = [
        //'streams::errors/404' => 'module::errors/404',
        //'streams::errors/500' => 'module::errors/500',
    ];

    /**
     * The addon mobile-only view overrides.
     *
     * @type array|null
     */
    protected $mobile = [
        //'streams::errors/404' => 'module::mobile/errors/404',
        //'streams::errors/500' => 'module::mobile/errors/500',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        // Run extra pre-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Boot the addon.
     */
    public function boot(Router $route)
    {
        // Run extra post-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Map additional addon routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {

    }

}
