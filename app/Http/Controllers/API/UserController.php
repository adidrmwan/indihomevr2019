<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;
use App\User;
use App\File;
use App\Purchase; 
use DB;

use Validator;


class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    public function login() {
        if(Auth::attempt(['email' => request ('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this-> successStatus); 
        }
        else {
            return response()->json(['error'=>'Unauthorised'], 401); 
        }
    }

    public function register(Request $request)  { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                }
        $input = $request->all(); 
                $input['password'] = bcrypt($input['password']); 
                $user = User::create($input); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus); 
    }

    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 

    public function download($id) {
        $dl = File::find($id);
            return Storage::download($dl->file, $dl->file);    
    }

    public function get_all_game() {
        $allGame = File::all();
                                    ;
        return response()->json($allGame); 
    }

    public function get_detail_game($id) {
        $Game = DB::table('files')
                            ->where('id', $id)
                            ->first();
                                    ;
        return response()->json($Game); 
    }

    public function get_user($id) {
        $user = Auth::user();
        return Response::json([
                                'data'    => $user,
                                'status'    => 'success',
                                ], 200);
    }

    public function show_banner($id) {
        $dl = File::find($id);
         $path = storage_path().'/app/banner/'.$dl->banner_img;
            return Response::download($path);
    }

    public function show_logo($id) {
        $dl = File::find($id);
         $path = storage_path().'/app/logo/'.$dl->logo_img;
            return Response::download($path);
    }

    public function store_purchase(Purchase $purchase)
    {
         $purchase = Purchase::create([
            'user_id'   => request()->user_id,
            'game_id'   => request()->game_id, 
        ]);

         return Response::json([
                                'data'    => $purchase,
                                'status'    => 'created',
                                ], 200);
    }

    public function get_purchase($user_id, $game_id)
    {
        // $user = Purchase::where('user_id','=', $user_id)->first();
        // $game = Purchase::where('game_id','=', Input::get('$game_id'))->exists();
        // dd($user);
         if( Purchase::where('user_id','=',$user_id)->first() && Purchase::where('game_id','=',$game_id)->first() ) {
            return Response::json([
                                'status'    => 'purchased',
                                ], 200);

         }else {
            return Response::json([
                                'status'    => 'not purchased',
                                ], 400);
         }
    }
}
