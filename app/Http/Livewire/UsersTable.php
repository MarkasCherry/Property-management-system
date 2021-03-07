<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;

    public $hideable = 'select';
    public $exportable = false;

    public function builder()
    {
        return User::query();
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->label('ID')
                ->hide()
                ->searchable(),

            Column::callback(['profile_photo_path'], function ($cover) {
                return "<img width='62' src='storage/$cover'>";
            })->label('Picture'),

            Column::callback(['name' , 'last_name'], function ($name, $lastname) {
                return $name . ' ' . $lastname;
            })->label('User name')
                ->searchable(),


            NumberColumn::name('email')
                ->label('Email')
                ->editable()
                ->searchable(),

            NumberColumn::name('position')
                ->label('Position')
                ->editable()
                ->searchable(),

            BooleanColumn::name('active')
                ->label('Active')
                ->filterable(),

            DateColumn::name('created_at')
                ->hide()
                ->defaultSort('desc'),

            Column::callback(['id'], function ($id) {
                return view('livewire.users.table-actions', ['id' => $id]);
            })
        ];
    }
}
