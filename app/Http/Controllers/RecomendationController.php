<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Project\ProjectId;
use Google\Cloud\Firestore\FirestoreClient;
class RecomendationController extends Controller
{
    protected $firestore;

    public function __construct()
    {
       $serviceAccount = (new Factory)->withServiceAccount(__DIR__.'/Task_firestoreKey.json');

      $data=$this->firestore = new FirestoreClient([
           'projectId' => 'chinaoutlet-6d42f',
       ]);

      }
    public function index()
    {
        $itemRef = $this->firestore->collection('items');

        $documents = $itemRef->documents();
        $ref = array("ref" => $documents);

        return view('task.recomendation.home',$ref);

        //   $url = "https://firestore.googleapis.com/v1beta1/projects/chinaoutlet-6d42f/databases/(default)/documents/items".$object_unique_id;

        // $curl = curl_init();

        // $url = "https://firestore.googleapis.com/v1beta1/projects/chinaoutlet-6d42f/databases/(default)/documents/items";


        // curl_setopt_array($curl, array(
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_CUSTOMREQUEST => 'GET',
        //     CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        //     CURLOPT_URL => $url,
        //     CURLOPT_USERAGENT => 'cURL',
        // ));

        // $data = curl_exec( $curl );

        // curl_close( $curl );
        // $response = json_decode(json_encode($data));

        // echo $response . "\n";die();

        // foreach ($response["documents"] as $key => $value) {
        //     echo $value . "\n";die();
        // }

    // Show result
    }



    public function store(Request $req)
    {

           $data=$req->link;
         if(empty($data))
         {
             return back()->with('error','plz fill the input field');
         }
         else
         {
        $itemRef = $this->firestore->collection('items');
        $documentReference =  $itemRef->newDocument()->set(['link' => $data]);
        return back()->with('msg','Link is successfully added');
         }
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
