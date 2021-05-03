<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Main_info;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class Main_infoController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Main_info::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.Main_info.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Main_info = Main_info::find($id);
        return $Main_info;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Main_info = Main_info::find($request->id);
        $this->save_Main_info($request,$Main_info);
        return $this->apiResponseMessage(1,'تم تعديل المعلومات بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_Main_info($request,$Main_info){
        $Main_info->site_name=$request->site_name;
        $Main_info->phone=$request->phone;
        $Main_info->email=$request->email;
        $Main_info->about_site=$request->about_site;
        if($request->logo) {
            deleteFile('Main_info',$Main_info->logo);
            $Main_info->logo=saveImage('Main_info',$request->logo);
        }
        $Main_info->save();
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
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('logo', function ($data) {
            $image = '<a href="'. getImageUrl('Main_info',$data->logo).'" target="_blank">'
                .'<img  src="'. getImageUrl('Main_info',$data->logo) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','logo'=>'logo'])->make(true);
    }
}
