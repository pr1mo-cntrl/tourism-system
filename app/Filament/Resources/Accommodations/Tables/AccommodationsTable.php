<?php

namespace App\Filament\Resources\Accommodations\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AccommodationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Establishment Name')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('municipality')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                TextColumn::make('type')
                    ->label('Type')
                    ->sortable(),

                TextColumn::make('no_of_rooms')
                    ->label('Rooms')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('total_employees')
                    ->label('Total Employees')
                    ->getStateUsing(fn ($record) => $record->male_employees + $record->female_employees),
            ])
            ->filters([
                SelectFilter::make('municipality')
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
            ]);
    }
}