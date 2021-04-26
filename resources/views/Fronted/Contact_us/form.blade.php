@extends('Fronted.layouts.master')

@section('title')
{{trans('nedal.contact_us')}}
@endsection

@section('content')
    <div class="section_background">
        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form id="contact" method="post">
                            @csrf
                            <div class="form-group">
<<<<<<< HEAD
                                <label for="exampleInputEmail1">{{trans('nedal.name')}}</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> {{trans('nedal.phone')}}</label>
                                <input type="text" name="phone" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> {{trans('nedal.email')}}</label>
                                <input type="email" name="email" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{trans('nedal.write_ur_question')}}</label>
                                <textarea rows="12" name="topic" class="form-control" ></textarea>
=======
                                <label for="exampleInputEmail1">الإسم</label>
                                <input type="text" required name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">رقم الهاتف</label>
                                <input type="text" required name="phone" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">البريد الإلكتروني</label>
                                <input type="email" required name="email" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">اكتب استفسارك</label>
                                <textarea rows="12" required name="topic" class="form-control" ></textarea>
>>>>>>> 1034e76b31867aad06a845b873c013665204d551
                            </div>
                            <button id="save" class="moreService">{{trans('nedal.send')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    @include('Admin.includes.scripts.AlertHelper')
    <script>
        $('#contact').submit(function (e) {
            e.preventDefault();
            $("#save").attr("disabled", true);

            Toset('تم تنفيذ طلبك', 'info', 'تتم مراجعه طلبك ', false);
            var formData = new FormData($('#contact')[0]);
            $.ajax({
                url: '/api/massage',
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    $("#save").attr("disabled", false);
                    $.toast().reset('all');
                    if (data.status == 1) {
                        swal(data.message, {
                            icon: "success",
                        });
                        $('#contact')[0].reset();
                    }else {
                        swal(data.message, {
                            icon: "error",
                        });
                    }
                },error : function(e){
                    $("#save").attr("disabled", false);

                }
            });
        })
    </script>
@endsection


