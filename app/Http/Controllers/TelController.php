<?php

namespace App\Http\Controllers;

use App\Models\Tel;
use Illuminate\Http\Request;

class TelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($term = null)
    {
        if ($term) {
            $tels['data'] = Tel::where('name', 'like', '%' . $term . '%')->get();
            return request()->json('200', $tels);
        } else {
            $tels = Tel::orderBy('created_at', 'desc')->paginate(5);
            return response()->json($tels, 200);
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'phone' => 'required',
        ]);

        $tel = Tel::create($request->all());
        if ($tel) {
            $tels = Tel::orderBy('created_at', 'desc')->paginate(5);
            return response()->json($tels, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tel $tel
     * @return \Illuminate\Http\Response
     */
    public function show(Tel $tel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tel $tel
     * @return \Illuminate\Http\Response
     */
    public function edit(Tel $task)
    {
        return request()->json('200', $task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tel $tel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tel $task)
    {
        $task->name = $request->name;
        $task->phone = $request->phone;
        if ($task->save()) {
            $tels = Tel::orderBy('created_at', 'desc')->paginate(5);
            return response()->json($tels, 200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tel $tel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tel $task)
    {
        $result = $task->delete();
        if ($result) {
            $tels = Tel::orderBy('created_at', 'desc')->paginate(5);
            return response()->json($tels, 200);
        }
    }
}
