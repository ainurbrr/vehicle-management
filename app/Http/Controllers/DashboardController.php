<?php

namespace App\Http\Controllers;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        list($months, $data) = $this->getCompletedBookingsData();

        $chart = (new LarapexChart)->setType('line')
            ->setTitle('Monthly Vehicle Usage')
            ->setSubtitle('Monthly Data')
            ->setXAxis($months)
            ->setDataset([
                [
                    'name' => 'Completed Bookings',
                    'data' => $data
                ]
            ]);

        return view('dashboard.dashboard', compact('chart'));
    }

    private function getCompletedBookingsData()
    {
        $currentYear = date('Y');

        $bookings = Booking::selectRaw('MONTH(start_date) as month, COUNT(*) as count')
            ->whereIn('status', ['completed', 'on_duty'])
            ->whereYear('start_date', $currentYear)
            ->groupBy('month')
            ->get();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = array_fill(0, 12, 0);

        foreach ($bookings as $booking) {
            $data[$booking->month - 1] = $booking->count;
        }

        return [$months, $data];
    }

}
