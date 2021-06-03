<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class SettingsTable extends LivewireDatatable
{
    public $model = Setting::class;

    public $hideable = 'select';

    public function builder()
    {
        return Setting::query()->whereNotIn('id', [Setting::PRIVACY_POLICY]);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hide(),

            Column::name('name')
                ->label('Name')
                ->searchable(),

            Column::name('value')
                ->label('Value')
                ->searchable()
                ->editable(),

            Column::delete()
                ->alignCenter()
        ];
    }
}
