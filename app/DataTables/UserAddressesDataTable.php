<?php

namespace App\DataTables;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserAddressesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', function ($query) {
                return '<a href="'.route('user.address.edit', $query->id).'" class="btn btn-primary btn-sm">Edit</a> ' .
                       '<a href="'.route('user.address.delete', $query->id).'" class="btn btn-danger btn-sm delete-item">Delete</a>';
            })
            ->rawColumns(['actions'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UserAddress $model): QueryBuilder
    {
        return $model::where('user_id', Auth::user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('useraddresses-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->scrollX(true)  // Enable horizontal scrolling
                    ->responsive(true)  // Enable responsiveness
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            // Column::make('country'),
            Column::make('state'),
            Column::make('city'),
            Column::make('zip'),
            Column::make('address'),

            Column::make('actions')->title('Actions')->orderable(false)->searchable(false)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UserAddresses_' . date('YmdHis');
    }
}
