<?php

namespace App\Http\Livewire;

use App\Models\Amenity;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class AmenitiesTable extends LivewireDatatable
{
    public $model = Amenity::class;

    public $hideable = 'select';

    public function builder()
    {
        return Amenity::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hide(),

            Column::name('name')
                ->label('Amenity')
                ->searchable()
                ->editable(),

            Column::callback(['font_awesome'], function ($font_awesome) {
                return "<i style='font-size: 18px' class='$font_awesome'></i>";
            })
                ->label('Font awesome')
                ->alignCenter(),

            Column::callback(['icon'], function ($icon) {
                return "<img width=18 src=" . asset('storage/' . $icon) . "/>";
            })
                ->label('Custom icon')
                ->alignCenter(),

            BooleanColumn::name('active')
                ->label('Active ?')
                ->filterable()
                ->alignCenter(),

            DateColumn::name('created_at')
                ->label('Created at')
                ->defaultSort('desc')
                ->hide(),

            Column::callback(['id'], function ($id) {
                return view('livewire.amenities.table-actions', ['id' => $id]);
            })
                ->label('Edit')
                ->alignCenter(),

            Column::delete()
                ->label('Delete')
                ->alignCenter()
        ];
    }
}
