<?php

namespace App\Repositories;

use App\Http\Requests\CurrencyRequest;
use App\Traits\ResponseAPI;
use App\Models\Currency;
use App\Repositories\BaseRepository;

class CurrencyRepository extends BaseRepository
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    protected $model;

    public function __construct(Currency $model)
    {
        $this->model = $model;
    }

    public function getCurrencyByBankId($bank_id)
    {
        try {
            $currency = $this->model->where('bank_id', $bank_id)->get();
            // Check the currency
            if(!$currency) return $this->error("No currency with bankId $bank_id", 404);

            return $this->success("All currencies by Bank_Id", $currency);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
    public function requestCurrency(CurrencyRequest $request, $id = null)
    { 
        try {
            // If currency exists when we find it
            // Then update the currency
            // Else create the new one.
            $currency = $id ? Currency::find($id) : new Currency;
            // Check the currency 
            if($id && !$currency) return $this->error("No currency with ID $id", 404);
           
            $currency->bank_id =$request->bank_id;
            $currency->currency_name = $request->currency_name;
            $currency->buy_rate = $request->buy_rate;
            $currency->sell_rate = $request->sell_rate;

            // Save the currency
            $currency->save();

            return $this->success(
                $id ? "Currency updated"
                    : "Currency created",
                $currency, $id ? 200 : 201);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}