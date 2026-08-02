<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\VisitorRecord;

class TopAttractionsChart extends ChartWidget
{
    protected ?string $heading = 'Most Visited Attractions (Top 5)';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $records = VisitorRecord::all();
        $attractionTotals = [];

        // Manually sum all categories to avoid SQL compatibility issues
        foreach($records as $record) {
            $total = $record->local_male + $record->local_female + 
                     $record->other_mun_male + $record->other_mun_female + 
                     $record->other_prov_male + $record->other_prov_female + 
                     $record->foreign_male + $record->foreign_female;
                     
            if(!isset($attractionTotals[$record->attraction_name])) {
                $attractionTotals[$record->attraction_name] = 0;
            }
            $attractionTotals[$record->attraction_name] += $total;
        }

        // Sort highest to lowest and grab the top 5
        arsort($attractionTotals);
        $topAttractions = array_slice($attractionTotals, 0, 5);

        return [
            'datasets' => [
                [
                    'label' => 'Total Visitors',
                    'data' => array_values($topAttractions),
                    'backgroundColor' => '#8b5cf6', // Purple
                ],
            ],
            'labels' => array_keys($topAttractions),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}