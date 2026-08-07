<?php

namespace App\Filament\Resources\VisitorRecords\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class VisitorRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 1. Stack the Attraction Name, Municipality, and Code
                TextColumn::make('attraction_name')
                    ->label('Tourist Attraction')
                    ->weight('bold')
                    ->description(fn ($record) => $record->municipality_name . ' | Code: ' . $record->code)
                    ->searchable()
                    ->sortable(),

                // 2. Stack the Month and Year
                TextColumn::make('month')
                    ->label('Period')
                    ->getStateUsing(fn ($record) => $record->month . ' ' . $record->year)
                    ->sortable(),

                // 3. This Municipality
                TextColumn::make('local_total')
                    ->label('This Mun.')
                    ->getStateUsing(fn ($record) => (int)$record->local_male + (int)$record->local_female)
                    ->description(fn ($record) => "M: {$record->local_male} | F: {$record->local_female}"),

                // 4. Other Municipality
                TextColumn::make('other_mun_total')
                    ->label('Other Mun.')
                    ->getStateUsing(fn ($record) => (int)$record->other_mun_male + (int)$record->other_mun_female)
                    ->description(fn ($record) => "M: {$record->other_mun_male} | F: {$record->other_mun_female}"),

                // 5. Other Province
                TextColumn::make('other_prov_total')
                    ->label('Other Prov.')
                    ->getStateUsing(fn ($record) => (int)$record->other_prov_male + (int)$record->other_prov_female)
                    ->description(fn ($record) => "M: {$record->other_prov_male} | F: {$record->other_prov_female}"),

                // 6. Foreign Country
                TextColumn::make('foreign_total')
                    ->label('Foreign')
                    ->getStateUsing(fn ($record) => (int)$record->foreign_male + (int)$record->foreign_female)
                    ->description(fn ($record) => "M: {$record->foreign_male} | F: {$record->foreign_female}"),

                // 7. Grand Total Badge (For a quick summary of the whole row)
                TextColumn::make('grand_total')
                    ->label('Total Visitors')
                    ->weight('bold')
                    ->badge()
                    ->color('success')
                    ->getStateUsing(fn ($record) => 
                        $record->local_male + $record->local_female +
                        $record->other_mun_male + $record->other_mun_female +
                        $record->other_prov_male + $record->other_prov_female +
                        $record->foreign_male + $record->foreign_female +
                        $record->unspecified_male + $record->unspecified_female
                    ),
            ])
            // ... inside your configure() method ...

->filters([
    \Filament\Tables\Filters\SelectFilter::make('municipality_name')
        ->label('Filter by Municipality')
        ->options([
            'Atok' => 'Atok',
            'Bakun' => 'Bakun',
            'Bokod' => 'Bokod',
            'Buguias' => 'Buguias',
            'Itogon' => 'Itogon',
            'Kabayan' => 'Kabayan',
            'Kapangan' => 'Kapangan',
            'Kibungan' => 'Kibungan',
            'La Trinidad' => 'La Trinidad',
            'Mankayan' => 'Mankayan',
            'Sablan' => 'Sablan',
            'Tuba' => 'Tuba',
            'Tublay' => 'Tublay',
        ]),
])
            ->actions([])
            ->bulkActions([]);
    }
}