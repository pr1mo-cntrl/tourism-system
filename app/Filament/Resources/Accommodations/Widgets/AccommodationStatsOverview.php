<?php

namespace App\Filament\Resources\Accommodations\Widgets;

use App\Models\Accommodation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AccommodationStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Let's calculate the real numbers directly from your database!
        $totalEstablishments = Accommodation::count();
        $totalRoomsOccupied = Accommodation::sum('rooms_occupied');
        
        // Add up both PH and Foreign arrivals
        $totalGuests = Accommodation::sum('ga_ph_count') + Accommodation::sum('ga_non_fil_count');

        return [
            Stat::make('Total Establishments', $totalEstablishments)
                ->description('All registered reporting locations')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('primary'),

            Stat::make('Total Rooms Occupied', $totalRoomsOccupied)
                ->description('Combined occupancy this month')
                ->descriptionIcon('heroicon-m-key')
                ->color('warning'),

            Stat::make('Total Guest Arrivals', $totalGuests)
                ->description('Philippine & Foreign visitors combined')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
        ];
    }
}