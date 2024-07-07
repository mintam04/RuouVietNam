<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>List</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>   
    .boxcenter{
        width: 70%;
        margin: 0 auto;
    }
    .row{
        float: left;
        width: 100%;
    }
    .mb{
        margin-bottom: 30px;
    }
    .header{
        background-color: #5d4037 !important;
        border: 1px brown solid;
        color: white;
    }
    .menu{
        background-color: black;
        border: 1px brown solid;
        color: white;
    }
    #menu>ul>li {
            display: inline-block;
            position: relative;
        }
    
        #menu>ul>li>a {
            display: block;
            text-decoration: none;
            font-variant: 3px;
            font-size: 15px;
            color: white;
            padding: 0 10px;
            line-height: 40px;
        }
    
        #menu>ul {
            padding: 0px;
            margin: 0px;
            list-style: none;
            border-radius: 3px;
            background-color: black;
            text-align: center;
        }
    
        #menu>ul>li>a:hover {
            font-size: 20px;
        }
    
        #menu ul ul {
            position: absolute;
            display: none;
            padding: 0px;
            margin: 0px;
            list-style: none;
            border-radius: 3px;
            width: 200px;
            background-color: white;
            box-shadow: 0 0 1px gray;
        }
    
        #menu ul ul a {
            display: block;
            line-height: 30px;
            text-decoration: none;
            font-variant: small-caps;
            font-size: larger;
            padding: 0 10px;
        }
    
        #menu ul ul a:hover{
            font-size: 20px;
            color: white;
        }
    
        #menu ul li:hover ul {
            display: block;
        }
        .fratitle{
            background-color: #5d4037 !important;
            border: 1px brown solid;
            color: white;
        }
        #mb10{
            background-color: rgb(223, 223, 223);
            border-radius: 4px;
            border: 1px rgb(108, 108, 108)  solid;
            color: black;
            height: 20px;
            width: 100%;
        }
        .danhmuc{
            background-color: black;
            color: white;  
            width: 100%;          
        }
        table tr td{
            border: 1px black solid; 
            
        }
    </style>
</head>
<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1> Admin </h1>
        </div>
        <div class="row mb menu" id="menu">
        <ul>
            <li><a href="../view/index.php">Trang chủ</a></li>
            <li><a href="index.php?act=adddm">Danh mục</a></li>
            <li><a href="index.php?act=addsp">Hàng hóa</a></li>
            <li><a href="index.php?act=dskh">Khách hàng</a></li>
            <li><a href="index.php?act=dsbl">Bình luận</a></li>
            <li><a href="index.php?act=thongke">Thống kê</a></li>
            <li><a href="index.php?act=listbill">Danh sách đơn hàng</a></li>
        </ul>
        </div>