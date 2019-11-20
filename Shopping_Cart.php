<!DOCTYPE html>

<!-- Shopping Cart page of our web page design -->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="Shopping_Cart.js"></script>
</head>

<body>
<h2> Shopping Cart</h2>
<form name="ShoppingList" action='' method='get'>
    <table>
        <td class="options"> Products: </td>
        <td><select name="Products" id="productSelect"  required="required">
        <!--<option value=""> </option> -->
<?php
$conn = new mysqli('localhost', 'root', '', 'cs3320') 
or die ('Cannot connect to db');

$sql = mysqli_query($conn, "SELECT description, unitPrice FROM products");
    while ($row = $sql->fetch_assoc()){
        ?>
        <option value=<?php echo $row['description']?>><?php echo $row['description'], " (", $row['unitPrice'],")"; ?></option>
    <?php
    }
?>
        </select></td>
        <!-- Units, Number of units to be purchased -->
        <tr>
        <td class="label"></class> Units: </td>
        <td><input type="number" min='0' step="1" id="Units" value= "0" onchange="calculateTotal()" 
            required="required" title='Units' maxlength="100"></td>
        </tr>
        <!-- UnitPrice, price per unit, will come from database -->
        <td class="UnitPrice"></class> Unit Price: </td>
        <td><input type="number" id="UnitPrice" value=<?php echo $row['unitPrice']?> readonly></td>
        <tr>

        <!-- TotalPrice, number of units * Price per unit -->
        <td class="TotalPrice"></class> Total Price: </td>
        <td><input type="number" id="TotalPrice" readonly></td>
    </table>
    <fieldset>
        <input type="button" value="Add"   onclick="SaveItem()">
        <input type="button" value="Delete" onclick="RemoveItem()">
    </fieldset>
    <div id="items_table">
        <h2>Shopping List</h2>
        <table id="list"></table>
        <label><input type="button" value="Clear" onclick="ClearAll()">
        * Delete all items</label>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/scripts.js"></script>
<script>
$(document).ready(function(){
	$(".options").change(function(){
    $("#UnitPrice").val($(".options").val());
		  $("#TotalPrice").val( $(".options").val() * $("#Units").val());
  });
});
$(document).ready(function(){
	$("#Units").change(function(){
    $("#TotalPrice").val( $(".options").val() * $("#Units").val());
  });
});
</script>

<?php
$conn->close();
?>
</body>
</html> 