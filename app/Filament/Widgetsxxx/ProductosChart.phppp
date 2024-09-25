<?php

namespace App\Filament\Widgets;

use App\Models\order;
use Carbon\Carbon;

use Filament\Widgets\ChartWidget;

class ProductosChart extends ChartWidget
{
    protected static ?string $heading = 'Pedidos';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
       
        $data = $this->getProductsPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Pedido',
                    'data' => $data['productsPerMonth']
                ]
            ],
            'labels' => $data['months']
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    private function getProductsPerMonth(): array
    {
        $now = Carbon::now();

        $productsPerMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use ($now, &$productsPerMonth) {
            $count = order::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
            $productsPerMonth[] = $count;

            return $now->month($month)->format('M');
        })->toArray();

        return [
            'productsPerMonth' => $productsPerMonth,
            'months' => $months,
        ];
    }
}
