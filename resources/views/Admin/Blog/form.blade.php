<div class="modal fade bd-example-modal-lg" id="formModel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formSubmit">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="titleOfModel"><i class="ti-marker-alt m-r-10"></i> Add new </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">



                        <div class="col-md-6">
                            <div class="form-group">
<<<<<<< HEAD
                                <label for="example-email">العنوان</label>
                                <input type="text" id="title" name="title" required class="form-control"   >
=======
                                <label for="example-email"> صوره </label>
                                <input type="file" id="image" name="image"  class="form-control"   >
>>>>>>> 1034e76b31867aad06a845b873c013665204d551
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">العنوان بالانجليزيه</label>
                                <input type="text" id="title_en" name="title_en" required class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email"> صوره </label>
                                <input type="file" id="image" name="image" required class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">عرض كنصيحه رئيسيه</label>
                                <select  id="status" name="status"  class="form-control"   >
                                    <option value="1">نعم</option>
                                    <option value="2">لا</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-email">المحتوى</label>
                                <textarea type="text" id="content" name="content"  class="form-control"  required></textarea>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-email">المحتوى بالانجليزيه</label>
                                <textarea type="text" id="content_en" name="content_en"  class="form-control"  required></textarea>

                            </div>
                        </div>

                    </div>
                </div>
                <div id="err"></div>
                <input type="hidden" name="id" id="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-dismiss="modal">اغلاق</button>
                    <button type="submit" id="save" class="btn btn-success"><i class="ti-save"></i> حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
