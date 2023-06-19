<?php

namespace App\Http\Controllers;

use App\Models\PostponeApplication;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

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
        if (Auth::check()) {
            $id = Auth::id();
            $user = User::find($id);
            $role = $user->roles[0]['id'];
            $total_app = PostponeApplication::count();
            $app = PostponeApplication::all();
            $waiting_app = 0;
            $accepted_app = 0;
            $denine_app = 0;
            foreach ($app as $a){
                // if there is a field tat not have status &.. -> the app is still waiting
                if ($a->result == null)
                    $waiting_app += 1;
                // if there is a field all have status = 1 &.. -> the app is accepted
                elseif ($a->result == '1')
                    $accepted_app += 1;
                else
                    $denine_app += 1;
            }
            // --- thống kê theo năm học ---
            // lấy năm học
            $year = Carbon::now()->year;
            // Tìm collection id của năm có chứa năm hiện tại
            $years = Year::where('name', 'LIKE', '%'.$year.'%')->get();
            // lấy id bỏ vào mảng
            $ids_years = [];
            foreach ($years as $y){
                $ids_years[] = $y->id;
            }
            // Tìm collection id của năm gần năm hiện tại nhất
            $nearly_years = Year::where('name', 'LIKE', '%'.($year-2).'%')->get();
            // lấy id bỏ vào mảng
            $ids_nearly_years = [];
            foreach ($nearly_years as $y){
                $ids_nearly_years[] = $y->id;
            }
            // merge 2 array lại
            $merge_id_years = array_merge($ids_years, $ids_nearly_years);
            sort($merge_id_years);
            // tìm tất cả đơn có id năm nằm trong array tt tăng dần
//            $post_where = PostponeApplication::whereIn('year_id', $merge_id_years)
//                ->orderBy('id', 'ASC')->get();
//            dd($post_where) ;
            // số lượng đơn đc duyệt + theo hk1 + của 4 năm
            $first_acc = []; $sencound_acc = []; $third_acc = [];
            $first_de = []; $sencound_de = []; $third_de = [];
                // lấy từng id years ra so với year id ở vị trí i
            foreach ($merge_id_years as $year_id){
                $tem = PostponeApplication::where('year_id', $year_id)
                    ->where('result', '1')->where('semester_id', '1')->get();
                // đếm r đưa vào
                $first_acc[] = $tem->count();
                $tem = PostponeApplication::where('year_id', $year_id)
                    ->where('result', '1')->where('semester_id', '2')->get();
                // đếm r đưa vào
                $sencound_acc[] = $tem->count();
                $tem = PostponeApplication::where('year_id', $year_id)
                    ->where('result', '1')->where('semester_id', '3')->get();
                // đếm r đưa vào
                $third_acc[] = $tem->count();
                $tem = PostponeApplication::where('year_id', $year_id)
                    ->where('result', '0')->where('semester_id', '1')->get();
                // đếm r đưa vào
                $first_de[] = $tem->count();
                $tem = PostponeApplication::where('year_id', $year_id)
                    ->where('result', '0')->where('semester_id', '2')->get();
                // đếm r đưa vào
                $sencound_de[] = $tem->count();
                $tem = PostponeApplication::where('year_id', $year_id)
                    ->where('result', '0')->where('semester_id', '3')->get();
                // đếm r đưa vào
                $third_de[] = $tem->count();
                }
            $years_statistic_name = [];
            $years_statistic = Year::whereIn('id', $merge_id_years)->get();
            foreach ($years_statistic as $y){
                $years_statistic_name[] = $y->name;
            }
            $context = [
                'user' => $user,
                'total_app' => $total_app,
                'waiting_app' => $waiting_app,
                'accepted_app' => $accepted_app,
                'denine_app' => $denine_app,
                'role' => $role,
                'first_acc' => $first_acc,
                'sencound_acc' => $sencound_acc,
                'third_acc' => $third_acc,
                'first_de' => $first_de,
                'sencound_de' => $sencound_de,
                'third_de' => $third_de,
                'years_statistic_name' => $years_statistic_name
            ];
            return view('admin.layouts.home', $context);
        }else return view('login');
    }

}
