<?php

namespace App\Filament\Resources\VisitorRecords\Pages;

use App\Filament\Resources\VisitorRecords\VisitorRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVisitorRecord extends EditRecord
{
    protected static string $resource = VisitorRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
