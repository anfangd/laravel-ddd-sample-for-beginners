<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace App\Http\Controllers;

use App\Http\Models\User\Commons\UserViewModel;
use Illuminate\Http\Request;
use packages\Techno\Sns\UseCase\User\Delete\UserDeleteCommand;
use packages\Techno\Sns\UseCase\User\Delete\UserDeleteServiceInterface;
use packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoCommand;
use packages\Techno\Sns\UseCase\User\GetInfo\UserGetInfoServiceInterface;
use packages\Techno\Sns\UseCase\User\Register\UserRegisterCommand;
use packages\Techno\Sns\UseCase\User\Register\UserRegisterServiceInterface;
use packages\Techno\Sns\UseCase\User\Update\UserUpdateCommand;
use packages\Techno\Sns\UseCase\User\Update\UserUpdateServiceInterface;

/**
 * UserController class
 */
class UserController extends Controller
{
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
    public function store(UserRegisterServiceInterface $interactor, Request $request)
    {
        //
        $params = $request->all();
        $command = new UserRegisterCommand($params['name']);
        $result = $interactor->handle($command);

        //TODO: 専用の ViewModel を作成してレスポンスを返す。
        //$userModel = new UserStoreViewModel("id001", "name001");
        //return view('user.store', compact('viewModel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(UserGetInfoServiceInterface $interactor, $name)
    {
        //
        $command = new UserGetInfoCommand($name);
        $resutl = $interactor->handle($command);

        //TODO: 専用の ViewModel を作成してレスポンスを返す。
        //$userModel = new UserShowViewModel("id001", "name001");
        //return view('user.show', compact('viewModel'));
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
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateServiceInterface $interactor, Request $request, $name)
    {
        //
        $params = $request->all();
        $command = new UserUpdateCommand($name, $params['name']);
        $interactor->handle($command);
    }

    /**
     * Remove the specified resource from storage.

     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDeleteServiceInterface $interactor, $id)
    {
        //
        $command = new UserDeleteCommand($id);
        $interactor->handle($command);
    }
}
