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

    public function toword($pln=NULL,$type=NULL)
    {
        if(isset($pln))
        {
            $kw  = $pln = str_replace('.',',',$pln);
            $l_pad=$kw_slow=$kw_w='';
            $t_a = array('','sto','dwieście','trzysta','czterysta','pięćset','sześćset','siedemset','osiemset','dziewięćset');
            $t_b = array('','dziesięć','dwadzieścia','trzydzieści','czterdzieści','pięćdziesiąt','sześćdziesiąt','siedemdziesiąt','osiemdziesiąt','dziewięćdziesiąt');
            $t_c = array('','jeden','dwa','trzy','cztery','pięć','sześć','siedem','osiem','dziewięć');
            $t_d = array('dziesięć','jedenaście','dwanaście','trzynaście','czternaście','piętnaście','szesnaście','siednaście','osiemnaście','dziewiętnaście');
            $t_kw_15 = array('septyliard','septyliardów','septyliardy');
            $t_kw_14 = array('septylion','septylionów','septyliony');
            $t_kw_13 = array('sekstyliard','sekstyliardów','sekstyliardy');
            $t_kw_12 = array('sekstylion','sekstylionów','sepstyliony');
            $t_kw_11 = array('kwintyliard','kwintyliardów','kwintyliardy');
            $t_kw_10 = array('kwintylion','kwintylionów','kwintyliony');
            $t_kw_9 = array('kwadryliard','kwadryliardów','kwaryliardy');
            $t_kw_8 = array('kwadrylion','kwadrylionów','kwadryliony');
            $t_kw_7 = array('tryliard','tryliardów','tryliardy');
            $t_kw_6 = array('trylion','trylionów','tryliony');
            $t_kw_5 = array('biliard','biliardów','biliardy');
            $t_kw_4 = array('bilion','bilionów','bilony');
            $t_kw_3 = array('miliard','miliardów','miliardy');
            $t_kw_2 = array('milion','milionów','miliony');
            $t_kw_1 = array('tysiąc','tysięcy','tysiące');
            switch($type)
            {
                case 1:
                    $t_kw_0 = array('dolar','dolarów','dolary');
                    break;
                case 2:
                    $t_kw_0 = array('euro','euro','euro');
                    break;
                case 3:
                    $t_kw_0 = array('funt','funtów','funty');
                    break;
                default:
                    $t_kw_0 = array('złoty','złotych','złote');
                    break;
            }

            if ($kw!='') {
                if(!is_numeric(str_replace(',','.',$pln)))
                    return "TO_NIE_LICZBA!";

                if($kw>0)
                {
                    $kw=(substr_count($kw,',')==0) ? $kw.',00':$kw;
                    $tmp=explode(",",$kw);
                    $ln=strlen($tmp[0]);
                    $tmp_a=($ln%3==0) ? (floor($ln/3)*3):((floor($ln/3)+1)*3);
                    for($i = $ln; $i < $tmp_a; $i++) {
                        $l_pad .= '0';
                        $kw_w = $l_pad . $tmp[0];
                    }
                    $kw_w=($kw_w=='') ? $tmp[0]:$kw_w;
                    $paczki=(strlen($kw_w)/3)-1;
                    $p_tmp=$paczki;
                    for($i=0;$i<=$paczki;$i++) {
                        $t_tmp='t_kw_'.$p_tmp;
                        $p_tmp--;
                        $p_kw=substr($kw_w,($i*3),3);
                        $kw_w_s=($p_kw[1]!=1) ? $t_a[$p_kw[0]].' '.$t_b[$p_kw[1]].' '.$t_c[$p_kw[2]]:$t_a[$p_kw[0]].' '.$t_d[$p_kw[2]];
                        if(($p_kw[0]==0)&&($p_kw[2]==1)&&($p_kw[1]<1)) $ka=${$t_tmp}[0]; //możliwe że $p_kw{1}!=1
                        else if (($p_kw[2]>1 && $p_kw[2]<5)&&$p_kw[1]!=1) $ka=${$t_tmp}[2];
                        else $ka=${$t_tmp}[1];
                        $kw_slow.=$kw_w_s.' '.$ka.' ';
                    }
                }
                else
                    return "ZERO";
            }
            $text = $kw_slow.' '.$tmp[1].'/100';
            return $text;
        }
        else
            return 0;
    }
}
