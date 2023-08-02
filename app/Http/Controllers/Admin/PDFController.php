<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Profile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\PdfCategory;

class PDFController extends Controller
{
    public function datatable(Request $request)
    {
        $data = File::with('category')->orderBy('id', 'desc')->where('uploaded_by',$request->profile_id);

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('category', function ($row) {
                if (isset($row->category)) {
                    return $row->category->category_name;
                }
            })
            ->editColumn('value', function ($row) {
                if($row->type == 'image'){
                    return '<img src"'.$row->value.'" width="70px" height="40px">';
                }else{
                    return $row->value;
                }
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">Active</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">inactive</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })


            ->rawColumns([ 'checkbox', 'is_active','actions','value'])
            ->make();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required',
        ]);
        try {
            if ($request->hasFile('name')) {
                $file = $request->file('name');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = public_path('uploads/pdf');
                $file->move($filePath, $fileName);
            }
            $pro = Profile::findOrFail($request->profile_id);
            $data =  new File();
            $data->name=$fileName;
            $data->type='pdf';
            $data->uploaded_by=$request->profile_id;
            $data->category_id=$request->category_id;
            $data->save();
            return redirect()->back()->with('message', trans('Operation  success'));
        } catch (\Exception $e) {
            dd($e);
            return "Uploading failed";
        }
    }

    public function storepdfcategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        try {
            $pdfCategory = new PdfCategory();
            $pdfCategory->category_name = $request->category_name;
            $pdfCategory->profile_id = $request->profile_id;
            $pdfCategory->save();
            $pdfCategories = PdfCategory::get();
            return response()->json([
                'status' => true,
                'message' => 'Added successfully',
                'pdf_categories' => $pdfCategories
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'pdf_categories' => []
            ]);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
