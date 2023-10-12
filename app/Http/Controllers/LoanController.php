<?php

namespace App\Http\Controllers;

use App\Classes\Queries;
use App\Classes\Response;
use App\Http\Requests\AddLoanRequest;
use App\Http\Requests\RegisterCustomerRequest;
use Exception;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    //
    public function registerCustomer(RegisterCustomerRequest $request)
    {
        try {
            Queries::addCustomer($request);
            return Response::response(true, 'Customer registered successfully');
        } catch (Exception $ex) {
            return Response::response(false, 'Something went wrong');
            return $ex->getMessage();
        }
    }

    public function addLoan(AddLoanRequest $request)
    {
        try {
            Queries::addLoanDetails($request);
            return Response::response(true, 'Loan registered successfully');
        } catch (Exception $ex) {
            return Response::response(false, 'Something went wrong');
            return $ex->getMessage();
        }
    }

    public function getLoans()
    {
        return Queries::getLoans();
    }

    public function customerList()
    {
        return Queries::customerList();
    }
}
