<?php

namespace App\Http\Livewire;

use App\Models\WeeklyStatistics;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class StatisticLogs extends LivewireDatatable
{
    public $model = WeeklyStatistics::class;

    public $hideable = 'select';
    public $exportable = 'true';

    public function builder()
    {
        return WeeklyStatistics::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->searchable(),

            Column::name('bookings_count')
                ->label('New bookings')
                ->searchable(),

            Column::name('new_clients_count')
                ->label('New clients')
                ->searchable(),

            Column::name('total_income')
                ->label('Total income')
                ->searchable(),
        ];
    }
}
