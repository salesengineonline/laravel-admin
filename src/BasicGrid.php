<?php

namespace Encore\Admin;

use Closure;
use Encore\Admin\Exception\Handler;
use Encore\Admin\Grid\Column;
use Encore\Admin\Grid\Displayers\Actions;
use Encore\Admin\Grid\Displayers\RowSelector;
use Encore\Admin\Grid\Exporter;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Model;
use Encore\Admin\Grid\Row;
use Encore\Admin\Grid\Tools;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Eloquent\Model as MongodbModel;

class BasicGrid extends Grid
{
    /**
     * Create a new grid instance.
     *
     * @param Eloquent $model
     * @param Closure  $builder
     */
    public function __construct(Eloquent $model, Closure $builder)
    {
        $this->keyName = $model->getKeyName();
        $this->model = new Model($model);
        $this->columns = new Collection();
        $this->rows = new Collection();
        $this->builder = $builder;

        $this->setupTools();
        $this->setupFilter();
        $this->setupExporter();

        $this->actions(function(Actions $actions) {
            $actions->disableDelete();
        });
        $this->disableExport();
        $this->disableRowSelector();
        $this->tools(function(Tools $tools) {
            $tools->disableBatchActions();
        });
        $this->filter(function(Filter $filter) {
            $filter->disableIdFilter();
        });
    }
}
