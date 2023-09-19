@include('layouts.admin_layout.head-main')

<head>

    @section('title') {{'BusinessOdisha'}} @endsection

    @include('layouts.admin_layout.head')

    @include('layouts.admin_layout.head-style')

</head>


<!-- Begin page -->

<body data-topbar="dark">
    <div id="layout-wrapper">

        @include('layouts.admin_layout.menu')


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <?php
                $maintitle = "Ecommerce";
                $title = "Seller Enquiry History";
                ?>
                    @include('layouts.admin_layout.breadcrumb')
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                            <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Search..." id="search">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div> -->
                                        </div>
                                        <div class="col-sm-8">
                                            <!-- <div class="text-sm-end">
                                                            <a href="{{ url('call-me-back-history/') }}"
                                                                class="btn btn-info waves-effect waves-light btn-xs">History</i></a>
                                            
                                        </div> -->
                                        </div><!-- end col-->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check" id="services-table">
                                            <thead class="table-light">
                                                <tr>

                                                    <th class="align-middle">S.NO</th>
                                                    <th class="align-middle">Seller Name</th>
                                                    <th class="align-middle">Prospects Name</th>
                                                    <th class="align-middle">Phone</th>

                                                    <th class="align-middle">Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($count > 0)
                                                @foreach ($service_enquiry as $data)
                                                <tr>

                                                    <td>{{ $data->id}}</td>
                                                    <td> {{ $data->seller->company_name}} </td>
                                                    <td> {{ $data->name}} </td>
                                                    <td> {{ $data->mobile}} </td>

                                                    <td>
                                                        <div class="d-flex gap-3">
                                                        @if($data->history_status == 1)
                                                        <form
                                                                action="{{ url('seller-enquiry-reopen', ['id' => $data->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="service_status">
                                                                <button type="submit"
                                                                    class="btn btn-info waves-effect waves-light btn-xs">Re-Open</button>
                                                            </form>
                                                            @endif
                                                            
                                                            <form action="{{ url('seller-service-history-delete/'.$data->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger show_confirm">Delete</button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>

                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6" style="
                                                text-align: center;">No record found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        {{ $service_enquiry->links() }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->




                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.admin_layout.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('layouts.admin_layout.right-sidebar')
    @include('layouts.admin_layout.vendor-scripts')
    <script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if (!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
    </script>

</body>

</html>