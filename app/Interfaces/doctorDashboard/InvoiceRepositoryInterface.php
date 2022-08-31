<?php

namespace App\Interfaces\doctorDashboard;

interface InvoiceRepositoryInterface
{
    public function index();
    public function complete();
    public function review();
}