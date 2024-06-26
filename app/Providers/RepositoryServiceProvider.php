<?php

namespace App\Providers;

use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Interfaces\doctorDashboard\DiagnosticRepositoryInterface;
use App\Interfaces\doctorDashboard\InvoiceRepositoryInterface as DoctorDashboardInvoiceRepositoryInterface;
use App\Interfaces\doctorDashboard\LaboratoryRepositoryInterface;
use App\Interfaces\doctorDashboard\RayRepositoryInterface;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Interfaces\Invoices\InvoiceRepositoryInterface;
use App\Interfaces\Labs\LabInfoRepositoryInterface;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Interfaces\Payments\PaymentRepositoryInterface;
use App\Interfaces\Rays\RayInfoRepositoryInterface;
use App\Interfaces\Receipts\ReceiptRepositoryInterface;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Interfaces\doctorDashboard\Services\ServiceRepositoryInterface;
use App\Interfaces\Medicines\MedicineRepositoryInterface;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Repository\Categories\CategoryRepository;
use App\Repository\doctorDashboard\DiagnosticRepository;
use App\Repository\doctorDashboard\InvoiceRepository as DoctorDashboardInvoiceRepository;
use App\Repository\doctorDashboard\LaboratoryRepository;
use App\Repository\doctorDashboard\RayRepository;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Insurances\InsuranceRepository;
use App\Repository\Invoices\InvoiceRepository;
use App\Repository\Labs\LabInfoRepository;
use App\Repository\Patients\PatientRepository;
use App\Repository\Payments\PaymentRepository;
use App\Repository\Rays\RayInfoRepository;
use App\Repository\Receipts\ReceiptRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\doctorDashboard\Services\ServiceRepository;
use App\Repository\Medicines\MedicineRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);

        
        // Doctor
        $this->app->bind(DoctorDashboardInvoiceRepositoryInterface::class, DoctorDashboardInvoiceRepository::class);
        $this->app->bind(DiagnosticRepositoryInterface::class, DiagnosticRepository::class);
        $this->app->bind(RayRepositoryInterface::class, RayRepository::class);
        $this->app->bind(LaboratoryRepositoryInterface::class, LaboratoryRepository::class);

        // الاشعة
        $this->app->bind(RayInfoRepositoryInterface::class, RayInfoRepository::class);

        // التحاليل
        $this->app->bind(LabInfoRepositoryInterface::class, LabInfoRepository::class);

        // الصيدلية
        $this->app->bind(MedicineRepositoryInterface::class, MedicineRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
