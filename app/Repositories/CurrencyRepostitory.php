<?php

namespace App\Repositories;

use App\Http\Requests\CurrencyRequest;
use App\Interfaces\CurrencyInterface;
use App\Traits\ResponseAPI;
use App\Models\Bank;
use App\Models\Currency;
use DB;
use Log;

class CurrencyRepository implements CurrencyInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllCurrency()
    {
        try {
            $currencies = Currency::all();
            return $this->success("All currencies", $currencies);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    // public function getCurrencyById($id)
    // {
    //     try {
    //         $currency = Currency::find($id);
            
    //         // Check the currency
    //         if(!$currency) return $this->error("No currency with ID $id", 404);

    //         return $this->success("Currency Detail", $currency);
    //     } catch(\Exception $e) {
    //         return $this->error($e->getMessage(), $e->getCode());
    //     }
    // }

    public function getCurrencyByBankId($bank_id)
    {
        try {
            $currency = Currency::where('bank_id', $bank_id)->get();
            // Check the currency
            if(!$currency) return $this->error("No currency with bankId $bank_id", 404);

            return $this->success("All currencies by Bank_Id", $currency);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
    public function requestCurrency(CurrencyRequest $request, $id = null)
    { 
        DB::beginTransaction();
        try {
            // If currency exists when we find it
            // Then update the currency
            // Else create the new one.
            $currency = $id ? Currency::find($id) : new Currency;
            // $bank = new Bank;
            // dd($currency);
            // Check the currency 
            if($id && !$currency) return $this->error("No currency with ID $id", 404);
           
            $currency->bank_id =$request->bank_id;
            $currency->currency_name = $request->currency_name;
            $currency->buy_rate = $request->buy_rate;
            $currency->sell_rate = $request->sell_rate;

            // Save the currency
            $currency->save();

            DB::commit();
            return $this->success(
                $id ? "Currency updated"
                    : "Currency created",
                $currency, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteCurrency($id)
    {
        DB::beginTransaction();
        try {
            $currency = Currency::find($id);

            // Check the currency
            if(!$currency) return $this->error("No currency with ID $id", 404);

            // Delete the currency
            $currency->delete();

            DB::commit();
            return $this->success("Currency deleted", $currency);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}