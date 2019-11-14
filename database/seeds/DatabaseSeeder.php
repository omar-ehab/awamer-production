<?php

use App\AdministrativeArea;
use App\Bank;
use App\BankAccount;
use App\Contract;
use App\ContractStartEnd;
use App\ContractTerm;
use App\Donor;
use App\Establishment;
use App\EstablishmentType;
use App\Interval;
use App\Permission;
use App\PrivacyPolicy;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdministrativeAreasSeeder::class);
        $this->call(EstablishmentTypesSeeder::class);
        //$this->call(ContractTermsSeeder::class);
        $this->call(EstablishmentsSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(LaratrustSeeder::class);
        //$this->call(BanksSeeder::class);
        //$this->call(BankAccountsSeeder::class);
        //$this->call(IntervalsSeeder::class);
        //$this->call(DonorsSeeder::class);
        $this->call(ContractStartEndsSeeder::class);
        $this->call(PrivacyPolicySeeder::class);
    }
}

class AdministrativeAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdministrativeArea::create([
            'name' => 'المنطقة الأدارية الأولي'
        ]);
    }
}

class EstablishmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstablishmentType::create([
            'name' => 'نوع الجهة الأول'
        ]);
    }
}

class EstablishmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $est = Establishment::create([
            'establishment_type_id' => 1,
            'administrative_area_id' => 1,
            'name' => 'مؤسسة خيرية 1',
            'representative_name' => 'الأستاذ احمد',
            'mobile' => '123456789123',
            'address' => 'test address 1',
            'approved' => true,
        ]);
        $contract = Contract::create([
            'establishment_id' =>$est->id,
            'percentage' => true,
            'value' => 15
        ]);
        //get all terms of system
        $contractTerms = ContractTerm::all();
        //sync terms with contract
        $contract->terms()->sync($contractTerms);
    }
}

class PermissionsSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $permissions = [
            'create-donor',
            'read-donor',
            'update-donor',
            'delete-donor',
            'create-operation',
            'read-operation',
            'create-sanad',
            'read-sanad',
            'create-branch',
            'read-branch',
            'update-branch',
            'delete-branch',
            'create-user',
            'read-user',
            'update-user',
            'delete-user',
            'create-report',
            'read-report',
            'update-report',
            'delete-report',
        ];
        $permissionsName = [
            'Create Donor',
            'Read Donor',
            'Update Donor',
            'Delete Donor',
            'Create Operation',
            'Read Operation',
            'Create Sanad',
            'Read Sanad',
            'Create Branch',
            'Read Branch',
            'Update Branch',
            'Delete Branch',
            'Create User',
            'Read User',
            'Update User',
            'Delete User',
            'Create Report',
            'Read Report',
            'Update Report',
            'Delete Report',
        ];
        for($i = 0; $i < count($permissions); $i++)
        {
            Permission::create([
                'name' => $permissions[$i],
                'display_name' => $permissionsName[$i],
                'description' => $permissionsName[$i]
            ]);
        }
    }
}

class LaratrustSeeder extends Seeder
{

    private $userPermissions = [
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
        'read-sanad',
        'create-sanad',
        'create-operation',
        'read-operation',
        'create-user',
        'read-user',
        'update-user',
        'delete-user',
        'read-report',
        'create-report',
        'update-report',
        'delete-report',
        'read-branch',
        'create-branch',
        'update-branch',
        'delete-branch',
    ];
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $config = config('laratrust_seeder.role_structure');
        $userPermission = config('laratrust_seeder.permission_structure');
        $mapPermission = collect(config('laratrust_seeder.permissions_map'));
        $index = 0;
        foreach ($config as $key => $modules) {

            // Create a new role
            $role = \App\Role::create([
                'name' => $key,
                'display_name' => ucwords(str_replace('_', ' ', $key)),
                'description' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = \App\Permission::firstOrCreate([
                        'name' => $permissionValue . '-' . $module,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ])->id;

                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);
            $index++;
        }

        // Create super admin account
        $user = User::create([
            'name' => "Super Admin",
            'email' => 'aborenad1400@gmail.com',
            'password' => bcrypt('A@b123654'),
            'establishment_id' => 1
        ]);
        $role = \App\Role::find(1);
        $user->attachRole($role);
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();
        \App\User::truncate();
        \App\Role::truncate();
        \App\Permission::truncate();
        Schema::enableForeignKeyConstraints();
    }
}

class ContractStartEndsSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContractStartEnd::create([
            'type' => 'start',
            'value' => 'مقدمة العقد'
        ]);
        ContractStartEnd::create([
            'type' => 'end',
            'value' => 'خاتمة العقد'
        ]);
    }
}

class PrivacyPolicySeeder  extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrivacyPolicy::create([
            'content' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع. ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق. هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.'
        ]);
    }
}



