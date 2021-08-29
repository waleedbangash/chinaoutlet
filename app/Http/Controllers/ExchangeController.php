<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Project\ProjectId;
use Google\Cloud\Firestore\FirestoreClient;
class ExchangeController extends Controller
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
          $exchangeRef = $this->firestore->collection('exchange');
          $documents = $exchangeRef->documents();
          $ref = array("ref" => $documents);

          return view('task.exchanges.exchange',$ref);
    }

    public function edit()
    {
        $exchangeRef = $this->firestore->collection('exchange');
        $documents = $exchangeRef->documents();
        $ref= array("ref" => $documents);

      return view('task.exchanges.edit',$ref);
    }


    public function update(Request $req)
    {
        $exchangeRef = $this->firestore->collection('exchange');
        $exchangeRef->document('ncUK4GaUSKbrQUQijOPV')->set([
            'yuan'=> floatval($req->yuan),
               'usd'=> floatval($req->usd)
        ]);
        return redirect()->route('exchange.index')->with('msg','record is succefully updated');
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
