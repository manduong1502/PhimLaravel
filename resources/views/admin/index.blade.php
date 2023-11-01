
<!DOCTYPE HTML>
<html>

<head>
	@include('admin.include.head')
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">


        @include('admin.include.header')
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="media">
                    <h2 class="title1">Media Objects</h2>
                    <div class="col_3">
                        <div class="col-md-3 widget widget1">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-dollar icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>$452</strong></h5>
                                    <span>Total Revenue</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>$1019</strong></h5>
                                    <span>Online Revenue</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-money user2 icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>$1012</strong></h5>
                                    <span>Expenses</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>$450</strong></h5>
                                    <span>Expenditure</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 widget">
                            <div class="r3_counter_box">
                                <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                                <div class="stats">
                                    <h5><strong>1450</strong></h5>
                                    <span>Total Users</span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="bs-example5 widget-shadow container" data-example-id="default-media">
                        <main>
							@yield('admin.content')
						</main>
                    </div>

                </div>
            </div>
        </div>
        <!--footer-->
        @include('admin.include.footer')
        <!--//footer-->
    </div>

	@include('admin.include.script')

</body>

</html>
