<?php

namespace App\Http\Livewire;

use App\Models\WeeklyStatistics;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

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
            Column::name('bookings_count')
                ->label('New bookings')
                ->filterable(),

            Column::name('new_clients_count')
                ->label('New clients')
                ->filterable(),

            Column::name('total_income')
                ->label('Total income')
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Date')
                ->filterable(),
        ];
    }
}
