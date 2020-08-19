<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use DB;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Returning all users
        return response()->json([
            'message' => 'Banks',
            'code' => 200,
            'error' => false,
            'results' =>  Bank::get()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the forms
        $this->validate($request, [
            'bank_name' => 'required|max:200'
        ]);

        DB::beginTransaction();   
        try {
            $newBank = new Bank;
            $newBank->bank_name = $request->bank_name;
            $newBank->url = $request->bank_name;
            $newBank->fetch_status = $request->fetch_status;
            $newBank->fetch_name = $request->fetch_name;
            $newBank->save();

            DB::commit();
            return response()->json([
                'message' => 'Bank created',
                'code' => 200,
                'error' => false,
                'results' => $newBank
            ], 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::find($id);

        // Check bank
        if(!$bank) return response()->json(['message' => 'No bank found'], 404);

        return response()->json([
            'message' => 'Bank detail',
            'code' => 200,
            'error' => false,
            'results' => $bank
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the forms
        $this->validate($request, [
            'bank_name' => 'required|max:200'. $id
        ]);

        DB::beginTransaction();
        try {
            $bank = Bank::find($id);

            // Check user
            if(!$bank) return response()->json(['message' => 'No bank found'], 404);

            // Update
            $bank->bank_name    = $request->bank_name;
            $bank->url          = $request->bank_name;
            $bank->fetch_status = $request->fetch_status;
            $bank->fetch_name   = $request->fetch_name;
            $bank->save();

            DB::commit();
            return response()->json([
                'message' => 'Bank updated',
                'code' => 200,
                'error' => false,
                'results' => $bank
            ], 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $bank = Bank::find($id);

            // Check bank
            if(!$bank) return response()->json(['message' => 'No bank found'], 404);

            // Delete bank
            $bank->delete();

            DB::commit();
            return response()->json([
                'message' => 'Bank deleted',
                'code' => 200,
                'error' => false,
                'results' => $bank
            ], 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        }
    }
}