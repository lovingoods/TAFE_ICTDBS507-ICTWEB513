<?php

$con = mysqli_connect("localhost", "root", "", "mobile_hour");

?>
<section id="special=price">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search By Price</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Start Price</label>
                                    <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price'];}else{echo "700";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">End Price</label>
                                    <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price'];}else{echo "3000";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Click Me</label><br>
                                    <button type="submit" class="btn btn-primary px-4">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
               <div class="card">
                <div class="card-body">
                    <div class="grid">
                    <?php

                    if(isset($_GET['start_price']) && isset($_GET['end_price'])) {
                        $startprice = $_GET['start_price'];
                        $endprice = $_GET['end_price'];

                        $query = "SELECT * FROM product WHERE item_price BETWEEN $startprice AND $endprice";
                    } else {
                        $query = "SELECT * FROM product";
                    }

                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        while ($item = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"; ?>">
                        <div class="item py-2" style="width: 200px;">
                            <div class="product font-rale">
                                <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                                <div class="text-center">
                                    <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <?php if(isset($_SESSION['auth'])) 
                                     {  ?>
                                    <div class="price py-2">
                                        <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                                    </div>
                                   
                                        <div class="stock py-2">
                                            <span>Only <?php echo $item['stock_on_hand'] ?? 1 ?></span>
                                        </div>
                                    <?php } else 
                                    { ?>
                                        <div class="price py-2">
                                        <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                                    </div>
                                    <?php } ?>
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                        <?php
                                        if (in_array($item['item_id'], $in_cart ?? [])){
                                            echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                        } else {
                                            echo '<button type="submit" name="special_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo "<p>No Record Found</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
                </div>