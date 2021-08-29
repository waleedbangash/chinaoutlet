<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Project\ProjectId;
use Google\Cloud\Firestore\FirestoreClient;

class DashboardController extends Controller
{

    public function __construct()
    {
       $serviceAccount = (new Factory)->withServiceAccount(__DIR__.'/FirestoreKey.json');

      $this->firestore = new FirestoreClient([
           'projectId' => 'chinaoutlet-6d42f',
       ]);

    }
    public function index()

    {

        //Orders Count
        //Users Count

        $orderDocuments = $this->firestore->collection('orders')->documents();
        $usersDocuments = $this->firestore->collection('users')->documents();
        //  dd($orderDocuments);
        $ordersCount=0;
        $usersCount=0;
        foreach( $orderDocuments as $key => $doc)
        {
            foreach( $doc->data() as $key => $doc){
                $ordersCount++;
            }
        }
        foreach( $usersDocuments as $key => $doc)
        {
            $usersCount++;
        }
        $exchangeRef = $this->firestore->collection('exchange');
        $documents = $exchangeRef->documents();
        $data=array('orders'=> $ordersCount,'users'=>$usersCount,"ref" => $documents);

        return view('task.dashboard.index',$data);
    }

    public function ordersInformation()

    {

        //Payment Pending - 1
        //Warehouse Pending - 2
        //My Warehouse - 3
        //Delivered Reviews - 4

        $orderDocuments = $this->firestore->collection('orders')->documents();
        $statusesCount = (['1' => 0,'2' => 0, '3' => 0, '4'=> 0]);
        foreach( $orderDocuments as $key => $doc)
        {

            foreach( $doc->data() as $key => $doc){

             $statusesCount[$doc['status']] = $statusesCount[$doc['status']] + 1;

            }
        }
        $ref = array('ref'=>$statusesCount);
        return view('task.dashboard.detail',$ref);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exchangeInfo()
    {



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
