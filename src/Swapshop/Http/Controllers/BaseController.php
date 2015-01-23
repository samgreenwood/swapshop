<?php namespace Swapshop\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout)) {
            $this->layout = \View::make($this->layout);
        }
    }

    /**
     * Cleaner service location in controllers
     *
     * @param $serviceName
     * @return mixed
     */
    protected function get($serviceName)
    {
        return App::make($serviceName);
    }

    /**
     * @return mixed
     */
    protected function redirect()
    {
        return App::make('redirect');
    }

    /**
     * @param $key
     * @return mixed
     */
    protected function input($key)
    {
        return App::make('request')->input($key);
    }

    /**
     * @return mixed
     */
    protected function request()
    {
        return App::make('request');
    }

    /**
     * @param $form
     * @return mixed
     */
    protected function form($form)
    {
        $form = $this->get($form);

        $form->validate($this->request()->all());

        return $form;
    }

    /**
     * @param $viewName
     * @param array $data
     * @return mixed
     */
    public function render($viewName, array $data = [])
    {
        return $this->get('view')->make($viewName, $data);
    }

}
