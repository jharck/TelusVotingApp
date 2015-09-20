<?php

namespace TelusApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use TelusApp\Committee;

class CommitteesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('committees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' =>  'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('committee_create_path')
                ->withErrors($validator)
                ->withInput();
        }

        $committees = new Committee;
        $committees->committee_name = $request->get('title');
        $committees->save();

        return redirect()->route('committee_show_path', $committees->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $committees = Committee::findOrFail($id);
        return view('committee', ['committee' => $committees]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $committees = Committee::findOrFail($id);

        return view('committees.edit', ['committee' => $committees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $committees = Committee::findOrFail($id);
        $committees->title = $request->get('title');
        $committees->body = $request->get('body');
        $committees->save();

        return redirect()->route('committee_show_path', $committees->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return Committee::delete($id);
    }
}
