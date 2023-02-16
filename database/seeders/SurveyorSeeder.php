<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SurveyorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $users = array(
        array("username" => "firdausi", "password" => "123456", "name" => "FIRDAUSI NUZULAH ISNAINI"),
        array("username" => "arief", "password" => "arief123", "name" => "ARIEF MUHAMMAD NUR"),
        array("username" => "kurnia", "password" => "kurnia22", "name" => "KURNIA MASHITTA"),
        array("username" => "achalfa", "password" => "achalfa22", "name" => "ACHMAD ALFANI"),
        array("username" => "achsir", "password" => "achsir22", "name" => "ACHMAD SIROJUDDIN"),
        array("username" => "achmadz", "password" => "achmadz123", "name" => "ACHMAD ZAINI"),
        array("username" => "adityad", "password" => "adityad22", "name" => "ADITYA DELEN"),
        array("username" => "afdlilahf", "password" => "afdlilahf22", "name" => "AFDLILAH FARADISA"),
        array("username" => "agness", "password" => "agness22", "name" => "AGNES SILKY NANDA ARIANSYAH"),
        array("username" => "agustin", "password" => "agustin22", "name" => "AGUSTINA TIARA SANNE S.I.KOM"),
        array("username" => "data_ainul", "password" => "123456", "name" => "AINUL YAQIN"),
        array("username" => "akhmad", "password" => "akhmad22", "name" => "AKHMAD FIRMANSYAH "),
        array("username" => "alifat", "password" => "alifat22", "name" => "ALIFATUR ROCHMAN"),
        array("username" => "ancaan", "password" => "ancaan22", "name" => "ANCA ANISYA"),
        array("username" => "anggaf", "password" => "anggaf22", "name" => "ANGGA FERDIANSYAH"),
        array("username" => "arfinrahm", "password" => "arfinrahm22", "name" => "ARFIN RAHMAT AL HAFIZH BASTIAN"),
        array("username" => "arikse", "password" => "arikse22", "name" => "ARIK SETIAWAN"),
        array("username" => "arikaw", "password" => "arikaw22", "name" => "ARIKA WINDA CAHYA SURITNO"),
        array("username" => "atikdi", "password" => "atikdi22", "name" => "ATIK DIANA"),
        array("username" => "auliapuspi", "password" => "123456", "name" => "AULIA PUSPITA NUR HAMIDAH"),
        array("username" => "ayundacit", "password" => "ayundacit22", "name" => "AYUNDA CITRA INSANI"),
        array("username" => "bagusr", "password" => "bagusr22", "name" => "BAGUS RIZKI WIDODO"),
        array("username" => "bahrudina", "password" => "bahrudina22", "name" => "BAHRUDIN ALAIKA TUQO"),
        array("username" => "bettyh", "password" => "bettyh22", "name" => "BETTY HERDINAWATI"),
        array("username" => "deddyp", "password" => "deddyp22", "name" => "DEDDY PRASETYA MAHARANI"),
        array("username" => "dellap", "password" => "dellap22", "name" => "DELLA PRAMARSYAH"),
        array("username" => "dennyian", "password" => "123456", "name" => "DENNY IAN WAHJUDI"),
        array("username" => "dhimas", "password" => "dhimas22", "name" => "DHIMAS REZA IRAWAN"),
        array("username" => "diaput", "password" => "diaput22", "name" => "DIA PUTRI SETIAWATI"),
        array("username" => "dianpu", "password" => "dianpu22", "name" => "DIAN PUSPITA SARI"),
        array("username" => "dimasarun", "password" => "dimasarun22", "name" => "DIMAS ARUNG SAMUDRA"),
        array("username" => "diniariya", "password" => "diniariya22", "name" => "DINI ARIYANTI"),
        array("username" => "dollym", "password" => "dollym22", "name" => "DOLLY MARTHAREA SETYAWAN"),
        array("username" => "efidaa", "password" => "efidaa22", "name" => "EFIDA APRILIA HERDINA AISYAH"),
        array("username" => "egitani", "password" => "egitani22", "name" => "EGITANIA TAMARA YOKIBETH"),
        array("username" => "esahid", "password" => "esahid22", "name" => "ESA HIDAYAH"),
        array("username" => "fadhila", "password" => "fadhila22", "name" => "FADHILA JIHAN ROSITA "),
        array("username" => "faisal", "password" => "faisal22", "name" => "FAISAL BAYU PAMUNGKAS"),
        array("username" => "faizas", "password" => "faizas22", "name" => "FAIZ ASHLICH MAULANA"),
        array("username" => "faizaherli", "password" => "123456", "name" => "FAIZAH ERLINA WULANDARI"),
        array("username" => "farids", "password" => "farids22", "name" => "FARID SUSANTO WIBISONO"),
        array("username" => "firdaus", "password" => "firdaus22", "name" => "FIRDAUSI NUZULLAH"),
        array("username" => "frista", "password" => "frista22", "name" => "FRISTA IZZATUN NASUHA"),
        array("username" => "habiba", "password" => "habiba22", "name" => "HABIBAH LAILATUL MAGHFIRAH"),
        array("username" => "haning", "password" => "haning22", "name" => "HANING WAHYUNITA "),
        array("username" => "herisi", "password" => "herisi22", "name" => "HERI SISWANTO"),
        array("username" => "herwant", "password" => "herwant22", "name" => "HERWANTI"),
        array("username" => "humams", "password" => "humams22", "name" => "HUMAM SYAHRUL MUBAROK U."),
        array("username" => "ilhamfir", "password" => "123456", "name" => "ILHAM FIRMANSYAH ALI SYAHBANA"),
        array("username" => "indraroma", "password" => "123456", "name" => "INDRA ROMADHANTI"),
        array("username" => "jamhurjau", "password" => "jamhurjau22", "name" => "JAMHUR JAUHARI FLORA"),
        array("username" => "lenggono", "password" => "1", "name" => "LENGGONO PUTRO"),
        array("username" => "linafa", "password" => "linafa22", "name" => "LINA FARADILLA MUSFIRO"),
        array("username" => "luluka", "password" => "luluka22", "name" => "LULUK AFIFATUL MAS'UDYA"),
        array("username" => "masida", "password" => "masida22", "name" => "MASIDA PURNAWATI"),
        array("username" => "meidina", "password" => "meidina22", "name" => "MEIDINAR ADELLIA SASONGKO"),
        array("username" => "miftahu", "password" => "miftahu22", "name" => "MIFTAHUL ARIF "),
        array("username" => "miftahulibnu", "password" => "123456", "name" => "MIFTAHUL IBNU KRISNA"),
        array("username" => "mochh", "password" => "mochh22", "name" => "MOCH  HANAFI PERMANA PUTRA"),
        array("username" => "mochi", "password" => "mochi22", "name" => "MOCH. ISNANI CHUSNI YUSIFA"),
        array("username" => "mohfaisal", "password" => "mohfaisal22", "name" => "MOH FAISAL"),
        array("username" => "mohammadr", "password" => "mohammadr22", "name" => "MOHAMMAD RIZAL"),
        array("username" => "mfatihul", "password" => "mfatihul22", "name" => "MUHAMMAD FATIHUL KHOIRI"),
        array("username" => "muhammads", "password" => "muhammads22", "name" => "MUHAMMAD SWEETO PUTRO"),
        array("username" => "ndarub", "password" => "ndarub22", "name" => "NDARU BIMANTO SENO"),
        array("username" => "novant", "password" => "novant22", "name" => "NOVAN TRI SUGIARTO"),
        array("username" => "putrin", "password" => "putrin22", "name" => "PUTRI NANDA DEVIANA"),
        array("username" => "rdhimazad", "password" => "rdhimazad22", "name" => "R.DHIMAZ ADHITYA SEPTIANT"),
        array("username" => "ranuyu", "password" => "ranuyu22", "name" => "RANU YUDISTIRA PRATAMA"),
        array("username" => "riaanggra", "password" => "riaanggra22", "name" => "RIA ANGGRAENI"),
        array("username" => "rinaldi", "password" => "rinaldi22", "name" => "RINALDI HASTANA SUARDI"),
        array("username" => "rizalg", "password" => "rizalg22", "name" => "RIZAL GALIH RAHMANSYAH"),
        array("username" => "rizkia", "password" => "rizkia22", "name" => "RIZKI AGIL KURNIAWAN"),
        array("username" => "rizkyr", "password" => "rizkyr22", "name" => "RIZKY RUAH INDRIA"),
        array("username" => "rofitatri", "password" => "rofitatri22", "name" => "ROFITA TRI WAHYUNI"),
        array("username" => "ronisa", "password" => "ronisa22", "name" => "RONI SAPUTRA"),
        array("username" => "rosano", "password" => "rosano22", "name" => "ROSA NOVIA RESTIANA "),
        array("username" => "shafiya", "password" => "shafiya22", "name" => "SHAFIYAH AURELIA RACHMAWATI"),
        array("username" => "sigitp", "password" => "sigitp22", "name" => "SIGIT PURNOMO"),
        array("username" => "siscia", "password" => "siscia22", "name" => "SISCIA FRISKA APRILITA FAJRYA ,S.HUM"),
        array("username" => "wiantnurs", "password" => "shabrina15_", "name" => "WIANT NUR SHABRINA"),
        array("username" => "wilyas", "password" => "wilyas22", "name" => "WILYA SULISTIARINI"),
        array("username" => "windii", "password" => "windii22", "name" => "WINDI INDARWATI"),
        array("username" => "yaniadi", "password" => "123456", "name" => "YANI ADI SAPUTRO"),
        array("username" => "yanuar", "password" => "yanuar123", "name" => "YANUAR PRIYO UTOMO, SEI"),
        array("username" => "yudhajakh", "password" => "yudhajakh22", "name" => "YUDHA JAKHARIA"),
        array("username" => "yunipu", "password" => "yunipu22", "name" => "YUNI PURWANTI")
    );

    public $permissions = [
        ['name' => 'create-monitoring'],
        ['name' => 'read-monitoring'],
        ['name' => 'delete-monitoring'],
        ['name' => 'update-monitoring'],
    ];

    public $role = [
        'name' => 'Surveyor'
    ];

    public function run()
    {
        $role = Role::create($this->role);
        foreach ($this->permissions as $permission) {
            $permite=Permission::create($permission);
            $role->givePermissionTo($permission);
        }
        
        foreach ($this->users as $user) {
            $userx=User::create([
                'name'=>$user['name'],
                'password'=>Hash::make($user['password']),
                'username'=>$user['username'],
                'password_text'=>$user['password'],
            ]);
            $userx->assignRole($role);
        }
    }
}
