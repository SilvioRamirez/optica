<?php

namespace App\Providers;
use Form;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Form::component('textComp',         'components.form.textComp',     ['name', 'show', 'value', 'attributes', 'placeholder', 'class']);
        Form::component('dateComp',         'components.form.dateComp',     ['name', 'show', 'value']);
        Form::component('numberComp',       'components.form.numberComp',   ['name', 'show', 'value', 'attributes', 'placeholder']);
        Form::component('selectComp',       'components.form.selectComp',   ['name', 'show', 'value', 'options', 'attributes']);
        Form::component('areaComp',         'components.form.areaComp',     ['name', 'show', 'value']);
        Form::component('emailComp',        'components.form.emailComp',    ['name', 'show', 'value']);
        Form::component('checkboxComp',     'components.form.checkboxComp', ['name', 'show', 'value']);
        Form::component('submitComp',       'components.form.submitComp',   ['id']);
        Form::component('hiddenComp',       'components.form.hiddenComp',   ['name','value']);
        Form::component('readonlyComp',     'components.form.readonlyComp',  ['name', 'show', 'value', 'attributes', 'placeholder']);
        
        Form::component('textMask',         'components.form.textmask',     ['name', 'show', 'mask', 'value']);
        Form::component('textSearch',       'components.form.textsearch',   ['name', 'show', 'value']);
        Form::component('textHidden',       'components.form.texthidden',   ['name', 'value']);
        Form::component('passwordGroup',    'components.form.password',     ['name', 'show']);
        Form::component('showtextGroup',    'components.form.showtext',     ['name', 'show', 'obj']);
        Form::component('longselectGroup',  'components.form.longselect',   ['name','show','options','value','attributes']);
        Form::component('longtextGroup',    'components.form.longtext',     ['name','show','value','attributes']);
        Form::component('checkboxGroup',    'components.form.checkbox',     ['name','show','value','attributes']);
        Form::component('deleteGroup',      'components.form.btndelete',    []);
        Form::component('opcionesGroup',    'components.fragment.opciones', ['id']);
    }
}
