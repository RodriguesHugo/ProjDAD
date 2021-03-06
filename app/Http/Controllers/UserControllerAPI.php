<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;

use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\DB;

use App\User;
use App\StoreUserRequest;
use Hash;
use Carbon\Carbon;
use Response;

class UserControllerAPI extends Controller
{
    public function registerAccount(Request $request) {
        $request->validate([
                'name' => 'required|min:3|regex:/^[A-Za-záàâãéèêíóôõúçÁÀÂÃÉÈÍÓÔÕÚÇ ]+$/',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username|min:3|regex:/[A-Za-z0-9]+$/',
            ]);

        $user = new User();
        $user->fill(array_merge($request->all(), ['password' => 'secret']));
        $user->password = Hash::make($user->password);

        $user->save();
        return response()->json(new UserResource($user), 201);
    }

     public function editAccount(Request $request, $id)
    {
        $request->validate([
                'name' => 'required|min:3|regex:/^[A-Za-záàâãéèêíóôõúçÁÀÂÃÉÈÍÓÔÕÚÇ ]+$/',
                'username' => 'required|unique:users,username,'.$id.'|min:2|regex:/[A-Za-z0-9]+$/',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->save();
        return new UserResource($user);
    }


    public function myProfile(Request $request)
    {
        return new UserResource($request->user());
    }

    public function shiftInformation(Request $request, $id)
    {
        $user=User::findOrFail($id);

        return new UserResource($user);
    }
    public function toggleShift(Request $request, $id)
    {
        $data=Carbon::now();
        $user=User::findOrFail($id);
        if($user->shift_active == 1){
            $user->shift_active = 0;
            $user->last_shift_end = $data->format('Y-m-d H:i:s');
        }elseif($user->shift_active == 0){
            $user->shift_active = 1;
            $user->last_shift_start = $data->format('Y-m-d H:i:s');
        }else{
            return Response::json([
                'error' => 'shit active value is wrong'
            ], 422);
        }
        $user->save();

         return new UserResource($user);
    }

}
