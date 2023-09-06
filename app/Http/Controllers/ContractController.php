<?php

namespace App\Http\Controllers;

use App\Models\ContractModel;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contract=ContractModel::all();
        return view('Admin.Contract.index',['contract'=>$contract]);
    }


    public function destroy(string $id)
    {
        $contract= ContractModel::find($id);
        if(is_null($contract)){
            return view('Admin.404');
        }
        $contract->delete();
        return back();
    }
}
