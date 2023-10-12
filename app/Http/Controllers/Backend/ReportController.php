<?php

namespace App\Http\Controllers\Backend;

use DateTime;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * @access private
     * @routes /admin/all-reports
     * @method GET
     */
    public function allReports(){
        return view('admin.reports.all_report');
    }

    /**
     * @access private
     * @routes /search-by-date
     * @method GET
     */
    public function searchByDate(Request $request){
        $date = new DateTime($request->date);
        $date_format = $date->format('Y-m-d');
        $orders = Order::where('order_date', $date_format)->latest()->get();
        return view('admin.reports.report_show', compact('orders'));
    }

    /**
     * @access private
     * @routes /search-by-month
     * @method GET
     */
    public function searchByMonth(Request $request){
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('admin.reports.report_show', compact('orders'));
    }

    /**
     * @access private
     * @routes /search-by-year
     * @method GET
     */
    public function searchByYear(Request $request){
        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('admin.reports.report_show', compact('orders'));
    }
}
