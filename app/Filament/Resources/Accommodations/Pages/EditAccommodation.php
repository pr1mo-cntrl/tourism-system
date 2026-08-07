<?php

namespace App\Filament\Resources\AccommodationResource\Pages;

use App\Filament\Resources\AccommodationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccommodation extends EditRecord
{
    protected static string $resource = AccommodationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Add this block here as well:
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}