<?php

namespace App\Http\Controllers;

use App\Usecases\Contratcs\Users\CreateUserInterface;
use App\Usecases\Contratcs\Users\ListUserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param ListUserInterface $listUser
     * @return void
     */
    public function index(Request $request, ListUserInterface $listUser)
    {
        if($request->has('filter') and $request->has('value')){
            return response()->json(
                $listUser->handle($request->filter, $request->value)
            );
        }
        return response()->json($listUser->handle());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param CreateUserInterface $createUser
     * @return void
     */
    public function store(Request $request, CreateUserInterface $createUser)
    {
        return response()->json($createUser->handle($request->all()));
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
