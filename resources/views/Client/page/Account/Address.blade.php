@extends('Client.Share.master')
@section('content')
<section class="my__account--section section--padding">
            <div class="container">
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">My Profile</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list"><a href="my-account.html">Dashboard</a></li>
                            <li class="account__menu--list active"><a href="my-account-2.html">Addresses</a></li>
                            <li class="account__menu--list"><a href="wishlist.html">Information</a></li>
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
                            <h2 class="account__content--title h3 mb-20">Addresses</h2>
                            <button class="new__address--btn btn mb-25" type="button">Add a new address</button>
                            <div class="account__details two">
                                <h3 class="account__details--title h4">Default</h3>
                                <p class="account__details--desc">Admin <br> Dhaka <br> Dhaka 12119 <br> Bangladesh</p>
                                <a class="account__details--link" href="my-account-2.html">View Addresses (1)</a>
                            </div>
                            <div class="account__details--footer d-flex">
                                <button class="account__details--footer__btn" type="button">Edit</button>
                                <button class="account__details--footer__btn" type="button">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
    function confirmLogout(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của link
        let confirmAction = confirm("Bạn có chắc chắn muốn đăng xuất?");
        if (confirmAction) {
            document.getElementById('logoutForm').submit(); // Nếu chọn "OK", thực hiện logout
        }
    }
</script>

    @endsection