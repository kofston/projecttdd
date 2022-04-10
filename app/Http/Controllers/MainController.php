<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;
use Request;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function pre($string = '')
    {
        echo '<pre>' . print_r($string, TRUE) . '</pre>';
    }

    public function get_api($pln=NULL)
    {
        if(isset($pln))
        {
            $ch = curl_init("http://api.nbp.pl/api/exchangerates/tables/A/");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            try {
                $decode = json_decode($data);
                return $decode;
            }
            catch (Exception $e)
            {
                return 0;
            }
        }
        else
            return 0;
    }

    public function get_api_history()
    {
            $today = date('Y-m-d');
            $month_before = date('Y-m-d',strtotime('- 1 month'));

            $ch = curl_init("http://api.nbp.pl/api/exchangerates/tables/A/".$month_before."/".$today."");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            try {
                $decode = json_decode($data);
                return $decode;
            }
            catch (Exception $e)
            {
                return 0;
            }

    }
}
