<?php

namespace App\Filament\Resources\VisitorRecords;

use App\Filament\Resources\VisitorRecords\Pages\CreateVisitorRecord;
use App\Filament\Resources\VisitorRecords\Pages\EditVisitorRecord;
use App\Filament\Resources\VisitorRecords\Pages\ListVisitorRecords;
use App\Filament\Resources\VisitorRecords\Schemas\VisitorRecordForm;
use App\Filament\Resources\VisitorRecords\Tables\VisitorRecordsTable;
use App\Models\VisitorRecord;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VisitorRecordResource extends Resource
{
    protected static ?string $model = VisitorRecord::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'attraction_name';

    public static function form(Schema $schema): Schema
    {
        return VisitorRecordForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisitorRecordsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVisitorRecords::route('/'),
            'create' => CreateVisitorRecord::route('/create'),
            'edit' => EditVisitorRecord::route('/{record}/edit'),
        ];
    }
}