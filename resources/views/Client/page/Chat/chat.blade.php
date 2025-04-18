<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chat Realtime</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>


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

/* Tin nhắn của khách hàng */
.customer {
    background-color: #dcf8c6;
    float: right;
    text-align: right;
    border-bottom-right-radius: 0;
}

/* Tin nhắn của nhà hàng */
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
</head>

<body>
    <h2>Chat với nhà hàng: {{ $restaurant->name }}</h2>

    <div id="chat-box">
        @if (!empty($messages))
            @foreach ($messages as $msg)
                <div class="message {{ $msg['sender'] }}">
                    <b>{{ $msg['sender'] === 'customer' ? 'Bạn' : 'Nhà hàng' }}:</b><br>
                    {{ $msg['message'] }}
                    <br><small>{{ $msg['time'] ?? '' }}</small>
                </div>
            @endforeach

        @endif





    </div>

    <form id="chat-form">
        <input type="text" id="message" placeholder="Nhập tin nhắn..." autocomplete="off" />
        <button type="submit">Gửi</button>
    </form>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        const restaurantId = {{ $restaurant->id }};
        const sender = 'customer';
        const chatBox = document.getElementById('chat-box');
        const form = document.getElementById('chat-form');
        const input = document.getElementById('message');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Kết nối đến Pusher
        const pusher = new Pusher('daffc7e94b204339825f', {
            cluster: 'ap1',
            forceTLS: true
        });

        // Đăng ký kênh theo ID nhà hàng
        const channel = pusher.subscribe('chat.' + restaurantId);

        // Nhận tin nhắn từ nhà hàng
        channel.bind('res-message', function (data) {
            const div = document.createElement('div');
            div.className = 'message restaurant';
            div.innerHTML = `<b>Nhà hàng:</b><br>${data.message}`;
            chatBox.appendChild(div);
            chatBox.scrollTop = chatBox.scrollHeight;
        });

        // Gửi tin nhắn từ khách hàng
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const msg = input.value.trim();
            if (!msg) return;

            const div = document.createElement('div');
            div.className = 'message customer';
            div.innerHTML = `<b>Bạn:</b><br>${msg}`;
            chatBox.appendChild(div);
            chatBox.scrollTop = chatBox.scrollHeight;

            // Gửi tin nhắn tới server
            fetch('/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: `message=${encodeURIComponent(msg)}&sender=customer&restaurant_id=${restaurantId}`
            })
                .then(response => response.json())
                .then(data => console.log('Server response:', data))
                .catch(error => console.error('Error sending message:', error));

            input.value = ''; // Xóa ô nhập sau khi gửi
        });
    </script>
</body>


</html>
