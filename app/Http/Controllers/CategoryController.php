<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.page.Category.index');
    }

    public function getdata()
    {
        $list = Category::get();
        return response()->json([
            "list" => $list

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateCategoryRequest $request)
    {
        $data = $request->all();

        $cate = new Category();
        $cate->title = $data["title"];
        $cate->status = $data["status"];

        // dd($data);
        return response()->json([
            "status" => true,
            "message" => "Đã tạo mới thành công",
        ]);
    }

    public function changeStatus(Request $request)
    {
        $cate = Category::where("id", $request->id)->first();
        if ($cate) {
            $cate->status = !$cate->status;
            $cate->save();
            return response()->json([
                "status" => true,
                "message" => "đã đổi trạng thái thành công",

            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "đã đổi  trạng thái không  thành công",

            ]);
        }
    }
    public function delete(Request $request)
    {
        $cate = Category::find($request->id);
        $cate->delete();
        return response()->json([
            "status" => true,
            "message" => "đã xóa thành công",

        ]);
    }
    public function checkSlug(Request $request)
    {
        if (isset($request->id)) {
            $cate = Category::where("title", $request->title)
                ->where("id", "<>", $request->id)->first();
        } else {
            $cate = Category::where("title", $request->title)
                ->first();
        }
        if ($cate) {
            return response()->json([
                'status'    => false,
                'message'   => 'Tên danh mục đã tồn tại!',
            ]);
        } else {
            return response()->json([
                'status'    => true,
                'message'   => 'Tên danh mục có thể sử dụng!',
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request)
    {
        $check = Category::where("id", $request->id)->first();
        $data = $request->all();

        if ($check) {
            $check->update($data);

            // dd($check);
            // dd($data);
            $check->save();
            return response()->json([
                "status" => true,
                "message" => "đã cập nhật  thành công",

            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "không thành công!",

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAll(Request $request)
    {
        $data = $request->all();
        $str = "";
        foreach ($data as $key => $value) {
            if (isset($value["check"])) {
                $str .= $value["id "]  . ",";
            }
            $data_id = explode(",", rtrim($str, ","));
            foreach ($data_id as $k => $v) {
                $cate = Category::where("id", $v);
                if ($cate) {
                    $cate->delete();
                } else {
                    return response()->json([
                        'status'    => false,
                        'message'   => 'Đã có lỗi sự cố!',
                    ]);
                }
            }
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Thành công!',
        ]);
    }
}
