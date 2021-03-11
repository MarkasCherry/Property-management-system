<?php

namespace App\Http\Livewire;

use App\Models\Facility;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class FacilitiesTable extends LivewireDatatable
{
    public $model = Facility::class;

    public $hideable = 'select';

    public function builder()
    {
        return Facility::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hide(),

            Column::name('name')
                ->label('Facility')
                ->searchable()
                ->editable(),

            DateColumn::name('created_at')
                ->label('Created at')
                ->defaultSort('desc')
                ->hide(),

//            Column::callback(['id', 'name'], function ($id, $name) {
//                return view('livewire.table-actions', ['id' => $id, 'name' => $name]);
//            })

            Column::delete()
                ->label('Delete')
                ->alignCenter()
        ];
    }
}
