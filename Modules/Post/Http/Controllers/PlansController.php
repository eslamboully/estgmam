<?php

namespace Modules\Post\Http\Controllers;

use App\DataTables\PlanDatatable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Common\Services\LocalFiles;
use Modules\Post\Entities\Plan;
class PlansController extends Controller
{
    use LocalFiles;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(PlanDatatable $planDatatable) {

        $title = trans('post::post.plans');
        return $planDatatable->render('post::plans.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        $title = trans('adminpanel::adminpanel.add_new');

        return view('post::plans.create', compact('title'));
    }


    public function store(Request $request) {

        $rules = [];

        foreach (config('translatable.locales') as $lang):

            $rules += [$lang . '.*' => 'required'];
            $rules += [$lang . '.date' => 'required'];
            $rules += [$lang . '.currency' => 'required'];

        endforeach;

        $array = [
            'money' => 'required',
        ];

        $rules = array_merge($rules, $array);

        $data = $request->validate($rules);

        $data = array_filter($data);

        $plan = Plan::create($data);


        return redirect()->route('plans.index')->with('success', trans('adminpanel::adminpanel.created'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id) {
        $plan = Plan::find($id);

        $title = trans('adminpanel::adminpanel.edit');

        return view('post::plans.edit', compact('plan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id) {
        $rules = [];

        foreach (config('translatable.locales') as $lang):

            $rules += [$lang . '.*' => 'required'];
            $rules += [$lang . '.date' => 'required'];
            $rules += [$lang . '.currency' => 'required'];

        endforeach;

        $array = [
            'money' => 'required',
            'money' => 'required',
        ];

        $rules = array_merge($rules, $array);

        $data = $request->validate($rules);

        $data = array_filter($data);

        $plan = Plan::find($id)->update($data);

        return redirect()->route('plans.index')->with('success', trans('adminpanel::adminpanel.updated'));
    }

    public function destroy($id) {
        $plan = Plan::find($id);

        $plan->destroy($id);


        return back()->with('success', trans('adminpanel::adminpanel.deleted'));
    }

}
