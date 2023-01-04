<?php

namespace App\Http\Controllers;

use App\Helpers\Human;
use Illuminate\Http\Request;
use Modules\Employee\Models\Attendance;
use Modules\Employee\Models\Salary;
use Modules\Master\Models\Warehouse;
use Modules\Transaction\Models\Finance;
use Modules\Transaction\Models\IncomingWood;
use Modules\Transaction\Models\OutcomingWood;
use Illuminate\Support\Facades\Hash;
use Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return view('home',$data);
    }

    public function getData(Request $request)
    {
        $filter_warehouse = $request->filter_warehouse;
        $filter_date = $request->filter_date;
        $filter_date_start = $request->filter_date_start;
        $filter_date_end = $request->filter_date_end;

        $count_attendances = 0;
        $count_incomingWoods = 0;
        $count_incomingWoodTrades = 0;
        $count_outcomingWoods = 0;
        $total_salaries = 0;
        $total_incomes = 0;
        $total_expenses = 0;

        $count_attendances = Attendance::select('id');
        $count_incomingWoods = IncomingWood::select('id')->where('type', 1);
        $count_incomingWoodTrades = IncomingWood::select('id')->where('type', 2);
        $count_outcomingWoods = OutcomingWood::select('id');
        $total_salaries = Salary::select('id');
        $total_incomes = Finance::select('id')->where('type', 0);
        $total_expenses = Finance::select('id')->where('type', 1);

        
        if ($filter_warehouse != null) {
            $count_attendances->where('warehouse_id', $filter_warehouse);
            $count_incomingWoods->where('warehouse_id', $filter_warehouse);
            $count_incomingWoodTrades->where('warehouse_id', $filter_warehouse);
            $count_outcomingWoods->where('warehouse_id', $filter_warehouse);
            $total_salaries->where('warehouse_id', $filter_warehouse);
            $total_incomes->where('warehouse_id', $filter_warehouse);
            $total_expenses->where('warehouse_id', $filter_warehouse);
        }

        if ($filter_date_start != null && $filter_date_end != null) {
            $count_attendances->whereBetween('check_in', [$filter_date_start, $filter_date_end]);
            $count_incomingWoods->whereBetween('date', [$filter_date_start, $filter_date_end]);
            $count_incomingWoodTrades->whereBetween('date', [$filter_date_start, $filter_date_end]);
            $count_outcomingWoods->whereBetween('date', [$filter_date_start, $filter_date_end]);
            $total_salaries->whereBetween('date', [$filter_date_start, $filter_date_end]);
            $total_incomes->whereBetween('date', [$filter_date_start, $filter_date_end]);
            $total_expenses->whereBetween('date', [$filter_date_start, $filter_date_end]);
        } else {
            if ($filter_date == 'day') {
                $count_attendances->whereDate('check_in', date('Y-m-d'));
                $count_incomingWoods->whereDate('date', date('Y-m-d'));
                $count_incomingWoodTrades->whereDate('date', date('Y-m-d'));
                $count_outcomingWoods->whereDate('date', date('Y-m-d'));
                $total_salaries->whereDate('date', date('Y-m-d'));
                $total_incomes->whereDate('date', date('Y-m-d'));
                $total_expenses->whereDate('date', date('Y-m-d'));
            } elseif ($filter_date == 'week') {
                $count_attendances->whereBetween('check_in', [date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week'))]);
                $count_incomingWoods->whereBetween('date', [date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week'))]);
                $count_incomingWoodTrades->whereBetween('date', [date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week'))]);
                $count_outcomingWoods->whereBetween('date', [date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week'))]);
                $total_salaries->whereBetween('date', [date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week'))]);
                $total_incomes->whereBetween('date', [date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week'))]);
                $total_expenses->whereBetween('date', [date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week'))]);
            } elseif ($filter_date == 'month') {
                $count_attendances->whereMonth('check_in', date('m'));
                $count_incomingWoods->whereMonth('date', date('m'));
                $count_incomingWoodTrades->whereMonth('date', date('m'));
                $count_outcomingWoods->whereMonth('date', date('m'));
                $total_salaries->whereMonth('date', date('m'));
                $total_incomes->whereMonth('date', date('m'));
                $total_expenses->whereMonth('date', date('m'));

                $count_attendances->whereYear('check_in', date('Y'));
                $count_incomingWoods->whereYear('date', date('Y'));
                $count_incomingWoodTrades->whereYear('date', date('Y'));
                $count_outcomingWoods->whereYear('date', date('Y'));
                $total_salaries->whereYear('date', date('Y'));
                $total_incomes->whereYear('date', date('Y'));
                $total_expenses->whereYear('date', date('Y'));
            } elseif ($filter_date == 'year') {
                $count_attendances->whereYear('check_in', date('Y'));
                $count_incomingWoods->whereYear('date', date('Y'));
                $count_incomingWoodTrades->whereYear('date', date('Y'));
                $count_outcomingWoods->whereYear('date', date('Y'));
                $total_salaries->whereYear('date', date('Y'));
                $total_incomes->whereYear('date', date('Y'));
                $total_expenses->whereYear('date', date('Y'));
            }
        }

        $count_attendances = $count_attendances->count();
        $count_incomingWoods = $count_incomingWoods->count();
        $count_incomingWoodTrades = $count_incomingWoodTrades->count();
        $count_outcomingWoods = $count_outcomingWoods->count();
        $total_salaries = $total_salaries->sum('total');
        $total_incomes = $total_incomes->sum('amount');
        $total_expenses = $total_expenses->sum('amount');

        $data = [
            'count_attendances' => $count_attendances. ' Orang',
            'count_incomingWoods' => $count_incomingWoods. ' Transaksi',
            'count_incomingWoodTrades' => $count_incomingWoodTrades. ' Transaksi',
            'count_outcomingWoods' => $count_outcomingWoods. ' Transaksi',
            'count_salaries' => 'Rp '. Human::createFormatRupiah($total_salaries),
            'count_incomes' => 'Rp '. Human::createFormatRupiah($total_incomes),
            'count_expenses' => 'Rp '. Human::createFormatRupiah($total_expenses),
        ];

        return json_encode($data);
    }

    public function profile()
    {
        $user = \Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $current_password = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $current_password)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            Flash::success('Password berhasil diubah');
            return redirect(route('profile'));
        } else {
            Flash::error('Password lama tidak sesuai');
            return redirect(route('profile'));
        }
    }
}
