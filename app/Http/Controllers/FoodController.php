<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Get a validator for an incoming submit request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'restaurant' => ['required', 'string', 'max:25'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Food::all();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('option', function ($data) {
                    $button = '<div class="d-flex justify-content-center">';
                    $button .= '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-warning btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button></div>';
                    return $button;
                })
                ->rawColumns(['option'])
                ->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {

            $this->validator($request->all())->validate();

            Food::create([
                'name'          => $request->name,
                'restaurant'    => $request->restaurant,
                'price'         => $request->price,
                'discount'      => $request->discount
            ]);

            return response()->json(['status' => 'success']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Food::where('id', $id)->first();

            return response()->json(['data' => $data]);
        }
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
        if ($request->ajax()) {
            $this->validator($request->all())->validate();

            Food::where('id', $id)->update([
                'name'          => $request->name,
                'restaurant'    => $request->restaurant,
                'price'         => $request->price,
                'discount'      => $request->discount,
                'is_active'     => $request->is_active,
            ]);

            return response()->json(['status' => 'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            Food::where('id', $id)->delete();

            return response()->json(['status' => 'success']);
        }
    }
}
