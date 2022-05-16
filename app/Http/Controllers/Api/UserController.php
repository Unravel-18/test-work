<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function index(): UserCollection
    {
        return new UserCollection(User::orderBy('id','asc')->paginate(6));
    }

    public function store(StoreUsersRequest $request): UserResource
    {
        \Tinify\setKey("WD3Tj7Y9GCQbvJ21tZpSJ06HSZJscXBM");


        $source = \Tinify\fromFile($request->photo);
        $resized = $source->resize(array(
            "method" => "fit",
            "width" => 70,
            "height" => 70
        ));
        $fileName = time() . '_fit.' . "jpg" ;
        $resized->toFile("images/" . $fileName);
        $user = new User($request->all());
        $user->photo = $fileName;
        $user->save();

        return new UserResource($user);

    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }
}
