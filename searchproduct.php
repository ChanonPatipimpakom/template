<?php
    include("connect.php");
?>
    <script>
    $(document).ready(function () {
        $("#search2").hide();
        $("#search3").hide();
        $("select[name=searchCol]").click(function () {
            if ($(this).val() == "3") {
                $("#search3").show();
                $("#search2").show();
                $("#search1").hide();
            } else {
                $("#search3").hide();
                $("#search2").hide();
                $("#search1").show();
            }
        });
    });
    </script>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Search Product</h1>
            </div>
        </div>
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="col-md-2">
                    <select name="searchCol" id="" class="btn btn-primary">
                        <option value="#">-- หมวดค้นหาสินค้า --</option>
                        <option value="1">ชื่อสินค้า</option>
                        <option value="2">รายละเอียด</option>
                        <option value="3">ราคา</option>
                    </select>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="search1" class="form-control" name="txtSearch" placeholder="Search">
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="search2" class="form-control" name="txtMin" placeholder="Min">
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="search3" class="form-control" name="txtMax" placeholder="Max">
                    </div>
                    <div>    
                        <button name="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Go!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $searchCol = $_POST['searchCol'];
            $search = $_POST['txtSearch'];
            $min = $_POST['txtMin'];
            $max = $_POST['txtMax'];
            $sql = "SELECT * FROM product";
            switch($searchCol){
                case 1: {
                    $sql.= " WHERE name LIKE '%$search%'";
                    $report = "ผลการค้นหา ชื่อสินค้า <b>$search</b>";
                    break;
                }
                case 2: {
                    $sql.= " WHERE description LIKE '%$search%'";
                    $report = "ผลการค้นหา รายละเอียดสินค้า <b>$search</b>";
                    break;
                } 
                case 3: {
                    $sql.= " WHERE price BETWEEN '$min' AND '$max'";
                    $report = "ผลการค้นหา ราคาตั้งแต่ <b>$min - $max</b> บาท";
                    break;
                }
                default:{
                    $sql.= " WHERE name LIKE '%$search%'";
                    $report = "ผลการค้นหา ชื่อสินค้า <b>$search</b>";
                }
            }
    ?>
    <div class="container">
        <h3 style="margin-bottom:20px"><?php echo $report?> </h3>
        <div class="row">
        <?php
        $result = $conn->query($sql);
        if(!$result){
            echo "Error During Retrival";
        }
        else{
            //ดึงข้อมูล
            while($prd=$result->fetch_object()){
                $prd->id; //$prd["id]
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail">
                    <a href="productdetail.php?pid=<?php echo $prd->id;?>">
                        <img src="image/<?php echo $prd->picture;?>" alt="">
                    </a>
                    <div class="caption">
                    <h3><?php echo $prd->name;?></h3>
                    <p><?php echo $prd->description;?></p>
                    <p><Strong>Price: </Strong><?php echo $prd->price;?><Strong> Bath</Strong></p>
                    <p><Strong>Qty: </Strong><?php echo $prd->unitInStock;?></p>
                    <p>
                        <a href="#" class="btn btn-info">Add To Basket</a>
                        <a href="editproduct.php?pid=<?php echo $prd->id?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="deleteproduct.php?pid=<?php echo $prd->id?>" class="btn btn-danger linkDelete"><i class="glyphicon glyphicon-trash"></i></a>
                    </p>
                    </div>
                </div>
            </div>
            <?php
                }
            }
        ?>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>