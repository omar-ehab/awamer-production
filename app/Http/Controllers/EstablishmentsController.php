<?php

namespace App\Http\Controllers;

use App\AdministrativeArea;
use App\Contract;
use App\ContractTerm;
use App\Establishment;
use App\EstablishmentType;
use App\Jobs\SendEmailJob;
use App\Notifications\createNewEstablishments;
use App\PrivacyPolicy;
use App\Role;
use App\User;
use Exception;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Image; //i have make it as a shortcut in aliases
// an error appeared correct path is Intervention\Image\ImageManagerStatic

class EstablishmentsController extends Controller
{
    private $permissions = [
        'read-donor',
        'create-donor',
        'update-donor',
        'delete-donor',
        'read-bankAccount',
        'create-bankAccount',
        'update-bankAccount',
        'delete-bankAccount',
        'read-contract',
        'read-establishment',
        'read-interval',
        'create-interval',
        'update-interval',
        'delete-interval',
        'read-sanad',
        'create-sanad',
        'create-operation',
        'read-operation',
        'create-report',
        'read-report',
        'update-report',
        'delete-report',
    ];

    public function __construct()
    {
        $this->middleware('role:super_admin|admin')->only('index');
        $this->middleware('permission:create-establishment')->only('create');
        $this->middleware('permission:create-establishment')->only('store');
        $this->middleware('permission:read-establishment')->only('show');
        $this->middleware('permission:update-establishment')->only('edit');
        $this->middleware('permission:update-establishment')->only('update');
        $this->middleware('permission:delete-establishment')->only('destroy');
    }

    public function registerNewEstablishment()
    {
        $administrativeAreas = AdministrativeArea::all();
        $establishmentTypes = EstablishmentType::all();
        return view('auth.register', compact('administrativeAreas', 'establishmentTypes'));
    }

