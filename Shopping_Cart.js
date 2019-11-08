// Dynamically populate the table with shopping list items.
//Step below can be done via PHP and AJAX, too.
function doShowAll() {
    var key = "";
    var list = "<tr></tr>\n";
    var i = 0;
    //For a more advanced feature, you can set a cap on max items in the cart.
    for (i = 0; i <= localStorage.length-1; i++) {
        key = localStorage.key(i);
        list += "<tr><td>" + key + "</td>\n<td>"
            + localStorage.getItem(key) + "</td></tr>\n";;
    }
    //If no item exists in the cart.
    if (list == "<tr></tr>\n") {
        list += "<tr><td><i>empty</i></td></tr>\n";
    }
    //Bind the data to HTML table.
    //You can use jQuery, too.
    document.getElementById('list').innerHTML = list;
}

function SaveItem() {
    var Products = document.forms.ShoppingList.Products.text;
    var Units = document.forms.ShoppingList.Units.value;
    var UnitPrice = document.forms.ShoppingList.UnitPrice.value;
    var TotalPrice = document.forms.ShoppingList.TotalPrice.value; 
    var data = { 
        " Units": Units,
        " Price per Unit": UnitPrice,
        " TotalPrice": TotalPrice
    };
    var JSONdata = JSON.stringify(data);
    var Units = document.forms.ShoppingList.Units.value;
    var UnitPrice = document.forms.ShoppingList.UnitPrice.value;
    var TotalPrice = document.forms.ShoppingList.TotalPrice.value; 
    localStorage.setItem(Products, JSONdata);
    doShowAll();
}

function RemoveItem() {
var Products=document.forms.ShoppingList.Products.value;
document.forms.ShoppingList.Units.value=localStorage.removeItem(Products);
doShowAll();
}

function ClearAll() {
    localStorage.clear();
    doShowAll();
}

function validateForm(){
    document.getElementById('myMessages').innerHTML = "You information is successfully submitted!";
	return false;
}

function calculateTotal() {
    var unitPrice = document.getElementById("UnitPrice").value;
    var units = document.getElementById("Units").value;
    document.getElementById("TotalPrice").value = parseFloat(unitPrice * units).toFixed(2);
}