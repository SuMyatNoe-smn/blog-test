<?php

namespace App\Http\Controllers\API;

use App\Repositories\BankRepository;
use App\Repositories\CurrencyRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    protected $bankRepository;
    protected $currencyRepository;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(BankRepository $bankRepository, CurrencyRepository $currencyRepository)
    {
        $this->bankRepository = $bankRepository;
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $this->bankRepository->getAll();
        // $banks = $this->bankRepository->getAll();
        // return view('index', compact('banks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->bankRepository->getById($id);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $bid
     * @return \Illuminate\Http\Response
     */
    public function displayCurrency($bid)
    {
        return $this->currencyRepository->getCurrencyByBankId($bid);
    }
}