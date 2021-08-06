<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <a href="javascript:void(0)" data-id="' . $row->id . '" 
                    class="btn btn-outline-primary btn-sm edit" data-toggle="modal" data-target="#editModal">
                    <i class="fas fa-edit"></i></a>
                    <a href="' . route('admin.category.destroy', [$row->id]) . '" class="btn btn-outline-danger btn-sm" id="delete_category"><i class="fas fa-trash"></i></a>
                    
                    ';
                    return $actionBtn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.category.index');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'category_name'  => 'required|unique:categories|max:255',
        ]);

        $data = array(
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),

        );

        DB::table('categories')->insert($data);

        // $data = new Category();
        // $data->category_name = $request->category_name;
        // $data->save();

        return response()->json('Successfully Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = DB::table('categories')->where('id', $id)->first();

        // return view('backend.category.edit', compact('data'));
    }

    public function editcat($id)
    {
        $data = DB::table('categories')->where('id', $id)->first();

        return view('backend.category.edit', compact('data'));
    }
    public function updateCategory(Request $request)
    {
        $this->validate($request, [

            'category_name'  => 'required|unique:categories|max:255',
        ]);

        $data = array(
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),

        );

        DB::table('categories')->where('id', $request->id)->update($data);

        // $data = new Category();
        // $data->category_name = $request->category_name;
        // $data->save();

        return response()->json('Successfully Updated!');
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
        // $data = Category::find($id);

        // return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {

            $category->delete();
        }

        return response()->json('Successfully Deleted!');

        return back();
    }
}
