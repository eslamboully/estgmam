<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use Modules\Config\Entities\Config;
use Modules\Photo\Http\Requests\PhotoStoreFormRequest;
use Modules\Trip\Entities\TripCategory;
use Modules\Trip\Repositories\TripCategoryRepository;
use Modules\User\Repositories\UserRepository;

class BaseController extends Controller
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $parent_cats = TripCategory::with(['translations'])->where('parent_id','=',null)->orderBy('created_at','desc')->get();
        $sub_cats = TripCategory::with(['translations'])->where('parent_id','!=',null)->orderBy('created_at','desc')->limit(9)->get();
        $config = Config::with(['translations'])->first();
        View::share(['parent_cats'=> $parent_cats,'config' => $config,'sub_cats' => $sub_cats]);
    }
}
