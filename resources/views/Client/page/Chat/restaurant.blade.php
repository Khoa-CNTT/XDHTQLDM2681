
    @extends('Restaurant.share.master')
    @section('noi_dung')
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
                padding: 20px;
            }

            #chat-box {
                border: 1px solid #ccc;
                height: 400px;
                overflow-y: scroll;
                padding: 10px;
                margin-bottom: 10px;
                background-color: #fff;
                border-radius: 10px;
            }

            .message {
                max-width: 60%;
                padding: 10px 15px;
                border-radius: 15px;
                margin: 8px 0;
                clear: both;
                word-wrap: break-word;
            }

            .customer {
                background-color: #dcf8c6;
                float: right;
                text-align: right;
                border-bottom-right-radius: 0;
            }

            .restaurant {
                background-color: #e2e2e2;
                float: left;
                text-align: left;
                border-bottom-left-radius: 0;
            }

            #chat-form {
                display: flex;
                gap: 10px;
            }

            #message {
                flex: 1;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 8px;
            }

            button {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 8px;
                cursor: pointer;
            }

            button:hover {
                background-color: #45a049;
            }
        </style>

    <h2>Giao diện nhà hàng</h2>

<div id="chat-box">
    <!-- Hiển thị các tin nhắn cũ từ session -->
    @foreach($messages as $msg)
        <div class="message {{ $msg['sender'] == 'restaurant' ? 'restaurant' : 'customer' }}">
            <b>{{ $msg['sender'] == 'restaurant' ? 'Nhà hàng' : 'Khách hàng' }}:</b><br>
            {{ $msg['message'] }}
        </div>
    @endforeach
</div>

    <form id="chat-form">
        <input type="text" id="message" placeholder="Nhập tin nhắn..." />
        <button type="submit">Gửi</button>
    </form>

   <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    const restaurantId = {{ $restaurantId }};
    const chatBox = document.getElementById('chat-box');
    const form = document.getElementById('chat-form');
    const input = document.getElementById('message');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Kết nối đến Pusher
    const pusher = new Pusher('daffc7e94b204339825f', {
            cluster: 'ap1',  // Chắc chắn sử dụng đúng cluster từ Pusher Dashboard
            forceTLS: true   // Bắt buộc sử dụng HTTPS, tự động dùng port 443
        });

    pusher.connection.bind('state_change', function (states) {
            console.log('kết nối thành công:', states);
        });

        pusher.connection.bind('error', function (error) {
            console.log('Pusher error:', error);
        });


    // Đăng ký kênh theo ID nhà hàng
    const channel = pusher.subscribe('chat.' + restaurantId);
    console.log('Subscribed to channel:', 'chat.' + restaurantId);

    // Nhận tin nhắn từ khách hàng
    channel.bind('user-message', function (data) {
    console.log(data);

       const div = document.createElement('div');
       div.className = 'message customer';
       div.innerHTML = `<b>Khách hàng:</b><br>${data.message}`;
       chatBox.appendChild(div);
       chatBox.scrollTop = chatBox.scrollHeight;
    });

    // Gửi tin nhắn từ nhà hàng
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const msg = input.value.trim();
        if (!msg) return;

        const div = document.createElement('div');
        div.className = 'message restaurant';
        div.innerHTML = `<b>Nhà hàng:</b><br>${msg}`;
        chatBox.appendChild(div);
        chatBox.scrollTop = chatBox.scrollHeight;

        console.log('Sending message from restaurant:', msg);  // Log tin nhắn gửi đi

        fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': csrfToken
            },
            body: `message=${encodeURIComponent(msg)}&sender=restaurant&restaurant_id=${restaurantId}`
        })
        .then(response => response.json())
        .then(data => {
            console.log('Server response:', data);  // Log phản hồi từ server
        })
        .catch(error => {
            console.error('Error sending message:', error);  // Log lỗi nếu có
        });

        input.value = '';
    });
</script>

@endsection
