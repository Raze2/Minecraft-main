<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;

use App\Models\Ticket;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {


        $settings = array();
        $settings['user_number'] = User::where('player', 1)->count();
        $settings['tickets_number'] = Ticket::whereDate('created_at', '>', Carbon::now()->subDays(30))->count();
        $settings['orders_number'] = Order::where('status','sucess')->whereDate('created_at', '>', Carbon::now()->subDays(30))->count();
        $settings['orders_profits'] = Order::where('status','sucess')->whereDate('created_at', '>', Carbon::now()->subDays(30))->sum('order_price');


        $settings3 = [
            'chart_title'           => 'latest Players',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'email_verified_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '10',
            'fields'                => [
                'username' => '',
                'uuid'     => '',
            ],
            'translation_key' => 'user',
        ];

        $settings3['data'] = [];
        if (class_exists($settings3['model'])) {
            $settings3['data'] = $settings3['model']::where('player', 1)->latest()
                ->paginate($settings3['entries_number']);
        }

        if (!array_key_exists('fields', $settings3)) {
            $settings3['fields'] = [];
        }

        return view('home', compact('settings', 'settings3'));
    }
}
