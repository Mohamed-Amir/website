<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Blog::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.Blog.index');
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|image',
            ],
            [
                'image.required' =>'من فضلك ادخل صوره المدونه ',
                'image.image' =>' صوره المدونه يجب ان يكون صوره',
            ]
        );
        $this->save_blog($request,new Blog);
        return $this->apiResponseMessage(1,'تم اضافة المدونه بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Blog = Blog::find($id);
        return $Blog;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Blog = Blog::find($request->id);
        $this->save_blog($request,$Blog);
        return $this->apiResponseMessage(1,'تم تعديل المدونه بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_blog($request,$Blog){
        $Blog->title=$request->title;
        $Blog->title_en=$request->title_en;
        $Blog->content=$request->content;
        $Blog->content_en=$request->content_en;
        $Blog->status=$request->status;
        if($request->image) {
            deleteFile('Blog',$Blog->image);
            $Blog->image=saveImage('Blog',$request->image);
        }
        $Blog->save();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy($id,Request $request)
    {
        if ($request->type == 2) {
            $ids = explode(',', $id);
            $Blog = Blog::whereIn('id', $ids)->get();
            foreach($Blog as $row){
                $this->deleteRow($row);
            }
        } else {
            $Blog = Blog::find($id);
            $this->deleteRow($Blog);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Blog){
        deleteFile('Blog',$Blog->image);
        $Blog->delete();
    }
    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $Blog = Blog::find($id);
        $Blog->status=$request->status;
        $Blog->save();
        return 1;
    }
    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    private function mainFunction($data)
    {
        return Datatables::of($data)->addColumn('action', function ($data) {
            $options = '<td class="sorting_1"><button  class="btn btn-info waves-effect btn-circle waves-light" onclick="editFunction(' . $data->id . ')" type="button" ><i class="fa fa-spinner fa-spin" id="loadEdit_' . $data->id . '" style="display:none"></i><i class="sl-icon-wrench"></i></button>';
            $options .= ' <button type="button" onclick="deleteFunction(' . $data->id . ',1)" class="btn btn-dribbble waves-effect btn-circle waves-light"><i class="sl-icon-trash"></i> </button></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('Blog',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Blog',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" >معروضة</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut"  style="cursor:pointer !important" >غير معروضة</button>';
            return $status;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','image'=>'image','status'=>'status'])->make(true);
    }
}
