<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\VisitorRecord;

class VisitorDemographicsChart extends ChartWidget
{
    protected ?string $heading = 'Visitors by Origin';
    protected static ?int $sort = 2; // Places it right beneath your stat cards

    protected function getData(): array
    {
        $local = VisitorRecord::sum('local_male') + VisitorRecord::sum('local_female');
        $otherMun = VisitorRecord::sum('other_mun_male') + VisitorRecord::sum('other_mun_female');
        $otherProv = VisitorRecord::sum('other_prov_male') + VisitorRecord::sum('other_prov_female');
        $foreign = VisitorRecord::sum('foreign_male') + VisitorRecord::sum('foreign_female');

        return [
            'datasets' => [
                [
                    'label' => 'Total Visitors',
                    'data' => [$local, $otherMun, $otherProv, $foreign],
                    'backgroundColor' => [
                        '#3b82f6', // Blue
                        '#10b981', // Green
                        '#f59e0b', // Yellow
                        '#ef4444', // Red
                    ],
                ],
            ],
            'labels' => ['This Municipality', 'Other Municipality', 'Other Province', 'Foreign'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}