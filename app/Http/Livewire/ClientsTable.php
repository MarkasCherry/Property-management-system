<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ClientsTable extends LivewireDatatable
{
    public $model = Client::class;

    public $hideable = 'select';

    public function builder()
    {
        return Client::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->searchable()
                ->hide(),

            Column::callback(['profile_photo_path'], function ($path) {
                return "<img width=96 src=$path/>";
            })
                ->label('Photo')
                ->alignCenter(),

            Column::callback(['first_name', 'last_name'], function ($firstName, $lastName) {
                return $firstName . ' ' . $lastName;
            })
                ->label("Client's name")
                ->searchable()
                ->alignCenter(),

            Column::name('email')
                ->label('Email')
                ->searchable()
                ->alignCenter(),


            Column::name('phone')
                ->label('Phone')
                ->searchable()
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
                return view('livewire.clients.table-actions', ['id' => $id]);
            })
                ->label('Edit')
                ->alignCenter(),

            Column::delete()
                ->label('Delete')
                ->alignCenter()
        ];
    }
}
