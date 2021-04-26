<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Services;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Services::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.Services.index');
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
                'logo' => 'required|image',
            ],
            [
                'logo.required' =>'من فضلك ادخل صوره الخدمه ',
                'logo.image' =>' صوره الخدمه يجب ان يكون صوره',
            ]
        );
        $this->save_Services($request,new Services);
        return $this->apiResponseMessage(1,'تم اضافة الخدمه بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Services = Services::find($id);
        return $Services;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Services = Services::find($request->id);
        $this->save_Services($request,$Services);
        return $this->apiResponseMessage(1,'تم تعديل الخدمه بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_Services($request,$Services){
        $Services->service_name=$request->service_name;
        $Services->about_service_en=$request->about_service_en;
        $Services->service_name_en=$request->service_name_en;
        $Services->about_service=$request->about_service;
        if($request->logo) {
            deleteFile('Services',$Services->logo);
            $Services->logo=saveImage('Services',$request->logo);
        }
        $Services->save();
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
            $Services = Services::whereIn('id', $ids)->get();
            foreach($Services as $row){
                $this->deleteRow($row);
            }
        } else {
            $Services = Services::find($id);
            $this->deleteRow($Services);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Services){
        deleteFile('Services',$Services->logo);
        $Services->delete();
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
        })->editColumn('logo', function ($data) {
            $image = '<a href="'. getImageUrl('Services',$data->logo).'" target="_blank">'
                .'<img  src="'. getImageUrl('Services',$data->logo) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','logo'=>'logo'])->make(true);
    }
}
