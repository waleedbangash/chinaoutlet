<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use app\Models\FirebaseModel\FireModel;
class FirebaseController extends Controller
{
    public function index()
    {


        // $firebase = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        // // $factory= $firebase->createDatabase();
        //   $datbase =  $firebase->createDatabase();


        //     $ref=$datbase->getReference('users');

        //    return $ref;
    }
    public function class()
    {
        return view('class');
    }
    public function get(Request $request)
    {
        $name=$request->name;
        $email=$request->email;


        $firebase = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json')
        ->withDatabaseUri('https://laravelfirebase-dd69c-default-rtdb.firebaseio.com/');


        // $factory= $firebase->createDatabase();
          $database =  $firebase->createDatabase();

       $data=[
           'name'=>$name,
          'email'=>$email,
       ];
            $table="class/";
           $ref=$database->getReference($table)->push($data);

    return redirect('show');;

    }
    public function show()
    {
        $firebase = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json')
        ->withDatabaseUri('https://laravelfirebase-dd69c-default-rtdb.firebaseio.com/');
        $database =  $firebase->createDatabase();
        // dd($database);
         $table="class/";
         $i=0;
        $ref=$database->getReference($table)->getValue();

        $i=0;
        $arr = array("ref"=>$ref);

        return view('show', $arr);
    }
    public function edit($key)
    {

        $firebase = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json')
        ->withDatabaseUri('https://laravelfirebase-dd69c-default-rtdb.firebaseio.com/');
        $database =  $firebase->createDatabase();


        $table="class/";
        $ref=$database->getReference($table)->getChild($key)->getValue();
        $arr = array("ref"=>$ref,"key"=>$key);
        return view('edit',$arr);
    }

    public function store(Request $req,$key)
    {
        $name=$req->name;
        $email=$req->email;

        $data=[
            'name'=>$name,
           'email'=>$email,
        ];
        $firebase = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json')
        ->withDatabaseUri('https://laravelfirebase-dd69c-default-rtdb.firebaseio.com/');
        $database =  $firebase->createDatabase();


        $table="class/".$key;
        $ref=$database->getReference($table)->update($data);
          return redirect('show')->with('record is succefully updated');

    }

}
