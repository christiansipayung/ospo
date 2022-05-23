<?php

namespace App\Http\Controllers;

use App\Approval;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Gate;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFinance()
    {
        if(Gate::denies('approve-purchase-finance'))
        {
            return redirect()->back();
        }
        $approvals = DB::table('users')
                    ->join('purchase_orders','purchase_orders.user_id','=', 'users.id')
                    ->join('approvals','approvals.po_id','=', 'purchase_orders.id')
                    ->latest('approvals.id')->get();;
        return view('finance.approval.index',[
            'approvals' => $approvals
        ]);
    }

    public function f_approval(Request $request, $id)
    {
        $po = Approval::find($id);
        $approval['finance'] = $request->boolean('approval');
        if($approval['finance'] == 1)
        {
            $po->update($approval);
            $finance = Approval::find($id)->finance;
            $supervisor = Approval::find($id)->supervisor;

            if($finance == 1 && $supervisor == 1)
            {
                $order = Purchase::findOrFail($id);
                $orderStatus['status_id'] = 2;
                $order->update($orderStatus);
            }
            return redirect('/f/po/approval')->with('success', 'Order Approved!');
        }
        else
        {
            $po->update($approval);
            $order = Purchase::findOrFail($id);
            $orderStatus['status_id'] = 6;
            $order->update($orderStatus);
            return redirect('/f/po/approval')->with('msg', 'Order Declined!');
        }
    }

    public function showSupervisor()
    {
        if(Gate::denies('approve-purchase-supervisor'))
        {
            return redirect()->back();
        }
        $currentUser = Auth::user()->department_id;
        $approvals = DB::table('users')
            ->join('purchase_orders','purchase_orders.user_id','=', 'users.id')
            ->join('approvals','approvals.po_id','=', 'purchase_orders.id')
            ->where('users.department_id', '=', $currentUser)
            ->latest('approvals.id')->get();
        return view('supervisor.approval.index',[
            'approvals' => $approvals
        ]);
    }

    public function s_approval(Request $request, $id)
    {
        $po = Approval::find($id);
        $approval['supervisor'] = $request->boolean('approval');
        if($approval['supervisor'] == 1)
        {
            $po->update($approval);
            $supervisor = Approval::find($id)->supervisor;
            $finance = Approval::find($id)->finance;

            if($supervisor == 1 && $finance == 1)
            {
                $order = Purchase::findOrFail($id);
                $orderStatus['status_id'] = 2;
                $order->update($orderStatus);
            }
            return redirect('/s/po/approval')->with('success', 'Order Approved!');
        }
        else
        {
            $po->update($approval);
            $order = Purchase::findOrFail($id);
            $orderStatus['status_id'] = 6;
            $order->update($orderStatus);
            return redirect('/s/po/approval')->with('msg', 'Order Declined!');
        }
    }

}
