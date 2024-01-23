<?php

namespace App\Filament\Widgets;

use App\Models\Printer;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Review;
use App\Models\Zing;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class UserTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::all()->count()),
            Stat::make('Transactions', Transaction::all()->count()),
            Stat::make('Zings', Zing::all()->count()),
            Stat::make('Printers', Printer::all()->count()),
        ];
    }
}
