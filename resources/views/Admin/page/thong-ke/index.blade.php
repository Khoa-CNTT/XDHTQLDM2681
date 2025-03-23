@extends('Admin.share.master')
@section('noi_dung')
    <div id="app" class="container mt-5">
        <h1 class="text-center mb-4">Thống kê doanh thu</h1>

        <!-- Tổng doanh thu và tổng số lượng -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <p class="card-text fs-4">@{{ totalSale | currency }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Quantity Sold</h5>
                        <p class="card-text fs-4">@{{ totalQuantity }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tổng lợi nhuận -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Profit</h5>
                        <p class="card-text fs-4">@{{ totalProfit | currency }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thống kê theo món ăn -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Food Sales Details</h5>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Food Name</th>
                                    <th>Total Quantity Sold</th>
                                    <th>Total Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="food in foodDetails" :key="food . title">
                                    <td>@{{ food . title }}</td>
                                    <td>@{{ food . total_quantity }}</td>
                                    <td>@{{ (food . total_sale) | currency }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                totalSale: 0,
                totalQuantity: 0,
                totalProfit: 0,
                foodDetails: []
            },
            filters: {
                currency(value) {
                    return new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD'
                    }).format(value);
                }
            },
            mounted() {
                this.fetchData();
            },
            methods: {
                fetchData() {
                    axios.get('/admin/staticis/total')
                        .then(res => {
                            this.totalSale = res.data.total_sale;


                            this.totalQuantity = res.data.total_quantity;
                            this.totalProfit = res.data.total_profit;
                            this.foodDetails = res.data.customer;
                            //console.log(     this.foodDetails);
                        })
                        .catch(error => {
                            console.error("Error fetching data:", error);
                        });
                }
            }
        });
    </script>
@endsection --}}
