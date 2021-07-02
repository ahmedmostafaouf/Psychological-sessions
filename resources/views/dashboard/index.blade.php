<x-dashboard.app>
    <div class="page-wrapper">
        <x-dashboard.bredcrumb currentPage="Class"></x-dashboard.bredcrumb>
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales Summery -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- crypto -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card "style="background-color: #393e46">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-2">
                                    <h1 class="mb-0"><i style="color: #0b0b0b" class="fas fa-user"></i></h1></div>
                                <div>
                                    <h6 class="font-12 text-white mb-1 op-7">Total/ Patients</h6>
                                    <h6 class="text-white font-medium mb-0">-- {{DB::table('patients')->count()}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <div class="crypto"></div>
                                </div>
                            </div>
                            <div class="row text-center text-white mt-4">

                                <div class="col-12">
                                    <span class="font-14 d-block">Show All</span>
                                    <a href="{{route('patients.index')}}" class="font-medium"><i class="fas fa-arrow-up"></i>Go--</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- crypto -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card"style="background-color: #29a19c">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-2">
                                    <h1 class="mb-0"><i class="fas fa-user-md" style="color: #1a1a1a"></i></h1></div>
                                <div>
                                    <h6 class="font-12 text-white mb-1 op-7">Total / Doctor</h6>
                                    <h6 class="text-white font-medium mb-0">-- {{DB::table('doctors')->count()}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <div class="crypto"></div>
                                </div>
                            </div>
                            <div class="row text-center text-white mt-4">
                                <div class="col-12">
                                    <span class="font-14 d-block">Show All</span>
                                    <a href="{{route('doctors.index')}}" class="font-medium"><i class="fas fa-arrow-up"></i>Go--</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- crypto -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card" style="background-color: #222831">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-2">
                                        <h1 class="mb-0"><i class="fas fa-hospital" style="color: #1a1a1a"></i></h1></div>
                                <div>
                                    <h6 class="font-12 text-white mb-1 op-7">Total / Fields</h6>
                                    <h6 class="text-white font-medium mb-0">-- {{DB::table('fields')->count()}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <div class="crypto"></div>
                                </div>
                            </div>
                            <div class="row text-center text-white mt-4">

                                <div class="col-12">
                                    <span class="font-14 d-block">Show All</span>
                                    <a href="{{route('fields.index')}}" class="font-medium"><i class="fas fa-arrow-up"></i>Go--</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales Summery -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Top Selling Products</h4>
                                    <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                                </div>
                                <div class="ml-auto">
                                    <div class="dl">
                                        <select class="custom-select">
                                            <option value="0" selected>Monthly</option>
                                            <option value="1">Daily</option>
                                            <option value="2">Weekly</option>
                                            <option value="3">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- title -->
                        </div>
                        <div class="table-responsive">
                            <table class="table v-middle">
                                <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">Products</th>
                                    <th class="border-top-0">License</th>
                                    <th class="border-top-0">Support Agent</th>
                                    <th class="border-top-0">Technology</th>
                                    <th class="border-top-0">Tickets</th>
                                    <th class="border-top-0">Sales</th>
                                    <th class="border-top-0">Earnings</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2"><a class="btn btn-circle btn-info text-white">EA</a></div>
                                            <div class="">
                                                <h4 class="mb-0 font-16">Elite Admin</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>John Doe</td>
                                    <td>
                                        <label class="label label-danger">Angular</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="mb-0">$2850.06</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2"><a class="btn btn-circle btn-orange text-white">MA</a></div>
                                            <div class="">
                                                <h4 class="mb-0 font-16">Monster Admin</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>Venessa Fern</td>
                                    <td>
                                        <label class="label label-info">Vue Js</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="mb-0">$2850.06</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2"><a class="btn btn-circle btn-success text-white">MP</a></div>
                                            <div class="">
                                                <h4 class="mb-0 font-16">Material Pro Admin</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>John Doe</td>
                                    <td>
                                        <label class="label label-success">Bootstrap</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="mb-0">$2850.06</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2"><a class="btn btn-circle btn-purple text-white">AA</a></div>
                                            <div class="">
                                                <h4 class="mb-0 font-16">Ample Admin</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>John Doe</td>
                                    <td>
                                        <label class="label label-purple">React</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="mb-0">$2850.06</h5>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Comments</h4>
                        </div>
                        <div class="comment-widgets scrollable" style="height:560px;">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row mt-0">
                                <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">James Anderson</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">April 14, 2016</span> <span class="label label-rounded label-primary">Pending</span> <span class="action-icons">
                                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                                </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="../../assets/images/users/4.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium">Michael Jorden</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer ">
                                        <span class="text-muted float-right">April 14, 2016</span>
                                        <span class="label label-success label-rounded">Approved</span>
                                        <span class="action-icons active">
                                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                    <a href="javascript:void(0)"><i class="icon-close"></i></a>
                                                    <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                                                </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="../../assets/images/users/5.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">Johnathan Doeting</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">April 14, 2016</span>
                                        <span class="label label-rounded label-danger">Rejected</span>
                                        <span class="action-icons">
                                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                                </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">James Anderson</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">April 14, 2016</span> <span class="label label-rounded label-primary">Pending</span> <span class="action-icons">
                                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                                </span> </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="../../assets/images/users/4.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium">Michael Jorden</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer ">
                                        <span class="text-muted float-right">April 14, 2016</span>
                                        <span class="label label-success label-rounded">Approved</span>
                                        <span class="action-icons active">
                                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                    <a href="javascript:void(0)"><i class="icon-close"></i></a>
                                                    <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                                                </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Chats</h4>
                            <div class="chat-box scrollable" style="height:475px;">
                                <!--chat Row -->
                                <ul class="chat-list">
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/1.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">James Anderson</h6>
                                            <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                        </div>
                                        <div class="chat-time">10:56 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/2.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Bianca Doe</h6>
                                            <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                        </div>
                                        <div class="chat-time">10:57 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">I would love to join the team.</div>
                                            <br>
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                            <br>
                                        </div>
                                        <div class="chat-time">10:59 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/3.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Angelina Rhodes</h6>
                                            <div class="box bg-light-info">Well we have good budget for the project</div>
                                        </div>
                                        <div class="chat-time">11:00 am</div>
                                    </li>
                                    <!--chat Row -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-field mt-0 mb-0">
                                        <textarea id="textarea1" placeholder="Type and enter" class="form-control border-0"></textarea>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a class="btn-circle btn-lg btn-cyan float-right text-white" href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <x-dashboard.footer></x-dashboard.footer>
    </div>
</x-dashboard.app>
