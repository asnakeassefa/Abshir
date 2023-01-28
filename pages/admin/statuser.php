


<div class = "da">
    <div class="detail">
        <div class="stats">
            <div class="user">
                <?php
                    $query = mysqli_query($conn,"select * from user");
                    $row = mysqli_num_rows($query);
                    echo '<i class="fas fa-user"></i>';
                    echo$row;
                ?>
            </div>
            <div class="item">
                <?php
                    $query = mysqli_query($conn,"select * from item");
                    $row = mysqli_num_rows($query);
                    echo '<i class="fas fa-shopping-cart"></i>';
                    echo$row;
                ?>
            </div>
            <div class="sold">
                <?php
                    $query = mysqli_query($conn,"select SUM(sell) as total from sell");
                    $amount = mysqli_fetch_assoc($query);
                    echo '<i class="fas fa-money-bill-alt"></i>';
                    echo "$".$amount['total'];
                ?>
            </div>
        </div>
    </div>
    <div class="datas">
            <?php
            include "lastitem.php";
            ?>
    </div>
</div>