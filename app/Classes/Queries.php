<?php

namespace App\Classes;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Support\Facades\Hash;

class Queries
{
    public static function addCustomer($data)
    {
        $customer = new Customer;
        $customer->first_name = $data->first_name;
        $customer->last_name = $data->last_name;
        $customer->marital_status = $data->marital_status;
        $customer->address = $data->address;
        $customer->phone_number = $data->phone_number;
        $customer->id_card = $data->id_card;
        $customer->email = $data->email;
        $customer->save();
    }

    public static function addLoanDetails($data)
    {
        $loan = new Loan;
        $loan->customer_id = $data->customer_id;
        $loan->principal = $data->principal;
        $loan->rate = $data->rate;
        $loan->time = $data->time;
        $loan->simple_interest = ($data->principal * ($data->rate / 100) * $data->time) + $data->principal;
        $loan->save();
    }

    public static function addAdmin($data)
    {
        $admin = new Admin;
        $admin->first_name = $data->first_name;
        $admin->last_name = $data->last_name;
        $admin->email = $data->email;
        $admin->password =  Hash::make('changemenow');
        $admin->save();
    }

    public static function findAdmin($email)
    {
        return Admin::where('email', $email)->first();
    }

    public static function getLoans()
    {
        $loans = Loan::join('customers', 'customers.id', 'loans.customer_id')
            ->orderBy('loans.created_at', 'desc')

            ->get();
        return $loans;
    }

    public static function customerList()
    {
        return Customer::orderBy('created_at', 'desc')->get();
    }
}
