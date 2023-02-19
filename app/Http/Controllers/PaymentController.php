<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Interfaces\Payments\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payment;
    public function __construct(PaymentRepositoryInterface $payment)
    {
        $this->payment = $payment;
    }

    public function index()
    {
        return $this->payment->index();
    }
    public function create()
    {
        return $this->payment->create();
    }
    public function show($id)
    {
        return $this->payment->show($id);
    }
    public function store(PaymentRequest $request)
    {
        return $this->payment->store($request);
    }
    public function edit($id)
    {
        return $this->payment->edit($id);
    }
    public function update(PaymentRequest $request)
    {
        return $this->payment->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->payment->destroy($request);
    }
}
