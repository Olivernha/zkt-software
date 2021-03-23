<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class ExpenseController extends Controller
{
    protected $route='components/stock/expense/';

    public function index()
    {
        //
        $expense = Expense::withoutTrashed()->paginate(15);
        return Inertia::render($this->route.'index',['expense'=> $expense]);
    }


    public function create()
    {
        return Inertia::render($this->route.'create');
    }

    public function store(Request $request)
    {
        //
        $expense = new Expense;
        $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->expense_date = $request->expense_date;

        $expense->save();
        return redirect()->route('expense.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $expense = DB::table('expenses')->where('id',$id)->first();
        return Inertia::render($this->route.'edit',['expense'=>$expense]);
    }

    public function update(Request $request, $id)
    {
        //
        $data = array();
        $data['details'] =  $request->details;
        $data['amount'] =  $request->amount;
        $data['expense_date']=$request->expense_date;
        DB::table('expenses')->where('id',$id)->update($data);
        return redirect()->route('expense.index');
    }

    public function destroy($id)
    {
        DB::table('expenses')->where('id',$id)->delete();
        return redirect()->route('expense.index');
    }
}
