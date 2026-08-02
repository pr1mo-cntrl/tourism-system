<?php

namespace App\Filament\Resources\VisitorRecords\Pages;

use App\Filament\Resources\VisitorRecords\VisitorRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVisitorRecords extends ListRecords
{
    protected static string $resource = VisitorRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
