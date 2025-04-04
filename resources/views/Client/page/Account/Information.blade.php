@extends('Client.Share.master')
@section('content')
<section class="my__account--section section--padding">
    <div class="container">
        <div class="my__account--section__inner border-radius-10 d-flex">
            <div class="account__left--sidebar">
                <h2 class="account__content--title h3 mb-20">My Profile</h2>
                <ul class="account__menu">
                    <li class="account__menu--list"><a href="my-account.html">Dashboard</a></li>
                    <li class="account__menu--list"><a href="my-account-2.html">Addresses</a></li>
                    <li class="account__menu--list active"><a href="information.html">Information</a></li>
                    <li class="account__menu--list">
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <a href="#" onclick="confirmLogout(event)">Log Out</a>
        </form>
                    </li>
                </ul>
            </div>
            <div class="account__wrapper">
                <div class="account__content">
                    <h2 class="account__content--title h3 mb-20">Personal Information</h2>
                    <div class="account__details two" id="profileDetails">
                        <h3 class="account__details--title h4">Profile Details</h3>
                        <p class="account__details--desc" id="profileInfo">
                            Name : {{$user->username}} <br>
                            Email : {{ $user->email }} <br>
                            Phone : {{ $user->PhoneNumber ?? 'Thêm số điện thoại' }} <br>
                            Address : {{ $user->Address ?? 'Thêm địa chỉ' }}</p>
                        <div class="account__details--footer d-flex" id="profileButtons">
                            <button class="account__details--footer__btn" type="button" onclick="enableEdit()">Edit</button>
                            <button class="account__details--footer__btn" type="button">Delete Account</button>
                        </div>
                    </div>
                    <div id="editForm" style="display: none;">
                        <h3 class="account__details--title h4">Edit Profile</h3>
                        <form method="POST" action="{{ url('/client/information/update') }}">
                            @csrf
                            <label>Name: <input type="text" name="username"  value="{{ $user->username }}"></label><br>
                            <label>Email: <input type="email" name="email" value="{{ $user->email }}"></label><br>
                            <label>Phone: <input type="text" name="PhoneNumber" value="{{ $user->PhoneNumber }}"></label><br>
                            <label>Address: <input type="text"  name="Address" value="{{ $user->Address }}"></label><br>
                            <h3 class="account__details--title h4">Change Password</h3>
                            <label>New Password: <input name="password" type="password"></label><br>
                            <label>Confirm Password: <input name="password_confirmation" type="password"></label><br>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

    function saveChanges() {
        const name = document.getElementById('editName').value;
        const email = document.getElementById('editEmail').value;
        const phone = document.getElementById('editPhone').value;
        const dob = document.getElementById('editDOB').value;
        const address = document.getElementById('editAddress').value;
        const password = document.getElementById('editPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (password && password !== confirmPassword) {
            alert("Passwords do not match!");
            return;
        }

        document.getElementById('profileInfo').innerHTML = `Name: ${name} <br> Email: ${email} <br> Phone: ${phone} <br> Date of Birth: ${dob} <br> Address: ${address}`;
        cancelEdit();
    }
    function confirmLogout(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của link
        let confirmAction = confirm("Bạn có chắc chắn muốn đăng xuất?");
        if (confirmAction) {
            document.getElementById('logoutForm').submit(); // Nếu chọn "OK", thực hiện logout
        }
    }
</script>
@endsection
