@extends('Client.page.Account.settingmaster')
@section('settingaccount_content')
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h2 class="account__content--title h3 mb-20">Addresses</h2>
                            <button class="new__address--btn btn mb-25" type="button">Add a new address</button>
                            <div class="account__details two">
                                <h3 class="account__details--title h4">Default</h3>
                                <p class="account__details--desc">Admin <br> Dhaka <br> Dhaka 12119 <br> Bangladesh</p>
                                <a class="account__details--link" href="my-account-2.html">View Addresses (1)</a>
                            </div>
                            <div class="d-flex justify-content-start gap-3 mt-3">
                                <button type="button" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete Account
                                </button>
                            </div>
                            
                        </div>
                    </div>
        <script>
</script>
    @endsection