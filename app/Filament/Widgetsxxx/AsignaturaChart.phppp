<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use App\Models\User;
use Carbon\Carbon;

class AsignaturaChart extends ChartWidget
{
    protected static ?string $heading = 'Clientes';

    protected static ?int $sort = 3;
    

    protected function getData(): array
    {
       
        $data = $this->getProductsPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Usuarios registrados',
                    'data' => $data['productsPerMonth']
                ]
            ],
            'labels' => $data['months']
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getProductsPerMonth(): array
    {
        $now = Carbon::now();

        $productsPerMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use ($now, &$productsPerMonth) {
            $count = User::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
            $productsPerMonth[] = $count;

            return $now->month($month)->format('M');
        })->toArray();

        return [
            'productsPerMonth' => $productsPerMonth,
            'months' => $months,
        ];
    }
}
