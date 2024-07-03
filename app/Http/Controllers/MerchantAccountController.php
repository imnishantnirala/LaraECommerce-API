<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MerchantAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MerchantAccountController extends Controller
{
    
    public function index()
    {
        try {
            $merchantAccounts = MerchantAccount::all();
            return response()->json(['success' => true, 'data' => $merchantAccounts], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'banking_id' => 'nullable|exists:bankings,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:merchant_accounts',
            'address' => 'required|string',
            // 'bank_account_name' => 'nullable|string|max:100|unique:merchant_accounts',
            'bank_account_number' => 'nullable|string|max:50|unique:merchant_accounts',
            'bank_branch_name' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:100',
            'balance' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $merchantAccount = MerchantAccount::create($request->all());
            return response()->json(['success' => true, 'data' => $merchantAccount], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $merchantAccount = MerchantAccount::findOrFail($id);
            return response()->json(['success' => true, 'data' => $merchantAccount], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'banking_id' => 'nullable|exists:bankings,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:merchant_accounts,slug,' . $id,
            'address' => 'required|string',
            'bank_account_name' => 'nullable|string|max:100|unique:merchant_accounts,bank_account_name,' . $id,
            'bank_account_number' => 'nullable|string|max:50|unique:merchant_accounts,bank_account_number,' . $id,
            'bank_branch_name' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:100',
            'balance' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $merchantAccount = MerchantAccount::findOrFail($id);
            $merchantAccount->update($request->all());
            return response()->json(['success' => true, 'data' => $merchantAccount], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $merchantAccount = MerchantAccount::findOrFail($id);
            $merchantAccount->delete();
            return response()->json(['success' => true, 'message' => 'Merchant account deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
