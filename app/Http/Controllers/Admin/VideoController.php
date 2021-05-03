<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Videos;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Videos::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.Videos.index');
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
                'video' => 'required',
                'simple_desc' => 'required',
            ],
            [
                'video.required' =>'من فضلك ادخل الفيديو  ',
                'simple_desc.required' =>'من فضلك ادخل وصف الفيديو',
            ]
        );
        $this->save_Videos($request,new Videos);
        return $this->apiResponseMessage(1,'تم اضافة الفيديو بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Videos = Videos::find($id);
        return $Videos;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Videos = Videos::find($request->id);
        $this->save_Videos($request,$Videos);
        return $this->apiResponseMessage(1,'تم تعديل الفيديو بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_Videos($request,$Videos){
        $Videos->name=$request->name;
        $Videos->status=$request->status;
        $Videos->simple_desc=$request->simple_desc;
        if($request->cover) {
            deleteFile('Videos_cover',$Videos->cover);
            $Videos->cover=saveImage('Videos_cover',$request->cover);
        }
        if($request->video) {
            deleteFile('Videos',$Videos->video);
            $Videos->video=saveImage('Videos',$request->video);
        }
        $Videos->save();
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
            $Videos = Videos::whereIn('id', $ids)->get();
            foreach($Videos as $row){
                $this->deleteRow($row);
            }
        } else {
            $Videos = Videos::find($id);
            $this->deleteRow($Videos);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Videos){
        deleteFile('Videos_cover',$Videos->cover);
        deleteFile('Videos',$Videos->video);
        $Videos->delete();
    }
    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $Videos = Videos::find($id);
        $Videos->status=$request->status;
        $Videos->save();
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
        })->editColumn('cover', function ($data) {
            $image = '<a href="'. getImageUrl('Videos_cover',$data->cover).'" target="_blank">'
                .'<img  src="'. getImageUrl('Videos_cover',$data->cover) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('video', function ($data) {
            $image = '<a href="'. getImageUrl('Videos',$data->video).'" target="_blank">اضغط لرؤية الفيديو</a>';
            return $image;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" >معروضة</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut"  style="cursor:pointer !important" >غير معروضة</button>';
            return $status;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','cover'=>'cover','status'=>'status','video'=>'video'])->make(true);
    }
}
