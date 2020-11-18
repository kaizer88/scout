<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Scout</title>
        <!-- Custom fonts for this template-->
        <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Scout <sup>app</sup></div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    @yield('content')
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Modals -->
                <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="/create" id="newModalForm">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username" class="col-form-label" >Username:</label>
                                            <input type="text" class="form-control" id="username" value="" name="username">
                                            <span class="text-danger" id="username-error"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name" class="col-form-label" >Name:</label>
                                            <input type="text" class="form-control" id="nameTxt"  value="" name="nameTxt" class="@error('title') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="surname" class="col-form-label" >Surname:</label>
                                            <input type="text" class="form-control" id="surname" name="surname" value="">
                                            <span class="text-danger" id="surname-error"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email" class="col-form-label" >Email:</label>
                                            <input type="text" class="form-control" id="email" value="" name="email">
                                            <span class="text-danger" id="email-error"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="mobile" class="col-form-label" >Mobile:</label>
                                            <input type="text" class="form-control" id="mobile" value="" name="mobile">
                                            <span class="text-danger" id="mobile-error"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jobtitle" class="col-form-label" >Job Title:</label>
                                            <input type="text" class="form-control" id="jobtitle" value="" name="jobtitle">
                                            <span class="text-danger" id="jobtitle-error"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password" class="col-form-label" >Password:</label>
                                            <input type="password" class="form-control" id="password" value="" name="password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password_confirmation " class="col-form-label" >Password Retype:</label>
                                            <input type="password" class="form-control" id="password_confirmation " value="" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Bio</label>
                                        <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @if(count($users) > 0)
                            <form method="POST" action="{{ '/update/'.$user->id }}">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username" class="col-form-label" >Username:</label>
                                            <input type="text" class="form-control" id="username" name="username" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name" class="col-form-label" >Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="surname" class="col-form-label" >Surname:</label>
                                            <input type="text" class="form-control" id="surname" name="surname" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email" class="col-form-label" >Email:</label>
                                            <input type="text" class="form-control" id="email" name="email" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="mobile" class="col-form-label" >Mobile:</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jobTitle" class="col-form-label" >Job Title:</label>
                                            <input type="text" class="form-control" id="jobtitle" name="jobtitle" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Bio</label>
                                        <textarea class="form-control" id="bio" rows="3" name="bio" value=""></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="EditUserr" id="editUserr" class="btn btn-primary">Update</button>
                                    <!-- <input id="user-form-submit" type="submit" class="btn btn-primary" value="Add Tag"> -->
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Scout APP</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        <!-- Bootstrap core JavaScript-->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="/js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
        <script src="/js/custom.js"></script>
    </body>
</html>