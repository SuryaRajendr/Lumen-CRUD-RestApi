<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\model\test;
use App\Events\userevent;
use Illuminate\Support\Facades\Event;
//use DB;
use PDO;






class testcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = test::all(); 
        return $users;
       // print_r($users);
        //print_r($users)->toarray();
       // $result = DB::select($sql)->toArray();
       // $result = \App\test::all()->toArray();

        

       // DB::setFetchMode(PDO::FETCH_ASSOC); // Set the fetch mode as array

        //$result = DB::select('select * from tests');
       // print_r($result)->get()->toArray(); 
       // return response($result);
      // return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //event(new UserCreated("Your Account has been send"));

        Event::dispatch(new userevent);
        ///Event::dispatch (new userevent());
      //echo "surya"; die();
        $variable = new test();
        $variable->name = "name";
        $variable->age = 99;
      
		$variable->save();
		
		return Response([
			'data' => 'Data has been added success'
			]);
    //$new = DB::insert ('insert into tests(name,age) values (?,?)',[ $request->name,$request->age]);

        // sleep(3);
        // dump("after 3 secs");
        // log::info("photo saved");
        // sleep(3);
        // dump("after 3 secs");
        // log::info("sms send");
        // sleep(3);
        // dump("after 3 secs");
        // log::info("mail send");

    //return response()->json($new);
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
         $variable= test::find($id);
        return Response([
			'data' => $variable
			]);
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
        $variable= new test();
        $variable->name = $request->name;
        $variable->age = $request->age;
		$variable->save();
        
        return Response([
			'data' => 'Data has been updated successfully'
			]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variable= test::find($id);
      
        $variable->delete();
        
        return Response([
			'data' => 'Data has been deleted successfully'
			]);
    }
}
