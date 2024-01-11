
<?php
include "connection.php";
?>
<link href="../css/bulma.min.css" type="text/css" rel="stylesheet">
<link href="../css/style.css" type="text/css" rel="stylesheet">
<link href="../css/itemStyle.css" type="text/css" rel="stylesheet">

    <div class="popup" id="pop">
        <p>Your data is updated successfully!</p>
        <i class="fas fa-times" onclick="popdown()"></i>
    </div>

<div class="detail">
    <div class="section">
    
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "post" enctype = "multipart/form-data">
            
        <div class="field">
            <label class="label">
                Select item
            </label>
            <div class="control">
                <input class="input" type = "number" name = "id" placeholder = "Name of item"><br>
            </div>
            <div class="control">
                <input class="input" type = "text" name = "item_name" placeholder = "Name of item"><br>
            </div>
            <div class="field">
                <div class="control">
                    <label class="radio">
                        Car
                        <input class="radio" type = "radio" name = "item" value = "car">
                    </label>
                    <label class="radio">
                        House
                        <input class="radio" type = "radio" name = "item" value = "house">
                    </label>
                    <label class="radio">
                        Office
                        <input class="radio" type = "radio" name = "item" value = "office">
                    </label>
                </div>
            </div>
    
        </div>
            For:
            <div class="field">
                <div class="control">
                    <label class="radio">
                        SELL
                        <input type = "radio" name = "sell_type" value = "sell">
                    </label>
                    <label class="radio">
                        RENT
                        <input type = "radio" name = "sell_type" value = "rent">
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">
                    Price by birr:
                </label>
                <div class="control">
                    <input class="input" type = "number" name = "price" placeholder = "price">
                </div>
            </div>

            <div class="field">
                <label class="label">
                    quantity:
                </label>
                <div class="control">
                    <input class="input" type = "text" name = "qty" placeholder = "How many">
                </div>
            </div>
            <div class="field">
                <textarea class="textarea" name="message" rows="10" cols="30" placeholder = "Description about the image"></textarea>
            </div>
            <div class="field">
                <label class="label">
                    Select image to be uploaded
                </label>
                <input type = "file" class="button is-info" name = "image1">
            </div>
            <div class="field buttons is-right">
                <input class="button is-info" type="submit" name="upload" onClick="pop();" value="submit" />
            </div>
            </form>
    </div>
</div>
<?php
$folder = "image/";
$target_file = $folder.basename($_FILES["image1"]["name"]);
// echo $target_file;
move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    function special_chars($value)
    {
        return htmlspecialchars(stripslashes($value));
    }

    $item = special_chars($_REQUEST['item_name']);
    $id = special_chars($_REQUEST['id']);
    $item_type = special_chars($_REQUEST['item']);
    $item_price = special_chars($_REQUEST['price']);
    $qty = special_chars($_REQUEST['qty']);
    $available = $qty;
    $sell_type = special_chars($_REQUEST['sell_type']);
    $description = (String)special_chars($_REQUEST['message']);
    // var_dump($description);
    $icon = special_chars($_REQUEST['item']);

    $submit_data = "UPDATE item set item_name='$item',item_type='$item_type',price='$item_price'
    ,item_description='$description',img_name='$target_file'
    ,sell_type='$sell_type',available='$available',qty='$qty' WHERE item_id=$id";

    if(mysqli_query($conn,$submit_data))
    {
        echo '<script type="text/javascript">',
            'pop();',
            '</script>';
        echo "your data is submitted";
    }else{
        echo "not submited";
    }
    }
?>

<script type = "text/javascript" src="../../js/script.js"></script>