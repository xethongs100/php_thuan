<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
            .panel panel-default panel-table {  
                padding:0;
                }
                .panel-table .panel-body .table-bordered {  
                border-style: none; 
                margin:0;
                }
                .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type { 
                text-align:center;  width: 100px;}.panel-table .panel-body .table-bordered > thead > tr > th:last-of-type, .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {  
                border-right: 0px;
                }
                .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type, .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {  
                border-left: 0px;
                }
                .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td { 
                border-bottom: 0px;
                }
                .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th { 
                border-top: 0px;
                }
                .panel-table .panel-footer .pagination {    
                margin:0;
                }
                .panel-table .panel-footer .col {   
                line-height: 34px;  
                height: 34px;
                }
                .panel-table .panel-heading .col h3 {   
                line-height: 30px;  
                height: 30px;
                }
                .panel-table .panel-body .table-bordered > tbody > tr > td {   
                line-height: 34px;
                }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="container"> 
        <div class="row"> 
        <h1 class="text-center">Quản lý thông tin khách hàng</h1> 
        <div class="col-md-12"> 
        <div class="panel panel-default panel-table"> 
            <div class="panel-heading"> 
            <div class="row"> 
            <div class="col col-xs-6"> 
            <h3 class="panel-title">Danh sách khách hàng</h3> 
            </div> 
            <div class="col col-xs-6 text-right">
            <form action="controller.php" method="post">
                <button type="submit" name="exit_admin" class="btn btn-sm btn-primary btn-create">Exit</button> 
            </form>
            </div> 
            </div> 
            </div> 
            <div class="panel-body"> 
            <table class="table table-striped table-bordered table-list"> 
            <thead> 
            <tr> 
                <th><em class="fa fa-cog"></em>
                </th> 
                <th class="hidden-xs">Mã số</th> 
                <th>Full name</th> 
                <th>Email</th> 
                <th>Password</th>
                <th>Mobile</th>
                <th>Adress1</th>
                <th>Adress2</th>
            </tr> 
            </thead>
            <?php
            
                if(isset($_SESSION['email'])){
                    if(isset($user)){
                        if($_SESSION['email']=="admin@123"){
                            for($i=0;$i<count($user);$i++){
                                $a = $i;
                                $a++;
                            echo'
                            <tbody>
                                <tr> 
                                    <td align="center"><a href ="?change_user='.$user[$i]->email.'" class="btn btn-default"><em class="fa fa-pencil"></em></a> <a href="?delete_user='.$user[$i]->email.'" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                    </td>
                                        <td  class="hidden-xs">'.$a.'</td> 
                                        <td>'.$user[$i]->fname.'  '.$user[$i]->lname. '</td>
                                        <td>'.$user[$i]->email.'</td> 
                                        <td>'.$user[$i]->pass.'</td>
                                        <td>'.$user[$i]->mobile.'</td>
                                        <td>'.$user[$i]->address1.'</td>
                                        <td>'.$user[$i]->address2.'</td>
                                </tr> 
                            </tbody>';
                            }
                        }
                    }
                }

                if(isset($_SESSION['email_register'])){
                    if(isset($user)){
                        if($_SESSION['email_register']=="admin@123"){
                            for($i=0;$i<count($user);$i++){
                                $a = $i;
                                $a++;
                            echo'
                            <tbody>
                                <tr> 
                                    <td align="center"><a href ="?change_user='.$user[$i]->email.'" class="btn btn-default"><em class="fa fa-pencil"></em></a> <a href="?delete_user='.$user[$i]->email.'" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                    </td>
                                        <td  class="hidden-xs">'.$a.'</td> 
                                        <td>'.$user[$i]->fname.'  '.$user[$i]->lname. '</td>
                                        <td>'.$user[$i]->email.'</td> 
                                        <td>'.$user[$i]->pass.'</td>
                                        <td>'.$user[$i]->mobile.'</td>
                                        <td>'.$user[$i]->address1.'</td>
                                        <td>'.$user[$i]->address2.'</td>
                                </tr> 
                            </tbody>';
                            }
                        }
                    }
                }
            ?>
                </table> 
                </div>
            <div class="panel-footer"> 
            <div class="row"> 
            <div class="col col-xs-4">Trang 1 của 5 </div> 
            <div class="col col-xs-8"> 
            <ul class="pagination hidden-xs pull-right"> 
                <li><a href="">1</a>
                </li> 
                <li><a href="">2</a>
                </li> 
                <li><a href="">3</a>
                </li> 
                <li><a href="">4</a>
                </li> 
                <li><a href="">5</a>
                </li> 
            </ul> 
            <ul class="pagination visible-xs pull-right"> 
                <li><a href="">«</a>
                </li> 
                <li><a href="">»</a>
                </li> 
            </ul> 
            </div> 
            </div> 
            </div> 
        </div> 
        </div> 
        </div>
        </div>
</body>
</html>