    public function storeNewEstablishment(Request $request)
    {
        if($request['accept'] != 'on')
        {
            return redirect('/register')->with('data', ['alert'=>'برجاء الموافقة علي الشروط والأحكام','alert-type'=>'danger']);
        }
        $this->validate($request, [
            'establishment_type_id' => 'required|integer',
            'administrative_area_id' => 'required|integer',
            'name' => 'required|string',
            'representative_name' => 'required|string',
            'mobile' => 'required|digits:12',
            'address' => 'required|string',
            'logo' => 'image|mimes:jpeg,jpg,png|max:512', // max 512Kb
            'email' => 'required|email|unique:users',
            'username' => 'required|string',
            'password' => 'required|string|min:8',
            'c_password' => 'required|string|min:8|same:password',
        ]);

        if($request->hasFile('logo'))
        {
            $img_name = time() . '.' . $request->logo->getClientOriginalExtension();
            Image::make($request['logo'])->resize(150,null ,function ($constraint) {
                $constraint->aspectRatio();
            })
                ->encode('jpg',75)
                ->save(public_path('images/establishment\\' . $img_name));

            $establishment = Establishment::create([
                'establishment_type_id' => $request['establishment_type_id'],
                'administrative_area_id' => $request['administrative_area_id'],
                'name' => $request['name'],
                'representative_name' => $request['representative_name'],
                'mobile' => $request['mobile'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'kalesha' => $request['kalesha'],
                'logo' => 'images/establishment/' . $img_name
            ]);
        }
        else
        {
            $establishment = Establishment::create([
                'establishment_type_id' => $request['establishment_type_id'],
                'administrative_area_id' => $request['administrative_area_id'],
                'name' => $request['name'],
                'representative_name' => $request['representative_name'],
                'mobile' => $request['mobile'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'kalesha' => $request['kalesha'],
            ]);
        }
        $user = User::create([
            'name' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'establishment_id' => $establishment->id
        ]);

        $superAdminRole = Role::where('name', 'super_admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $superAdmins = $superAdminRole->users;
        $admins = $adminRole->users;
        $users = $superAdmins->merge($admins);
        Notification::send($users, new createNewEstablishments($establishment));
        return redirect('/register')->with('data', ['alert'=>'تم إضافة الجهة بنجاح بأنتظار موافقه المنصة!','alert-type'=>'success']);
    }

    public function unapprovedIndex()
    {
        if(auth()->user()->hasRole(['admin', 'super_admin']))
        {
            $establishments = Establishment::where('approved', 0)->get();
            $establishments = $establishments->filter(function($establishment) {
                return $establishment->id != 1;
            });
            return view('establishments.unapproved-index', compact('establishments')); //dont forget to put paginate if needed
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function approve(Request $request)
    {
        $approve_template = "مرحباً بكم في منصة الأوامر المستديمة \n لقد تمت الموافقة علي طلب انضمامكم للمنصه بنجاح\n برجاء التواصل مع المنصه في اقرب وقت";
        if (auth()->user()->can('update-establishment'))
        {
            $request['percentage'] = $this->boolConvert($request['percentage']);
            $this->validate($request, [
                'establishment_id' => 'required|integer',
                'percentage' => 'required|boolean',
                'value' => "required|numeric",
            ]);
            $establishment = Establishment::find($request['establishment_id']);
            $contract = Contract::create([
                'establishment_id' => $establishment->id,
                'percentage' => $request['percentage'],
                'value' => abs(doubleval($request['value']))
            ]);

            $contractTerms = ContractTerm::all();
            $contract->terms()->sync($contractTerms);
            $user = $establishment->user;
            $user->syncPermissions($this->permissions);
            $establishment->update(['approved' => 1]);
            $details['email'] = $establishment->user->email;
            $details['message'] = $approve_template;
            $this->dispatch(new SendEmailJob($details));
            return redirect('/unapproved-establishments')->with('data', ['alert'=>'تم إضافة الجهة بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function index()
    {
        if(auth()->user()->hasRole(['admin', 'super_admin']))
        {
            $establishments = Establishment::where('approved', 1)->get();
            $establishments = $establishments->filter(function($establishment) {
                return $establishment->id != 1;
            });
            return view('establishments.index', compact('establishments')); //dont forget to put paginate if needed
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(auth()->user()->can('create-establishment'))
        {
            $administrativeAreas = AdministrativeArea::all();
            $establishmentTypes = EstablishmentType::all();
            return view('establishments.create', compact('administrativeAreas', 'establishmentTypes')); //create :) => copy sometimes is a bad choise
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $approve_template = "مرحباً بكم في منصة الأوامر المستديمة \n لقد تمت تسجيل الجهة في المنصه بنجاح";
        if (auth()->user()->can('create-establishment'))
        {
            $request['percentage'] = $this->boolConvert($request['percentage']);
            $this->validate($request, [
                'establishment_type_id' => 'required|integer',
                'administrative_area_id' => 'required|integer',
                'name' => 'required|string',
                'representative_name' => 'required|string',
                'mobile' => 'required|digits:12',
                'address' => 'required|string',
                'percentage' => 'required|boolean',
                'value' => "required|numeric",
                'logo' => 'mimes:jpeg,jpg,png|max:512', // max 512Kb
                'email' => 'required|email|unique:users',
                'username' => 'required|string',
                'password' => 'required|string|min:8',
                'c_password' => 'required|string|min:8|same:password'
            ]);

            if($request->hasFile('logo'))
            {
                $img_name = time() . '.' . $request->logo->getClientOriginalExtension();
                Image::make($request['logo'])->resize(150,null ,function ($constraint) {
                    $constraint->aspectRatio();
                })
                    ->encode('jpg',75)
                    ->save(public_path('images/establishment\\' . $img_name));

                $establishment = Establishment::create([
                    'establishment_type_id' => $request['establishment_type_id'],
                    'administrative_area_id' => $request['administrative_area_id'],
                    'name' => $request['name'],
                    'representative_name' => $request['representative_name'],
                    'mobile' => $request['mobile'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'kalesha' => $request['kalesha'],
                    'logo' => 'images/establishment/' . $img_name,
                    'approved' => true,
                ]);
            }
            else
            {
                $establishment = Establishment::create([
                    'establishment_type_id' => $request['establishment_type_id'],
                    'administrative_area_id' => $request['administrative_area_id'],
                    'name' => $request['name'],
                    'representative_name' => $request['representative_name'],
                    'mobile' => $request['mobile'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'kalesha' => $request['kalesha'],
                    'approved' => true,
                ]);
            }
            $user = User::create([
                'name' => $request['username'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'establishment_id' => $establishment->id
            ]);
            $contract = Contract::create([
                'establishment_id' => $establishment->id,
                'percentage' => $request['percentage'],
                'value' => abs(doubleval($request['value']))
            ]);

            $contractTerms = ContractTerm::all();
            //sync terms with contract
            $contract->terms()->sync($contractTerms);

            $user->syncPermissions($this->permissions);
            $details['email'] = $user->email;
            $details['message'] = $approve_template;
            $this->dispatch(new SendEmailJob($details));
            return redirect('/establishments')->with('data', ['alert'=>'تم إضافة الجهة بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Establishment  $establishment
     * @return Response
     */
    public function show(Establishment $establishment)
    {
        if((auth()->user()->can('read-establishment') && $establishment['id'] === auth()->user()->establishment_id) || auth()->user()->hasRole(['super_admin', 'admin']))
        {
            return view('establishments.show', compact('establishment'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Establishment $establishment
     * @return Response
     */
    public function edit(Establishment $establishment)
    {
        if((auth()->user()->can('update-establishment') && $establishment['id'] === auth()->user()->establishment_id) || auth()->user()->hasRole(['super_admin', 'admin']))
        {
            $administrativeAreas = AdministrativeArea::all();
            $establishmentTypes = EstablishmentType::all();
            return view('establishments.edit', compact('establishment', 'administrativeAreas', 'establishmentTypes'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function update(Request $request, Establishment $establishment)
    {
        if((auth()->user()->can('update-establishment') && $establishment['id'] === auth()->user()->establishment_id) || auth()->user()->hasRole(['super_admin', 'admin']))
        {
            $this->validate($request, [
                'establishment_type_id' => 'required|integer',
                'administrative_area_id' => 'required|integer',
                'name' => 'required|string',
                'representative_name' => 'required|string',
                'mobile' => 'required|digits:12',
                'address' => 'required|string',
                'logo' => 'mimes:jpeg,jpg,png|max:512', // max 512Kb
            ]);

            if($request->hasFile('logo'))
            {
                Storage::delete($establishment->logo);
                $img_name = time() . '.' . $request->logo->getClientOriginalExtension();
                Image::make($request->logo)->resize(150,null ,function ($constraint) {
                    $constraint->aspectRatio();
                })
                    ->encode('jpg',75)
                    ->save(public_path('images/establishment/' . $img_name));
                $establishment->update([
                    'establishment_type_id' => $request['establishment_type_id'],
                    'administrative_area_id' => $request['administrative_area_id'],
                    'name' => $request['name'],
                    'representative_name' => $request['representative_name'],
                    'mobile' => $request['mobile'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'kalesha' => $request['kalesha'],
                    'logo' => 'images/establishment/' . $img_name
                ]);
            }
            else
            {
                $establishment->update([
                    'establishment_type_id' => $request['establishment_type_id'],
                    'administrative_area_id' => $request['administrative_area_id'],
                    'name' => $request['name'],
                    'representative_name' => $request['representative_name'],
                    'mobile' => $request['mobile'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'kalesha' => $request['kalesha'],
                ]);
            }

            $establishment->contract()->update([
                'percentage' => $this->boolConvert($request['percentage']),
                'value' => abs(doubleval($request['value']))
            ]);

            return redirect('/establishments')->with('data', ['alert'=>'تم تحديث الجهة بنجاح','alert-type'=>'success']);

        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Establishment $establishment
     * @return Response
     * @throws Exception
     */
    public function destroy(Establishment $establishment)
    {
        if(auth()->user()->can('delete-establishment'))
        {
            try {
                if($establishment->logo != null)
                {
                   Storage::delete($establishment->logo);
                }
                $user = $establishment->user;
                $bankAccounts = $establishment->bankAccounts;
                $donors = $establishment->donors;
                foreach($donors as $donor)
                {
                    dd($donor);
                }
                $user->delete();
                $establishment->contract()->delete();
                $establishment->delete();
            } catch (Exception $e) {
                throw $e;
            }
            return redirect('/establishments')->with('data', ['alert'=>'تم حذف الجهة بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function editSingleEstablishment(Establishment $establishment)
    {
        if($establishment['id'] === auth()->user()->establishment_id)
        {
            $administrativeAreas = AdministrativeArea::all();
            $establishmentTypes = EstablishmentType::all();
            return view('establishments.edit-single', compact('establishment', 'administrativeAreas', 'establishmentTypes'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
    public function updateSingleEstablishment(Request $request, Establishment $establishment)
    {
        if($establishment['id'] === auth()->user()->establishment_id)
        {
            $this->validate($request, [
                'establishment_type_id' => 'required|integer',
                'administrative_area_id' => 'required|integer',
                'name' => 'required|string',
                'representative_name' => 'required|string',
                'mobile' => 'required|digits:12',
                'address' => 'required|string',
                'logo' => 'mimes:jpeg,jpg,png|max:512', // max 512Kb
            ]);

            if($request->hasFile('logo'))
            {
                Storage::delete($establishment->logo);
                $img_name = time() . '.' . $request->logo->getClientOriginalExtension();
                Image::make($request->logo)->resize(150,null ,function ($constraint) {
                    $constraint->aspectRatio();
                })
                    ->encode('jpg',75)
                    ->save(public_path('images/establishment/' . $img_name));
                $establishment->update([
                    'establishment_type_id' => $request['establishment_type_id'],
                    'administrative_area_id' => $request['administrative_area_id'],
                    'name' => $request['name'],
                    'representative_name' => $request['representative_name'],
                    'mobile' => $request['mobile'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'kalesha' => $request['kalesha'],
                    'logo' => 'images/establishment/' . $img_name
                ]);
            }
            else
            {
                $establishment->update([
                    'establishment_type_id' => $request['establishment_type_id'],
                    'administrative_area_id' => $request['administrative_area_id'],
                    'name' => $request['name'],
                    'representative_name' => $request['representative_name'],
                    'mobile' => $request['mobile'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'kalesha' => $request['kalesha'],
                ]);
            }

            return redirect(route('editSingleEstablishment', $establishment->id))->with('data', ['alert'=>'تم تحديث الجهة بنجاح','alert-type'=>'success']);

        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function activeSms(Establishment $establishment)
    {
        if(auth()->user()->hasRole(['super_admin', 'admin']))
        {
            $establishment->update([
                'send_sms' => true
            ]);
            return redirect('/establishments')->with('data', ['alert'=>'تم تفعيل الرسائل للجهه بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function deactivateSms(Establishment $establishment)
    {
        if(auth()->user()->hasRole(['super_admin', 'admin']))
        {
            $establishment->update([
                'send_sms' => false
            ]);
            return redirect('/establishments')->with('data', ['alert'=>'تم إيقاف الرسائل للجهه بنجاح','alert-type'=>'success']);

        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }
    public function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('auth.privacy', compact('privacyPolicy'));
    }

    private function boolConvert($boolean)
    {
        if($boolean == "true")
        {
            return 1;
        } elseif ($boolean == "false")
        {
            return 0;
        }
        return null;
    }
}
