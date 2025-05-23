<!--end switcher-->
<!-- Bootstrap JS -->
<script src="/admin/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/plugins/simplebar/js/simplebar.min.js"></script>
<script src="/admin/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/admin/plugins/chartjs/js/Chart.min.js"></script>
<script src="/admin/plugins/chartjs/js/Chart.extension.js"></script>
<script src="/admin/js/index.js"></script>
<!--app JS-->
<script src="/admin/js/app.js"></script>
{{-- Đoạn JS Thêm Riêng --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"
    integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Thêm toastr.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Buttons (Xuất file) -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<!-- Export dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<!-- Khởi tạo bảng -->
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Xuất Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Xuất PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    text: 'In',
                    className: 'btn btn-secondary'
                }
            ]
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    $(document).ready(function () {
        var idDaNang = 48;

        // Lấy danh sách quận/huyện của Đà Nẵng
        $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idDaNang + '.htm', function (data_quan) {
            if (data_quan.error === 0) {
                // Reset các options
                $("#quan").html('<option value="">Chọn Quận/Huyện</option>');

                // Thêm các option quận/huyện vào dropdown
                $.each(data_quan.data, function (key_quan, val_quan) {
                    // Gửi full_name (tên quận) làm giá trị và hiển thị tên quận trong option
                    $("#quan").append('<option value="' + val_quan.full_name + '">' + val_quan.full_name + '</option>');
                });

                // Khi chọn quận => Lấy danh sách phường/xã
                $("#quan").change(function () {
                    var tenquan = $(this).val(); // Đây là tên quận bạn sẽ gửi về server

                    // Nếu bạn vẫn muốn hiện danh sách phường thì giữ đoạn sau
                    $.getJSON('https://esgoo.net/api-tinhthanh/3/' + tenquan + '.htm', function (data_phuong) {
                        if (data_phuong.error === 0) {
                            $("#phuong").html('<option value="">Chọn Phường/Xã</option>');
                            $.each(data_phuong.data, function (key_phuong, val_phuong) {
                                $("#phuong").append('<option value="' + val_phuong.full_name + '">' + val_phuong.full_name + '</option>');
                            });
                        }
                    });
                });
            }
        });
    });
</script>
