<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Project\ProjectId;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Google\Cloud\Firestore\FirestoreClient;

class UserController extends Controller
{  protected $firestore;
    public function __construct()
    {
       $serviceAccount = (new Factory)->withServiceAccount(__DIR__.'/Task_firestoreKey.json');

      $this->firestore = new FirestoreClient([
           'projectId' => 'chinaoutlet-6d42f',
       ]);
      }
    public function index()
    {
          $userRef = $this->firestore->collection('users');
          $documents = $userRef->documents();
          $ref = array("ref" => $documents);
           return view('task.users.user',$ref);
    }
    public function edit($uid)
    {

        $userRef= $this->firestore->collection('users');
        $userdocument= $userRef->document($uid);
        $snap=$userdocument->snapshot();
        $data=array('ref' => $snap,'uid'=>$uid);
        return view('task.users.edit',$data);
    }
         public function update(Request $req,$uid)
         {
            $wallet=$req->wallet;
            $userRef= $this->firestore->collection('users');
            $userdocument= $userRef->document($uid)->snapshot()->data();
            $userdocument['wallet'] = floatval($wallet);
            $userRef->document($uid)->set($userdocument);
            return redirect()->route('users.index')->with('msg','Record is successfully updated');
         }
         public function signupIndex()
         {
               return view('task.users.sign_up');

         }
         public function signupstore(Request $request)
        {
            $this->validate($request,[
                'username' => 'required',
                'useremail'=>'required|unique:users,email',
                'userpassword'=>'required'
            ]);
            $result= new User();
                $result->name = $request['username'];
                $result->email = $request['useremail'];
            $result->password = bcrypt($request['userpassword']);
            $result->save();
            $request->session()->flash('msg','signup sucessfully go to signIn');
            return redirect('sign_up');


        }

        public function signinIndex()
        {
            return view('task.users.sign_in');
        }

        public function signinstore(Request $request)
        {
           $result= $this->validate($request, [
                'useremail'=>'required|email',
                'userpassword'=>'required',
        ]);
             $email=$request->input('useremail');
             $password=$request->input('userpassword');

                $result =User::where('email',$email)->first();
                if(!is_null($result))
                {

                    if (Hash::check($request->userpassword, $result->password))
                    {

                        $request->session()->put('user',$result);
                        return redirect('/');
                    }
                    else
                    {
                        return redirect('sign_in')->with('error','please give the valid data');
                    }
                }
                else
                    {
                        return redirect('sign_in')->with('error','please give the valid data');;
                    }

             }
}
