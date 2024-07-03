<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinanceController extends Controller
{
    public function index()
    {
        $finances = Finance::all();
        return response()->json($finances);
    }

    public function showByType($type)
    {
        $finances = Finance::where('type', $type)->get();
        return response()->json($finances);
    }

    public function showByStatus($status)
    {
        $finances = Finance::where('status', $status)->get();
        return response()->json($finances);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:DEBIT,KREDIT',
            'order_id' => 'nullable|string|max:31',
            'description' => 'required|string|max:200',
            'amount' => 'required|integer',
            'status' => 'required|in:PENDING,SUCCESS,ACCEPT,REJECT',
            'balance' => 'required|integer',
            'updated_by' => 'nullable|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $finance = Finance::create($request->all());
        return response()->json($finance, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:DEBIT,KREDIT',
            'order_id' => 'nullable|string|max:31',
            'description' => 'required|string|max:200',
            'amount' => 'required|integer',
            'status' => 'required|in:PENDING,SUCCESS,ACCEPT,REJECT',
            'balance' => 'required|integer',
            'updated_by' => 'nullable|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $finance = Finance::findOrFail($id);
        $finance->update($request->all());
        return response()->json($finance);
    }
}
