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
                TextColumn::make('month')->label('Month')->searchable()->sortable(),
                TextColumn::make('year')->label('Year')->sortable(),
                TextColumn::make('municipality_name')->label('Municipality')->searchable()->sortable(),
                TextColumn::make('attraction_name')->label('Tourist Attraction Name')->searchable(),
                
                \Filament\Tables\Columns\TextColumn::make('attraction_code')
                    ->label('Type Code')
                    ->searchable()
                    ->sortable(),

                // This Municipality
                TextColumn::make('local_male')->label('This Mun (M)')->numeric(),
                TextColumn::make('local_female')->label('This Mun (F)')->numeric(),
                TextColumn::make('local_total')->label('This Mun (Total)')->getStateUsing(fn ($record) => $record->local_male + $record->local_female),
                
                // Other Municipality
                TextColumn::make('other_mun_male')->label('Other Mun (M)')->numeric(),
                TextColumn::make('other_mun_female')->label('Other Mun (F)')->numeric(),
                TextColumn::make('other_mun_total')->label('Other Mun (Total)')->getStateUsing(fn ($record) => $record->other_mun_male + $record->other_mun_female),
                
                // Other Province
                TextColumn::make('other_prov_male')->label('Other Prov (M)')->numeric(),
                TextColumn::make('other_prov_female')->label('Other Prov (F)')->numeric(),
                TextColumn::make('other_prov_total')->label('Other Prov (Total)')->getStateUsing(fn ($record) => $record->other_prov_male + $record->other_prov_female),
                
                // Foreign
                TextColumn::make('foreign_male')->label('Foreign (M)')->numeric(),
                TextColumn::make('foreign_female')->label('Foreign (F)')->numeric(),
                TextColumn::make('foreign_total')->label('Foreign (Total)')->getStateUsing(fn ($record) => $record->foreign_male + $record->foreign_female),
                
                // Grand Totals
                TextColumn::make('grand_total_male')->label('Grand Total (M)')->getStateUsing(fn ($record) => $record->local_male + $record->other_mun_male + $record->other_prov_male + $record->foreign_male),
                TextColumn::make('grand_total_female')->label('Grand Total (F)')->getStateUsing(fn ($record) => $record->local_female + $record->other_mun_female + $record->other_prov_female + $record->foreign_female),
                TextColumn::make('grand_total_overall')->label('Grand Total (All)')->getStateUsing(fn ($record) => 
                    ($record->local_male + $record->local_female) + 
                    ($record->other_mun_male + $record->other_mun_female) + 
                    ($record->other_prov_male + $record->other_prov_female) + 
                    ($record->foreign_male + $record->foreign_female)
                ),
            ])
            // ... inside your configure() method ...

->filters([
    \Filament\Tables\Filters\SelectFilter::make('municipality_name')
        ->label('Filter by Municipality')
        ->options([
            'Baguio City' => 'Baguio City',
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