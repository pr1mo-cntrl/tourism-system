<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\VisitorRecord;

class VisitorStats extends BaseWidget
{
    protected function getStats(): array
    {
        // Calculate totals across all saved monthly records
        $totalRecords = VisitorRecord::count();
        
        $totalLocal = VisitorRecord::sum('local_male') + VisitorRecord::sum('local_female');
        $totalForeign = VisitorRecord::sum('foreign_male') + VisitorRecord::sum('foreign_female');

        return [
            Stat::make('Total Reports Filed', $totalRecords)
                ->description('Submitted municipal reports')
                ->color('success'),
                
            Stat::make('Total Local Visitors', $totalLocal)
                ->description('Residents from within the municipality')
                ->color('primary'),
                
            Stat::make('Total Foreign Visitors', $totalForeign)
                ->description('International tourists recorded')
                ->color('warning'),
        ];
    }
}