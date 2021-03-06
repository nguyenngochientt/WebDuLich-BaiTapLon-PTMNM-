<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/css/bootstrap.css"></script>
    <link rel="stylesheet" type="text/css" href="scss/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Jquery/load_item_newTour.js"></script>
    <!--  -->
    <?php 
        include 'model\connectDB.php';
        use model\connectDB;
        $connectDB=new connectDB("tctdlich");
        $connectDB->connect();
    ?>
</head>
<body>
    <!-- top bar -->
    <?php include_once __DIR__."/commont_layout/topbar.html" ?>
    <!--end topbar -->
    <!-- menu -->
    <?php include_once __DIR__."/commont_layout/menu.php" ?>
    <!-- end menu -->
    <!-- slider -->
    <?php include_once __DIR__."/commont_layout/slider.html" ?>
    <!-- end slider -->
    <!--  grid_4-->
    <?php include_once __DIR__."/commont_layout/timtour_g4.html" ?>
    <!--end grid_4-->
    <!-- Chọn tỉnh thành -->
    <?php include_once __DIR__."/commont_layout/choose_city.html" ?>
    <!-- end chọn tỉnh thành -->
    <!--  -->
    <div>
        <div class="container">
           <div class="row">
               <div class="#" style="width: 50%;
                                margin: 0px auto;
                                margin-top: 6%;
                                background: #fff;
                                padding: 2%;">
                   <form method="POST">
                       <h1>Đăng kí nhận tour</h1>
                       <p>Tên <input placeholder="Nhập tên" type="text" name="name" style="width:100%"></p>
                       
                       <p>Số điện thoại  <input placeholder="Nhập số điện thoại" type="text" name="sdt" style="width:100%"></p>
                      
                       <p>Email  <input placeholder="Nhập email" type="text"  name="email" style="width:100%"></p>
                       
                        <p>Số vé người lớn  <input placeholder="Nhập số vé người lớn" type="text" name="num_adults" style="width:100%"></p>
                        <p>Số vé trẻ em  <input placeholder="Nhập số vé trẻ em" type="text" name="num_child" style="width:100%"></p>
                        <button type="submit" name="submit">Đăng kí</button>
                    </form>
                   <?php
                     include "admin/function/customer/customer.php";
                     include "admin/function/booking/booking.php";
                     $customer=new TXSCustomer();
                     $booking=new TXSBooking();
                     $addBooking=new Booking();
                     $addCus=new Customer();
                     $addCus->id_customer=rand();
                     $num_adults="";
                     $num_child="";
                     $name="";
                     $tel="";
                     $email="";
                     $state="0";
                     $id_tour="";
                       
                        if(isset($_GET["id"])){
                            $id_tour=$_GET["id"];
                            $addBooking->id_tour=$id_tour;
                        }   
                        if(isset($_POST['submit'])){
                            if(isset($_POST['num_adults'])){
                                $addBooking->num_adults=$_POST['num_adults'];
                            }
                            if(isset($_POST['num_child'])){
                                $addBooking->num_child=$_POST['num_child'];
                            }
                            if(isset($_POST['name'])){
                                $addCus->name_customer=$_POST['name'];
                            }
                            if(isset($_POST['sdt'])){
                                $addCus->tel=$_POST['sdt'];
                            }
                            if(isset($_POST['email'])){
                                $addCus->email=$_POST['email'];
                            }
                            if( $customer->Them($addCus)){
                                $addBooking->id_customer=$addCus->id_customer;
                                $booking->Them($addBooking);
                            }
                        }  
                        ?>
                  
               </div>
           </div>
        </div>
        <app-footer></app-footer>
    </div>
    <?php include_once __DIR__ ."/commont_layout/footer.html"?>
</body>

</html>