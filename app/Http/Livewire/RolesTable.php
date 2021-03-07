<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

class RolesTable extends LivewireDatatable
{
    public $model = Role::class;

    public $hideable = 'select';

    public function builder()
    {
        return Role::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID'),

            Column::name('Name')
                ->defaultSort('asc')
                ->searchable()
                ->editable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Created at')
                ->filterable()
                ->hide(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.table-actions', ['id' => $id, 'name' => $name]);
            })
        ];
    }
}
