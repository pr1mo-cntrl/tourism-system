<?php

namespace App\Filament\Resources\Accommodations\Pages;

use App\Filament\Resources\Accommodations\AccommodationResource;
use App\Filament\Resources\Accommodations\Widgets\AccommodationStatsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccommodations extends ListRecords
{
    protected static string $resource = AccommodationResource::class;

    // 1. THIS IS OUR TOGGLE SWITCH (Defaults to true/Grid View)
    public bool $isGrid = true; 

    protected function getHeaderActions(): array
    {
        return [
            // 2. THE NEW TOGGLE BUTTON
            Actions\Action::make('toggleGrid')
                ->label(fn() => $this->isGrid ? 'List View' : 'Grid View')
                ->icon(fn() => $this->isGrid ? 'heroicon-m-list-bullet' : 'heroicon-m-squares-2x2')
                ->color('gray')
                ->action(function () {
                    // This flips the switch back and forth when clicked!
                    $this->isGrid = ! $this->isGrid; 
                }),
                
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AccommodationStatsOverview::class,
        ];
    }
}