<?php

namespace App\Filament\Resources\Accommodations\Pages;

use App\Filament\Resources\Accommodations\AccommodationResource;
use App\Filament\Resources\Accommodations\Widgets\AccommodationStatsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccommodations extends ListRecords
{
    protected static string $resource = AccommodationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // This block tells Filament to inject our new stat cards at the top!
    protected function getHeaderWidgets(): array
    {
        return [
            AccommodationStatsOverview::class,
        ];
    }
}