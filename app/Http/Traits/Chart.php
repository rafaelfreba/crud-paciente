<?php

namespace App\Http\Traits;

use App\DataObjects\ChartData;

trait Chart
{
    public function getChart(ChartData $chartData)
    {
        return app()
            ->chartjs->name($chartData->getName())
            ->type($chartData->getType())
            ->size(["width" => 400, "height" => 200])
            ->datasets([
                [
                    "backgroundColor" => self::generateRgbaColors(count($chartData->getData())),
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    "data" => $chartData->getData(),
                ]
            ])->options([
                'plugins' => [
                    'legend' => [
                        'display' => false,
                    ],
                    'title' => [
                        'display' => true,
                        'text' => $chartData->getTitle()
                    ],
                ],
            ]);
    }

    protected static function generateRgbaColors(int $quantity, $transparency = 0.31)
    {
        $colors = [];
        for ($i = 0; $i < $quantity; $i++) {
            $r = rand(0, 255);
            $g = rand(0, 255);
            $b = rand(0, 255);
            $rgbaColor = "rgba($r, $g, $b, $transparency)";
            $colors[] = $rgbaColor;
        }
        return $colors;
    }
}
