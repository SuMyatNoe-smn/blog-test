<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyRequest;
use App\Interfaces\CurrencyInterface;

class CurrencyController extends Controller
{
    protected $currencyInteface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(CurrencyInterface $currencyInteface)
    {
        $this->currencyInteface = $currencyInteface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->currencyInteface->getAllCurrency();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        return $this->currencyInteface->requestCurrency($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return $this->currencyInteface->getCurrencyById($id);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bank_id)
    {
        return $this->currencyInteface->getCurrencyByBankId($bank_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        return $this->currencyInteface->requestCurrency($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->currencyInteface->deleteCurrency($id);
    }
}
