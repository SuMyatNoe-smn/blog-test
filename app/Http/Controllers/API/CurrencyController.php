<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyRequest;
use App\Repositories\CurrencyRepository;
use App\Repositories\BankRepository;

class CurrencyController extends Controller
{
    protected $currencyRepository;
    protected $bankRepository;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(CurrencyRepository $currencyRepository, BankRepository $bankRepository)
    {
        $this->currencyRepository = $currencyRepository;
        $this->bankRepository = $bankRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $this->currencyRepository->getAll();
        // $currencies = $this->currencyRepository->getAll();
        // $banks = $this->bankRepository->getAll();
        // return view('index', compact('currencies', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        return $this->currencyRepository->requestCurrency($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->currencyRepository->getById($id);
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
        return $this->currencyRepository->requestCurrency($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->currencyRepository->delete($id);
    }
}
