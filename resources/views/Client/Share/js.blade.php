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
        // ID của Đà Nẵng (giả sử là 48, nếu không đúng bạn cần kiểm tra lại ID này)
        var idDaNang = 48;

        // Lấy quận huyện của Đà Nẵng
        $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idDaNang + '.htm', function (data_quan) {
            if (data_quan.error == 0) {
                $("#quan").html('<option value="0">Chọn Quận/Huyện</option>');
                $("#phuong").html('<option value="0">Chọn Phường/Xã</option>');
                $.each(data_quan.data, function (key_quan, val_quan) {
                    $("#quan").append('<option value="' + val_quan.id + '">' + val_quan.full_name + '</option>');
                });

                // Khi chọn quận, lấy danh sách phường xã
                $("#quan").change(function () {
                    var idquan = $(this).val();
                    $.getJSON('https://esgoo.net/api-tinhthanh/3/' + idquan + '.htm', function (data_phuong) {
                        if (data_phuong.error == 0) {
                            $("#phuong").html('<option value="0">Chọn Phường/Xã</option>');
                            $.each(data_phuong.data, function (key_phuong, val_phuong) {
                                $("#phuong").append('<option value="' + val_phuong.id + '">' + val_phuong.full_name + '</option>');
                            });
                        }
                    });
                });
            }
        });
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

