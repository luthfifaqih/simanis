<?php

namespace App\Charts;

use App\Models\Perusahaan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class StatusChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $countstatus = Perusahaan::get();
        $data = [
            $countstatus->where('status', 'terverifikasi')->count(),
            $countstatus->where('status', 'menunggu_verifikasi')->count(),
            $countstatus->where('status', 'ditolak')->count(),
        ];
        $label = [
            'Terverifikasi',
            'Menunggu Verifikasi',
            'Ditolak',
        ];
        return $this->chart->pieChart()
            ->setTitle('Data Pengajuan')
            ->setSubtitle(date('Y'))
            ->setWidth(500)
            ->setHeight(400)
            ->setColors(['#50CD89', '#FFC700', '#F1416C'])
            ->addData($data)
            ->setLabels($label);
    }
}
