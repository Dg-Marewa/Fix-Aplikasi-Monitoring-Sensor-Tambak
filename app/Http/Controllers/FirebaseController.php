<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Carbon\Carbon;
use App\Models\DataAirTambak;

class FirebaseController extends Controller
{
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/belajarfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://belajarfirebase-64820-default-rtdb.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();
        $newPost = $database
        ->getReference('blog/posts')
        ->push([
        'title' => 'Post title',
        'body' => 'This should probably be longer.'
        ]);
        //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        //$newPost->getChild('title')->set('Changed post title');
        //$newPost->getValue(); // Fetches the data from the realtime database
        //$newPost->remove();
        echo"<pre>";
        print_r($newPost->getvalue());
    }

    public function testing()
    {
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/mf-2022-pinrang.json')
        // ->withDatabaseUri('https://belajarfirebase-64820-default-rtdb.firebaseio.com');
        ->withDatabaseUri('https://coba-esp32-39fd9-default-rtdb.asia-southeast1.firebasedatabase.app');

        $database = $factory->createDatabase();
        $suhuA = $database->getReference('SuhuA')->getValue();
        $suhuB = $database->getReference('SuhuB')->getValue();
        $pH = $database->getReference('pH')->getValue();
        $tinggiAir = $database->getReference('TinggiAir')->getValue();
        $do = $database->getReference('DO')->getValue();
        $datetime = Carbon::now();

        
            // echo"<h3>Suhu Atas : $suhuA</h3>";
            // echo"<h3>Suhu Bawah : $suhuB</h3>";
            // echo"<h3>pH Air : $pH</h3>";
            // echo"<h3>Tinggi Air : $tinggiAir</h3>";
            // echo"<h3>Kadar Oksigen : $do</h3>";
            // echo"========================================";

        return view('firebase.index',[
            'suhuA' => $suhuA,
            'suhuB' => $suhuB,
            'pH' => $pH,
            'tinggiAir' => $tinggiAir,
            'do' => $do,
            'datetime' => $datetime,
        ]);
        
    }

    public function logData()
    {
        $log = DataAirTambak::orderBy('id','DESC')->paginate(10);
        return view('firebase.himpunan-data',[
            'log' => $log,
        ]);
    }

    public function proses()
    {
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/mf-2022-pinrang.json')
        ->withDatabaseUri('https://coba-esp32-39fd9-default-rtdb.asia-southeast1.firebasedatabase.app');

        $database = $factory->createDatabase();
        $suhuA = $database->getReference('SuhuA')->getValue();
        $suhuB = $database->getReference('SuhuB')->getValue();
        $pH = $database->getReference('pH')->getValue();
        $tinggiAir = $database->getReference('TinggiAir')->getValue();
        $do = $database->getReference('DO')->getValue();

        $datetime = Carbon::now();

        return view('firebase.proses',[
            'suhuA' => $suhuA,
            'suhuB' => $suhuB,
            'pH' => $pH,
            'tinggiAir' => $tinggiAir,
            'do' => $do,
            'datetime' => $datetime,
        ]);
    }

    public function grafikData()
    {
        // https://medikre.com/stories/tutorial-membuat-highcharts-pada-laravel-7-atau-6

        // $users = DataAirTambak::select(\DB::raw("COUNT(*) as count"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(\DB::raw("Month(created_at)"))->get();
        
        $monitor  = DataAirTambak::orderBy('id','DESC')->limit(10)->get();
        $data     = json_decode($monitor);
        $atas     = [];
        $bawah    = [];
        $waktu    = [];

        // Pastikan tipe data suhu atas dan bawah adalah integer atau float

        foreach($data as $row){
            $bawah[]  = $row->bawah;
            $atas[]  = $row->atas;
            $waktu[] = $row->waktu;
        }      

        return view('firebase.grafik',[
            'atas' => $atas,
            'bawah' => $bawah,
            'waktu' => $waktu,
        ]);
    }

    public function loop()
    {
        for($x=0; $x<=10; $x++){
            echo 'Maaf saya tidak akan mengulangi lagi<br>';
        }

        // $x = 9;
        // while($x < 10)
        // {
        //     echo 'Perulangan While dijalankan!<br>';
        //     $x--;
        // }
    }
    
}
