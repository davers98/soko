<?php

namespace App\Http\Livewire;


use App\Models\Products;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductsTable extends DataTableComponent
{
    protected $model = Products::class;

    public function configure(): void
    {
        // TODO: Implement configure() method.
        $this->setprimaryKey('id');
    }

    public function columns(): array
    {
        // TODO: Implement columns() method.
        return [
            Column::make('ID', 'id')
                ->sortable(),
            Column::make('Product Name', 'productname')
                ->sortable(),
            Column::make('Description', 'description'),
            Column::make('Price', 'price')
                ->sortable(),
            Column::make('Units','units')
                ->sortable(),
            Column::make('Images','image')
        ];
    }
}