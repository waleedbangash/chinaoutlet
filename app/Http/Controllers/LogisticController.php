<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Project\ProjectId;
use Google\Cloud\Firestore\FirestoreClient;
class LogisticController extends Controller
{
    protected $firestore;
    public function __construct()
    {
       $serviceAccount = (new Factory)->withServiceAccount(__DIR__.'/Task_firestoreKey.json');

      $this->firestore = new FirestoreClient([
           'projectId' => 'chinaoutlet-6d42f',
       ]);




    }

    public function index()
    {
        $logisticRef = $this->firestore->collection('Logistics');
        $documents = $logisticRef->documents();
        // dd(($documents)); die;

        $ref = array("ref" => $documents);
        return view('task.logistics.logistic',$ref);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($key)
    {
       $logisticRef = $this->firestore->collection('Logistics');
       $documents = $logisticRef->document($key);

       $snapshot=$documents->snapshot();
       $arr = array("snap"=>$snapshot,"key"=>$key);
       return view('task.logistics.edit',$arr);
    }


    public function update(Request $req, $key)
    {
        $time=$req->time_estimate;
        $title=$key;

        $logisticRef =$this->firestore->collection('Logistics')->document($key)->set([
            'time_estimate'=> $time,
            'title'=>$title,
        ]);

        return redirect('logistic')->with('msg','record is succefully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($key)
    {
        // $logisticRef =$this->firestore->collection('Logistics')->document($key)->delete();
        // return redirect('logistic');
    }
}
