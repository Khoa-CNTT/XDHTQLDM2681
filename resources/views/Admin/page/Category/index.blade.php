@extends('Admin.share.master')
@section('noi_dung')
    <div class="row" id="app">
        <div class=" col-sm-2  col-4">
            <div class="card border-primary border-bottom border-3 border-0">
                <div class="card-header">
                    <h3>Thêm mới danh mục</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="from-label">
                                Tên danh mục
                            </label>
                            <input v-model="add_cate.title" v-on:blur="checkSlug()" type="text"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="from-label">
                                Tình trạng
                            </label>
                            <select v-model="add_cate.status" class="form-control">
                                <option>--Vui lòng nhấn chọn</option>
                                <option value="1">Hiển thị</option>
                                <option value="0">ẩn</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <button id="add" type="submit" class="btn btn-primary" v-on:click="AddCate()">Xác nhận</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card border-primary border-bottom border-3 border-0">
                <div class="card-hedaer">
                    Danh sách danh mụ<!--  -->
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <button class="btn btn-danger" v-on:click="Clear()">Xóa</button>
                                </th>
                                <th class="text-center">Tên danh mục</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list">
                                <tr>
                                    <th class="text-center align-middle">
                                        <input type="checkbox" v-model="value.check">
                                    </th>
                                    <td class="align-middle">@{{ value.title }}</td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="changeStatus(value)" v-if="value.status == 1"
                                            class="btn btn-primary">Hiển Thị</button>
                                        <button v-on:click="changeStatus(value)" v-else="value.status == 0"
                                            class="btn btn-danger">Tạm
                                            Tắt</button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="edit_cate = Object.assign({}, value)" data-bs-toggle="modal"
                                            data-bs-target="#updateModal" class="btn btn-info">Cập Nhật</button>
                                        <button v-on:click="del_cate = Object.assign({}, value)" class="btn btn-danger ml-1"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa Bỏ</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Danh Mục</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Tên danh mục</label>
                                        <input v-model="edit_cate.title" v-on:blur="checkSlug()" type="text"
                                            class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tình Trạng</label>
                                        <select v-model="edit_cate.status" class="form-control">
                                            <option value="1">Hiển Thị</option>
                                            <option value="0">Tạm Tắt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button v-on:click="accpectUpdate()" type="button" class="btn btn-warning">Xác
                                        Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa danh mục</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-primary" role="alert">
                                        Bạn có chắc chắn muốn xóa khu vực: <b class="text-danger text-uppercase">@{{
                                            del_cate.title }}</b> này không?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" v-on:click="accpectDel()"
                                        data-bs-dismiss="modal">Xác Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: "#app",
            data: {
                list: [],
                add_cate: {

                },
                edit_cate: {

                },
                del_cate: {},
            },
            created() {
                this.LoadData();
            },
            methods: {
                LoadData() {
                    axios
                        .get("/admin/category/data")
                        .then((res) => {
                            // console.log(res.data.list);

                            this.list = res.data.list;
                        });
                },
                AddCate() {
                    axios
                        .post("/admin/category/create", this.add_cate)
                        .then((res) => {

                            if (res.data.status == 1) {
                                toastr.success(res.data.message, "Success");
                                this.LoadData();
                                this.add_cate = {};
                                $("#add").removeAttr("disabled");
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.message, "Error");
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.message, "Warning");
                            }



                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function (k, v) {
                                toastr.error(v[0]);
                            })

                        });;

                },
                changeStatus(payload) {

                    axios
                        .post("/admin/category/changeStatus", payload)
                        .then((res) => {
                             toastr.success(res.data.message, "success");
                            this.LoadData();
                        });
                },
                DataEdit() {
                    axios
                        .get("/admin/category/Edit", this.edit_cate)
                        .then((res) => {

                            if (res.data.status == 1) {
                                toastr.success(res.data.message, "Success");
                                this.LoadData();
                            this.edit_cate = {

                            },
                                this.LoadData();
                        }

                        });
                },
                accpectUpdate() {
                    axios
                        .post("/admin/category/Update", this.edit_cate)
                        .then((res) => {
                             if (res.data.status == 1) {
                           toastr.success(res.data.message, "Success");
                            this.LoadData();
                            $('#updateModal').modal('hide');
                             }

                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function (k, v) {
                                toastr.error(v[0]);
                            })

                        });;
                },
                accpectDel() {
                    axios
                        .post("/admin/category/delete", this.del_cate)
                        .then((res) => {

                             toastr.success(res.data.message, "Success");
                            this.LoadData();
                        });
                },
                Clear() {
                    // console.log(123);


                    axios
                        .post("/admin/category/deleteAll", this.list)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message, "Success");
                                this.LoadData();

                            }

                        });
                },
                checkSlug() {
                    var payload = {
                        'title': this.add_cate.title,
                    };
                    axios
                        .post('/admin/category/checkSlug', payload)
                        .then((res) => {
                            if (res.data.status == 1) {
                                toastr.success(res.data.message, "Success");
                                $("#add").removeAttr("disabled");
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.message, "Error");
                                $("#add").prop('disabled', true);
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.message, "Warning");
                            }
                        });
                },


            },
        });
    </script>
@endsection
