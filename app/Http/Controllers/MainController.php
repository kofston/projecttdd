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

}
