<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Application\Dispatcher;
use Illuminate\Support\Facades\Validator;
use App\Core\Application\Commands\CreateUserCommand;

class UserController extends Controller
{
    private Dispatcher $dispatcher;
    public function __construct(Dispatcher $dispatcher){
        $this->dispatcher = $dispatcher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'id' => 1,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:80',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $createUser = new CreateUserCommand(
            $request->name, 
            $request->email,
            $request->password,
        );
        $result = $this->dispatcher->dispatch($createUser);
        return response()->json($result);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
