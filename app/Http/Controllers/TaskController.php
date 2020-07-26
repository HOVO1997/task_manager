<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(){
        return view('manager');
    }

    public function index()
    {
        return response()->view('create_task');
    }

    public function get_result(){

        $manager = Auth::user()->name;


        $product = Task::all()->where('manager_name',$manager);

        return response()->view('manager', compact('product'));

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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'task_name' => 'required|max:255',
            'for_name' => 'required|max:255',
            'desc' => 'required||max:99999',
        ]);


        $manager_name = Auth::user()->name;
        $product = new Task();

        if (empty(User::where('name',$request->for_name)->first()) ){
            return redirect('home/create_task')->with(['msg' => 'User not found']);
        }

        $product->task_name = $request->task_name;
        $product->manager_name = $manager_name;
        $product->assigned_user_name = $request->for_name;
        $product->status = null;
        $product->description = $request->desc;
        $product->save();


        return redirect('manager')
            ->with(['msg'=>'The task has been created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Task::findorfail($id);
        return response()->view('show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Task::findorfail($id);
        return response()->view('edit',compact('product'));
    }


    public function edit_user($id){

        $product = Task::findorfail($id);
        return response()->view('user_edit',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'task_name' => 'required|max:255',
            'for_name' => 'required|max:255',
            'desc' => 'required||max:99999',
        ]);

        $product['task_name'] = $request->task_name;
        $product['assigned_user_name'] = $request->for_name;
        $product['description'] = $request->desc;


        Task::where('id', $id)->update($product);

        return redirect('/manager')->with(
            ['msg' => 'The task has been successfully updated']);
    }

    public function user_update(Request $request,$id){

        $this->validate($request, [
            'desc' => 'required||max:99999',

        ]);
        $product['description'] = $request->desc;
        $product['status'] = $request->option;

        Task::where('id', $id)->update($product);

        return redirect('/home')->with(
            ['msg' => 'Your task has been successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Task::where('id', $id)->delete();

        return redirect('manager')->with(
            ['msg' => 'The task has been successfully deleted']);
    }

    public function search(){


    }
}
