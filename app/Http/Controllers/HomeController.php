<?php

namespace App\Http\Controllers;

use App\AdministrativeArea;
use App\Bank;
use App\BankAccount;
use App\Branch;
use App\ContractTerm;
use App\Donor;
use App\Establishment;
use App\EstablishmentType;
use App\Interval;
use App\Operation;
use App\Role;
use App\SystemFee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $establishmentId = auth()->user()->establishment_id;

        $bankAccountsCount = BankAccount::where('establishment_id', $establishmentId)->count();

        $donorsCount = Donor::where('establishment_id', $establishmentId)->count();

        $branches = Branch::where('establishment_id', $establishmentId)->count();

        $qrCode_link = route('donors.establishment.create', $this->encrypt_decrypt('encrypt', $establishmentId));

        $manualOperations = Operation::where('establishment_id', $establishmentId)->where('type', 'manual')->count();

        $autoOperations = Operation::where('establishment_id', $establishmentId)->where('type', 'auto')->count();

        if(auth()->user()->hasRole(['super_admin', 'admin']))
        {
            $adminRole = Role::where('name', 'admin')->first();
            $userRole = Role::where('name', 'user')->first();
            $adminsCount = $adminRole->users->count();
            $usersCount = $userRole->users->count();
            $banksCount = Bank::count();
            $administrativeAreasCount = AdministrativeArea::count();
            $establishmentTypesCount = EstablishmentType::count();
            $adminDonorsCount = Donor::count();
            $establishmentsCount = Establishment::count();
            $intervalsCount = Interval::count();
            $contractTermsCount = ContractTerm::count();
            return view('index', compact(
                'adminsCount',
                'usersCount',
                'banksCount',
                'administrativeAreasCount',
                'establishmentTypesCount',
                'adminDonorsCount',
                'establishmentsCount',
                'contractTermsCount',
                'bankAccountsCount',
                'intervalsCount'
            ));
        }
        return view('index', compact(
            'bankAccountsCount',
            'donorsCount',
            'branches',
            'qrCode_link',
            'manualOperations',
            'autoOperations'
        ));
    }

    public function adminChartData()
    {
        $months = [
            'يناير',
            'فبراير',
            'مارس',
            'أبريل',
            'مايو',
            'يونيو',
            'يوليو',
            'أغسطس',
            'سبتمبر',
            'أكتوبر',
            'نوفمبر',
            'ديسمبر'
        ];
        $fees = array();
        $monthsInArabic = array();
        $startDate = Carbon::now()->month - 6;
        $endDate = Carbon::now()->month;
        $j = 6;
        for($i = $startDate -1; $i <$endDate - 1; $i++)
        {
            $startDay = Carbon::now()->subMonths($j)->firstOfMonth();
            $endDay = Carbon::now()->subMonths($j)->lastOfMonth();
            array_push($monthsInArabic, $months[$i]);
            $feesByMonth = SystemFee::where('fee_date', '>=', $startDay)->where('fee_date', '<=', $endDay)->sum('fee');
            array_push($fees, $feesByMonth);
            $j--;
        }
        return ['labels' => $monthsInArabic, 'fees' => $fees];
    }

    public function establishmentChartData()
    {
        $months = [
            'يناير',
            'فبراير',
            'مارس',
            'أبريل',
            'مايو',
            'يونيو',
            'يوليو',
            'أغسطس',
            'سبتمبر',
            'أكتوبر',
            'نوفمبر',
            'ديسمبر'
        ];
        $numbersOfOperationsPerMonth = array();
        $monthsInArabic = array();
        $startDate = Carbon::now()->month - 6;
        $endDate = Carbon::now()->month;
        $j = 6;
        for($i = $startDate -1; $i <$endDate - 1; $i++)
        {
            $startDay = Carbon::now()->subMonths($j)->firstOfMonth();
            $endDay = Carbon::now()->subMonths($j)->lastOfMonth();
            array_push($monthsInArabic, $months[$i]);
            $operationsByMonth = Operation::where('created_at', '>=', $startDay)->where('created_at', '<=', $endDay)->count();
            array_push($numbersOfOperationsPerMonth, $operationsByMonth);
            $j--;
        }
        return ['labels' => $monthsInArabic, 'operations' => $numbersOfOperationsPerMonth];
    }

    private function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = env('APP_KEY', "MJBvTfIqnX6fZXZOWRHYbpA1EBMDVvRN");
        $secret_iv = 'wNzeDKK1JQEebIwkpb2WNPABDYgvt5aj';
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}
