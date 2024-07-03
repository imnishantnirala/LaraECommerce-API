<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    // Find an order by invoice number
    public function findByInvoiceNumber($invoice_number)
    {
        $order = Order::where('invoice_number', $invoice_number)->first();
        if ($order) {
            return response()->json($order, 200);
        }
        return response()->json(['error' => 'Order not found'], 404);
    }

    // Show all orders
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders, 200);
    }

    // Store a new order
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'invoice_number' => 'required|string|max:31|unique:orders',
            'total_price' => 'required|integer',
            'coupons' => 'nullable|string|max:50',
            'courier_services' => 'required|string|max:200',
            'status' => 'required|in:IN_CART,PENDING,SUCCESS,FAILED',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    // Show a specific order
    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            return response()->json($order, 200);
        }
        return response()->json(['error' => 'Order not found'], 404);
    }

    // Update an order
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes|exists:users,id',
            'invoice_number' => 'sometimes|string|max:31|unique:orders,invoice_number,' . $id,
            'total_price' => 'sometimes|integer',
            'coupons' => 'nullable|string|max:50',
            'courier_services' => 'sometimes|string|max:200',
            'status' => 'sometimes|in:IN_CART,PENDING,SUCCESS,FAILED',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $order->update($request->all());
        return response()->json($order, 200);
    }

    // Delete an order
    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $order->delete();
        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
