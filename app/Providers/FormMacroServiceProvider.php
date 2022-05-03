<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;

class FormMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('adminFormText', 'components.admin.form.text', ['name', 'label' => null, 'defaultValue' => null, 'attributes' => []]);
        Form::component('adminFormEmail', 'components.admin.form.email', ['name', 'label' => null, 'defaultValue' => null, 'attributes' => []]);
        Form::component('adminFormPassword', 'components.admin.form.password', ['name', 'label' => null, 'attributes' => []]);
        Form::component('adminFormTextarea', 'components.admin.form.textarea', ['name', 'label' => null, 'defaultValue' => null, 'attributes' => []]);
        Form::component('adminFormSelect', 'components.admin.form.select', ['name', 'label' => null, 'list' => [], 'defaultValue' => null, 'attributes' => []]);
        Form::component('adminFormCheckbox', 'components.admin.form.checkbox', ['name', 'label' => null, 'list' => [], 'defaultValue' => null, 'attributes' => []]);
        Form::component('adminFormDatetime', 'components.admin.form.datetime', ['name', 'label' => null, 'defaultValue' => Carbon::now(), 'attributes' => []]);
        Form::component('adminFormSubmit', 'components.admin.form.submit', ['text', 'attributes' => []]);

        Form::component('frontFormText', 'components.front.form.text', ['name', 'label' => null, 'defaultValue' => null, 'attributes' => []]);
        Form::component('frontFormEmail', 'components.front.form.email', ['name', 'label' => null, 'defaultValue' => null, 'attributes' => []]);
        Form::component('frontFormPassword', 'components.front.form.password', ['name', 'label' => null, 'attributes' => []]);
        Form::component('frontFormSubmit', 'components.front.form.submit', ['text', 'attributes' => []]);
    }
}
