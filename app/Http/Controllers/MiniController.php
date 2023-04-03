<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mini;
use App\Http\Requests\MiniRequest;

class MiniController extends Controller
{
 
    public function __construct() {
        $this->middleware('auth');
    }
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //dd(Auth::user()->minis());
        return view('minis.index',['title'=>'My Minis','user'=>Auth::user(),'minis'=>Auth::user()->minis()->orderBy('updated_at','desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('minis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MiniRequest $request)
    {
        //
        $data=$request->validated();
        $data['user_id']=Auth::id();
        mini::create($data);
        return redirect()->route('minis.index')->with('success','Your mini is live :)'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Mini $mini)
    {
        //
        return view('minis.show',['mini'=>$mini]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mini $mini)
    {
        //
        return view('minis.edit',['mini'=>$mini]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MiniRequest $request, Mini $mini)
    {
        //
        $data=$request->validated();
        $mini->update($data);
        return redirect()->route('minis.show',$mini)->with('success','Your mini is updated :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mini $mini)
    {
        //
        $mini->delete();
        return redirect()->route('minis.index')->with('success','Your mini is deleted.');
    }

    public function discover()
    {
        return view('minis.index',['title'=>'Discover','minis'=>Mini::all()]);
    }
}
