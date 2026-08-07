<?php

namespace App\Filament\Resources\VisitorRecords\Pages;

use App\Filament\Resources\VisitorRecords\VisitorRecordResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVisitorRecord extends CreateRecord
{
    protected static string $resource = VisitorRecordResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
