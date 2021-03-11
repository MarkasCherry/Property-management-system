<?php

namespace App\Http\Livewire;

use App\Models\Facility;
use Mediconesystems\LivewireDatatables\BooleanColumn;
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

            BooleanColumn::name('active')
                ->label('Active ?')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.facilities.table-actions', ['id' => $id]);
            })
                ->label('Edit')
                ->alignCenter(),

            Column::delete()
                ->label('Delete')
                ->alignCenter()
        ];
    }
}
