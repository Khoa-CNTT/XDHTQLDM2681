@extends('Client.page.Account.settingmaster')
@section('settingaccount_content')
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Thông tin cá nhân</h2>
                        <div class="account__details two" id="profileDetails" style="display: {{ $errors->any() ? 'none' : 'block' }};">

                            <h3 class="account__details--title h4">Thông tin chi tiết</h3>
                            <p class="account__details--desc" id="profileInfo">
                                Họ và tên: {{$user->username}} <br>
                                Email : {{ $user->email }} <br>
                                Số điện thoại : {{ $user->PhoneNumber ?? 'Thêm số điện thoại' }} <br>
                                Địa chỉ : {{ $user->Address ?? 'Thêm địa chỉ' }}</p>
                            <div class="account__details--footer d-flex" id="profileButtons">
                                <button class="account__details--footer__btn" type="button" style="color:red" onclick="enableEdit()">Edit</button>
                            </div>
                        </div>
                    <div id="editForm" style="display: {{ $errors->any() ? 'block' : 'none' }};">

        <h3 class="account__details--title h4">Thông tin cá nhân</h3>
        <form method="POST" action="{{ url('/client/information/update') }}">
            @csrf
            <div style="margin-bottom: 1rem;">
                <label style="display: block;">Họ và tên:</label>
                <input type="text" name="username" value="{{ $user->username }}" style="width: 50%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px;">
                @error('username')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 1rem;">
                <label style="display: block;">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" style="width: 50%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px;">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                 @enderror
            </div>
            <div style="margin-bottom: 1rem;">
                <label style="display: block;">Số điện thoại:</label>
                <input type="text" name="PhoneNumber" value="{{ $user->PhoneNumber }}" style="width: 50%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px;">
                @error('PhoneNumber')
                <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>
            <div style="margin-bottom: 1rem;">
                <label style="display: block;">Địa chỉ:</label>
                <input type="text" name="Address" value="{{ $user->Address }}" style="width: 50%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px;">
                @error('Address')
                <div class="text-danger">{{ $message }}</div>
                  @enderror
            </div>
            <h3 class="account__details--title h4">Đổi mật khẩu</h3>
            <div style="margin-bottom: 1rem;">
                <label style="display: block;">Mật khẩu mới:</label>
                <input name="password" type="password" style="width: 50%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px;">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div style="margin-bottom: 1rem;">
                <label style="display: block;">Xác nhận mật khẩu:</label>
                <input name="password_confirmation" type="password" style="width: 50%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px;">
                @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
        <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; padding: 0.5rem 1rem; border-radius: 5px; color: white; line-height: 1.5; vertical-align: middle;">Save</button>
        <button type="button" class="btn btn-secondary" onclick="cancelEdit()" style="background-color: #6c757d; border: none; padding: 0.5rem 1rem; border-radius: 5px; color: white; line-height: 1.5; vertical-align: middle;">Cancel</button>
    </div>

        </form>
    </div>
                    </div>
                </div>
    <script>
        function enableEdit() {
            document.getElementById('profileDetails').style.display = 'none';
            document.getElementById('profileButtons').style.display = 'none';
            document.getElementById('editForm').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('profileDetails').style.display = 'block';
            document.getElementById('profileButtons').style.display = 'flex';
            document.getElementById('editForm').style.display = 'none';
        }

    </script>
@endsection
