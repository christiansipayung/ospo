<?php

namespace App\Http\Controllers;
use Gate;
use Illuminate\Http\Request;
use App\Purchase;
use App\Approval;
use Illuminate\Support\Facades\Auth;


class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function forms()
    {
        return view('purchaseOrders/createOrder');
    }

    public function index_user()
    {
        $id = Auth::User()->id;
        $orders = Purchase::with('status')->where('user_id', $id)->latest()->get();

        return view('purchaseOrders/index', [
         'orders' => $orders,
        ]);
    }

    public function index_p()
    {
        if(Gate::denies('manage-purchase-status'))
        {
            return redirect()->back();
        }
        $orders = Purchase::with('user')->latest()->get();
        return view('purchasing.purchaseOrders.index', [
            'orders' => $orders,
        ]);
    }

    public function store(Request $request)
    {
        $purchaseOrder = new Purchase();
        $purchaseOrder['user_id'] = Auth::id();
        $purchaseOrder['itemName'] = $request->get('itemName');
        $purchaseOrder['details'] = $request->get('details');
        $purchaseOrder['quantity'] = $request->get('quantity');
        $purchaseOrder['price'] = $request->get('price');
        $purchaseOrder['total'] = $request->get('quantity') * $request->get('price');
        $purchaseOrder['status_id'] = 1;

        if($purchaseOrder->save())
        {
            $lastID = $purchaseOrder->id;
            $approval = new Approval();
            $approval['po_id'] = $lastID;
            $approval->save();
            return redirect('/po')->with('msg', 'Order Placed!');
        }
    }

    public function edit(Purchase $id)
    {
        return view('purchaseOrders.editOrder', compact('id'));
    }

    public function update(Request $request, $id)
    {
        $order = Purchase::findOrFail($id);
        $orderUpdate = $request->all();
        $orderUpdate['itemName'] = $request->get('itemName');
        $orderUpdate['details'] = $request->get('details');
        $orderUpdate['quantity'] = $request->get('quantity');
        $orderUpdate['price'] = $request->get('price');
        $orderUpdate['total'] = $request->get('quantity') * $request->get('price');
        $order->update($orderUpdate);
        return redirect('po')->with('success', 'Order Updated!');
    }

    public function status_update(Request $request, $id)
    {
        $order = Purchase::findOrFail($id);
        $orderStatus = $request->all();
        $orderStatus['status_id'] = $request->get('status_id');
        $order->update($orderStatus);
        return redirect('po-p')->with('success', 'Status Updated!');
    }

    public function cancelOrder($id)
    {
        $order = Purchase::findOrFail($id);
        if($order)
        {
            $order->status_id = '5';
            $order->save();
        }
        return redirect('po')->with('msg', 'Order Canceled!');
    }
}
