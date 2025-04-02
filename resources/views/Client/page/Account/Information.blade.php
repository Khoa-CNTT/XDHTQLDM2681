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
                    <li class="account__menu--list"><a href="login.html">Log Out</a></li>
                </ul>
            </div>
            <div class="account__wrapper">
                <div class="account__content">
                    <h2 class="account__content--title h3 mb-20">Personal Information</h2>
                    <div class="account__details two" id="profileDetails">
                        <h3 class="account__details--title h4">Profile Details</h3>
                        <p class="account__details--desc" id="profileInfo">Name: John Doe <br> Email: john.doe@example.com <br> Phone: +1234567890 <br> Date of Birth: 01/01/1990 <br> Address: 123 Main St, City, Country</p>
                        <div class="account__details--footer d-flex" id="profileButtons">
                            <button class="account__details--footer__btn" type="button" onclick="enableEdit()">Edit</button>
                            <button class="account__details--footer__btn" type="button">Delete Account</button>
                        </div>
                    </div>
                    <div id="editForm" style="display: none;">
                        <h3 class="account__details--title h4">Edit Profile</h3>
                        <form id="profileForm">
                            <label>Name: <input type="text" id="editName" value="John Doe"></label><br>
                            <label>Email: <input type="email" id="editEmail" value="john.doe@example.com"></label><br>
                            <label>Phone: <input type="text" id="editPhone" value="+1234567890"></label><br>
                            <label>Date of Birth: <input type="date" id="editDOB" value="1990-01-01"></label><br>
                            <label>Address: <input type="text" id="editAddress" value="123 Main St, City, Country"></label><br>
                            <h3 class="account__details--title h4">Change Password</h3>
                            <label>New Password: <input type="password" id="editPassword"></label><br>
                            <label>Confirm Password: <input type="password" id="confirmPassword"></label><br>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-success" onclick="saveChanges()">Save</button>
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
</script>
@endsection