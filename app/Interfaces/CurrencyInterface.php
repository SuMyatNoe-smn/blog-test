<?php

namespace App\Interfaces;

use App\Http\Requests\CurrencyRequest;

interface CurrencyInterface
{
    /**
     * Get all currency
     * 
     * @method  GET api/currency
     * @access  public
     */
    public function getAllCurrency();

    /**
     * Get Currency By ID
     * 
     * @param   integer     $id
     * 
     * @method  GET api/currency/{id}
     * @access  public
     */
    // public function getCurrencyById($id);

    /**
     * Get Currency By Bank_id
     * 
     * @param   integer     $bank_id
     * 
     * @method  GET api/currency/{bank_id}
     * @access  public
     */
    public function getCurrencyByBankId($bank_id);

    /**
     * Create | Update Currency
     * 
     * @param   \App\Http\Requests\CurrencyRequest    $request
     * @param   integer                           $id
     * 
     * @method  POST    api/currency       For Create
     * @method  PUT     api/currency/{id}  For Update     
     * @access  public
     */
    public function requestCurrency(CurrencyRequest $request, $id = null);

    /**
     * Delete Currency
     * 
     * @param   integer     $id
     * 
     * @method  DELETE  api/currency/{id}
     * @access  public
     */
    public function deleteCurrency($id);
}