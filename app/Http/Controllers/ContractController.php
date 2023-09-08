<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractModel;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contract=ContractModel::orderBy('id','desc')->paginate(10);
        return view('admin.Contract.index',['contract'=>$contract]);
    }


    public function destroy(string $id)
    {
        $contract= ContractModel::find($id);
        if(is_null($contract)){
            return view('admin.404');
        }
        $contract->delete();
        return back();
    }
}
