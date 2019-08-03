<?php

namespace Modules\AdminPanel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Photo\Entities\Photo;
use Modules\Post\Entities\Post;
use Modules\Trip\Entities\Trip;
use Modules\User\Entities\User;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $trips = Trip::all();
        $users = User::all();
        $ads = Post::all();
        $photos = Photo::all();
        return view('adminpanel::index',compact('trips','users','ads','photos'))->with('title' , trans('adminpanel::adminpanel.index'));
    }

}
