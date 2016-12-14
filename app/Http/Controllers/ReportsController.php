<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Range;
use App\Report;
use App\User;
use Carbon;
use PDF;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranges = Range::all();
        return view('reports.create', compact('ranges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        $users = User::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();
        $pdf = PDF::loadView('users.index', compact('users'));
        return $pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ranges = Range::all();
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report', 'ranges'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('reports.index');
    }

    /**
     * Return the Validation Rules
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rules()
    {
      return [
        'start'    => 'required|date',
        'end'    => 'required|before:today',
      ];
    }

}
