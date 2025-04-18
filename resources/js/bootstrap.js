// Import Echo và Pusher
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Sử dụng trực tiếp các giá trị từ .env đã được xử lý thông qua Mix
window.Pusher = Pusher;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'daffc7e94b204339825f',  // Key từ .env
    cluster: 'ap1',                // Cluster từ .env
    forceTLS: true,
    encrypted: true
});


// Import axios và cấu hình nó
import axios from 'axios';
window.axios = axios;

// Đảm bảo gửi các yêu cầu AJAX với header X-Requested-With cho Laravel
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
