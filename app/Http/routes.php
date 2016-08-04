<?php

use App\Models\Repository;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $respositories = Repository::orderBy('star_count', 'desc')->get();
    return view('index', ['repositories' => $respositories]);
});

Route::get('/update', function()
{
    $client = new \Github\Client();
    $repos = $client->api('search')->repositories('language:php', 'stars', 'desc');
    $items = $repos['items'];

    foreach($items as $item){
        $id = $item['id'];

        $repository = Repository::find($id);
        if($repository == NULL){
            $repository = new Repository();
            $repository->id = $id; 
        }

        $repository->name = $item['full_name'];
        $repository->url = $item['url'];
        $repository->created_date = $item['created_at'];
        $repository->last_push_date = $item['pushed_at'];
        $repository->description = $item['description'];
        $repository->star_count = $item['stargazers_count'];

        $repository->save();
    }

    return "success";
});