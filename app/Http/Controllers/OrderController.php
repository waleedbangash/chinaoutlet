<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Project\ProjectId;
use Google\Cloud\Firestore\FirestoreClient;

class OrderController extends Controller
{
    protected $firestore;

  public function __construct()
  {
     $serviceAccount = (new Factory)->withServiceAccount(__DIR__.'/FirestoreKey.json');

    $this->firestore = new FirestoreClient([
         'projectId' => 'chinaoutlet-6d42f',
     ]);

  }
    public function index($uid)
    {
        //  $userRef= $this->firestore->collection('users');
        //  $userdocument= $userRef->document($uid);
        //  $usersnapshot=$userdocument->snapshot();
        //  $orderDocuments = $this->firestore->collection('orders')->document($uid);
        //  $ordersnap= $orderDocuments->snapshot()->data();

        //  if(empty($ordersnap))
        //    {
        //     return redirect('user')->with('msg','there is no orders');
        //    }
        //  $data=array('ref'=>$ordersnap,'uid'=> $uid);


        //  return view('task.orders.view_order',$data);
        $url = "https://firestore.googleapis.com/v1beta1/projects/chinaoutlet-6d42f/databases/(default)/documents/items".$object_unique_id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'cURL',
        ));

        $response = curl_exec( $curl );

        curl_close( $curl );

    // Show result
        echo $response . "\n";die();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDetail($ref,$uid)
    {
        $orderDocuments = $this->firestore->collection('orders')->document($uid);
        $orderDetail = null;
        $key = null;
        $ordersnap= $orderDocuments->snapshot()->data();
        foreach ($ordersnap as $key => $value) {
            if($key == $ref){
                $orderDetail = $value;
                $key = $key;
                break;
            }
        }
        $ref = array('ref' => $orderDetail,'orderNo' => $key);
        return view('task.orders.detail',$ref);
    }
    public function productDetail()
    {
        return view('task.orders.product_detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function statusUpdte(Request $req)

    {
        $status=$req->status;
        $keyO=$req->key;
        $uid=$req->uid;
        //  $uid=null;
         if($status==-1)
         {
             return back()->with('error','plz select the vallue');
         }
        else
        {
            $orderRef= $this->firestore->collection('orders')->document($uid);
            $usersnapshot=$orderRef->snapshot()->data();
            $data=null;
            foreach ($usersnapshot as $key=> $value) {
                if($keyO  == $key){
                    $usersnapshot[$key]["status"] =$status;
                    break;
                 }
             }
             $this->firestore->collection('orders')
                ->document($uid)->set($usersnapshot);
                $msg=session()->flash('message', 'Post successfully updated.');
             return back()->with('msg','status is successfully updated');
        }
    }

    public function store(Request $request)
    {

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
