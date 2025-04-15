<script src="/assets/js/vendor/popper.js" defer="defer"></script>
<script src="/assets/js/vendor/bootstrap.min.js" defer="defer"></script>
<script src="/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="/assets/js/plugins/glightbox.min.js"></script>

<!-- Customscript js -->
<script src="/assets/js/script.js"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
{{-- {!! Toastr::render() !!} --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

