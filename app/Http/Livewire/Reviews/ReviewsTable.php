<?php

namespace App\Http\Livewire\Reviews;

use App\Models\Review;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ReviewsTable extends LivewireDatatable
{
    public $model = Review::class;

    public $hideable = 'select';

    public function builder()
    {
        return Review::query()->with('client');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hide(),

            Column::callback(['client.name', 'client.lastname'], function ($firstName, $lastName) {
                return $firstName . ' ' . $lastName;
            })
                ->label('Client name')
                ->searchable(),

            Column::callback(['rating'], function ($rating) {
                return view('livewire.reviews.rating', compact('rating'));
            })
                ->label('Rating'),

            Column::name('message')
                ->label('Rating')
                ->editable()
                ->searchable(),

            DateColumn::name('created_at')
                ->label('Created at')
                ->defaultSort('desc')
                ->hide(),

            Column::callback(['id', 'public'], function ($id, $public) {
                return view('reviews.toggle-public', compact('id', 'public'));
            })->label('Public?'),
        ];
    }

    public function setPublic($id, $public)
    {
        if ($public) {
            Review::find($id)->update([
                'public' => false
            ]);

            $this->emit('alert', [
                'type' => 'error',
                'message' => 'Review has been hidden from public',
            ]);
        } else {
            Review::find($id)->update([
                'public' => true
            ]);

            $this->emit('alert', [
                'type' => 'success',
                'message' => 'Reviews is now public!',
            ]);
        }
    }
}
