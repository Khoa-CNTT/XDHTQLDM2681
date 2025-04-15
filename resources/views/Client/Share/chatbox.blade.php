<!-- Hộp thoại chat -->
<div class="chat-box" id="chatbot-box">
    <div class="chat-header">
        <span>💬 Chat với Nhân viên</span>
        <button id="chat-close-btn" style="border: none; background: none; font-size: 18px;">✖</button>
    </div>
    <div class="chat-content" id="chat-messages"></div>
    <div style="display: flex; padding: 10px;">
        <input type="text" id="chat-input" placeholder="Nhập câu hỏi..." />
        <button id="chat-send-btn">Gửi</button>
    </div>
</div>

<!-- CSS -->
<style>
    .chat-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        display: none;
        z-index: 999;
    }

    .chat-box {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 320px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        display: none;
        flex-direction: column;
        overflow: hidden;
        z-index: 1000;
    }

    .chat-box.active {
        display: flex;
    }

    .chat-overlay.active {
        display: block;
    }

    .chat-header {
        background: #ff9800;
        padding: 10px;
        color: white;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-content {
        padding: 10px;
        height: 200px;
        overflow-y: auto;
        background: #f5f5f5;
    }

    .chat-message {
        background: #ffcc80;
        padding: 8px;
        margin-bottom: 5px;
        border-radius: 5px;
    }

    input[type="text"] {
        flex: 1;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 5px;
        outline: none;
    }

    button {
        background: #2196f3;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<!-- jQuery + JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function toggleChat() {
        const chatBox = $("#chatbot-box");
        const overlay = $("#chat-overlay");
        const button = $(".hotline-phone-ring-wrap");

        if (chatBox.hasClass("active")) {
            chatBox.removeClass("active");
            overlay.removeClass("active");
            button.show();
        } else {
            chatBox.addClass("active");
            overlay.addClass("active");
            button.hide();
        }
    }

    $(document).ready(function () {
        // Gán sự kiện click mở chat
        $("#chat-toggle-btn").click(toggleChat);

        // Gán sự kiện click đóng chat
        $("#chat-close-btn").click(toggleChat);

        // Gán sự kiện click vào overlay cũng đóng chat
        $("#chat-overlay").click(toggleChat);

        // Gửi tin nhắn
        $("#chat-send-btn").click(function () {
            let msg = $("#chat-input").val().trim();
            if (!msg) return;

            $("#chat-input").val("");
            $("#chat-messages").append(`<div class="chat-message"><b>Bạn:</b> ${msg}</div>`);

            $.ajax({
                url: "{{ route('chatbox') }}", // sử dụng tên route 'chatbox'
                type: "POST",
                contentType: "application/json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ prompt: msg }),
                success: function (data) {
                    $("#chat-messages").append(`<div class="chat-message"><b>Nhân viên:</b> ${data.reply || 'Xin lỗi, hiện tại chưa có phản hồi.'}</div>`);
                    $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
                },
                error: function () {
                    $("#chat-messages").append(`<div class="chat-message"><b>Lỗi:</b> Không thể kết nối với hệ thống.</div>`);
                }
            });

        });

        // Gửi khi nhấn Enter
        $("#chat-input").keypress(function (e) {
            if (e.which === 13) {
                $("#chat-send-btn").click();
                return false;
            }
        });
    });
</script>
