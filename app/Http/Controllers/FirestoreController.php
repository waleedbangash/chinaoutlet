<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Project\ProjectId;
use Google\Cloud\Firestore\FirestoreClient;

class FirestoreController extends Controller
{

    public function index(Request $req)
    {
        $name=$req->name;
        $email=$req->email;
        $data=[$name,$email];
        $serviceAccount = (new Factory)->withServiceAccount(__DIR__.'/FirestoreKey.json');

       $firestore = new FirestoreClient([
            'projectId' => 'firestore-a056d',
        ]);

        $collectionReference = $firestore->collection('student');
        $documentReference = $collectionReference->newDocument()->set($data);





    }

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
        $serviceAccount = (new Factory)->withServiceAccount(__DIR__.'/FirestoreKey.json');

        $firestore = new FirestoreClient([
             'projectId' => 'firestore-a056d',
         ]);
        $citiesRef = $firestore->collection('student');
        $documents = $citiesRef->documents();


        foreach ($documents as $document) {
     if ($document->exists()) {
         print json_encode($document->data(), JSON_PRETTY_PRINT);
     }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
