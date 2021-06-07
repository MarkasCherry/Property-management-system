<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class NeedsHousekeepingTable extends LivewireDatatable
{
    public $model = Room::class;

    public $hideable = 'select';

    public function builder()
    {
        return Room::whereNeedsHousekeeping(true)->with('property');
    }

    public function columns()
    {
        return [
            Column::name('property.name')
                ->label('Property name')
                ->searchable(),

            Column::name('name')
                ->label('Room name')
                ->searchable(),

            Column::name('room_number')
                ->label('Room number')
                ->searchable(),

            DateColumn::name('last_housekeeping')
                ->defaultSort('desc')
                ->label('Last housekeeping')
                ->searchable(),

            Column::callback(['id'], function ($id) {
                return '<button class="button h-button is-info is-rounded is-elevated" wire:click="completed('.$id.')">
                    <span>Mark as completed</span>
                </button>';
            })
        ];
    }

    public function completed($id)
    {
        Room::find($id)->update([
            'needs_housekeeping' => false,
            'last_housekeeping' => now()
        ]);

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Housekeeping completed'
        ]);
    }
}
