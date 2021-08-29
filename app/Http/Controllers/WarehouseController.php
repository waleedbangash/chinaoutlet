<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Project\ProjectId;
use Google\Cloud\Firestore\FirestoreClient;
class WarehouseController extends Controller
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
          $warehouseRef = $this->firestore->collection('warehouses');
          $documents = $warehouseRef->documents();
          $ref = array("ref" => $documents);
           return view('task.warehouse.ware_house',$ref);
    }


    public function edit($key)
    {

        $warehouseRef = $this->firestore->collection('warehouses');
        $documents = $warehouseRef->document($key);
        $werehsnap=$documents->snapshot();
         $var=array('ref' =>$werehsnap);
       return view('task.warehouse.edit',$var);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $address=$req->address;
        $transport=$req->Transport;
         $title=$req->title;
        $warehouseRef = $this->firestore->collection('warehouses');
        $documents = $warehouseRef->document($title)->set([
            'address'=>$address,
            'Transport' =>$transport,
             'title' => $title]);
             return redirect()->route('warehouse.index')->with('msg','record is succssfully updated');
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
