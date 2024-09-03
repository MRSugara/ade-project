<?php

namespace App\Charts;

use App\Models\Product;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $product = Product::pluck('id')->toArray();
        //make array 11 index from data product every month
        $product = array_merge($product, Product::pluck('id')->toArray());
        dd($product);
        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales')
            ->addData('Physical sales', $product)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }
}
