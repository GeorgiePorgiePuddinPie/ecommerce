// Dynamically populate the table with shopping list items.
//Step below can be done via PHP and AJAX, too.
function doShowAll() {
    var key = "";
    var list = "<tr></tr>\n";
    var i = 0;
    //For a more advanced feature, you can set a cap on max items in the cart.
    for (i = 0; i <= localStorage.length-1; i++) {
        key = localStorage.key(i);
        list += "<tr><td>"
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
    var Prod = document.forms.ShoppingList.Products.value;
    if (Prod < "2"    || Prod > "5")
        return;
    switch(Prod) {
        case "2":
            var Products = "Apple";
            break;
        case "3":
            var Products = "Banana";
            break;    
        case "4":
            var Products = "Cantalope";
            break;
        case "5":
            var Products = "Dates";
            break;
    }
    //var Products = document.forms.ShoppingList.Products.value;
    var Units = document.forms.ShoppingList.Units.value;
    var UnitPrice = document.forms.ShoppingList.UnitPrice.value;
    var TotalPrice = document.forms.ShoppingList.TotalPrice.value; 
    var data = { 
        " Product": Products,
        " Units": Units,
        " Price per Unit": UnitPrice,
        " TotalPrice": TotalPrice
    };
    var JSONdata = JSON.stringify(data);
    var Units = document.forms.ShoppingList.Units.value;
    var UnitPrice = document.forms.ShoppingList.UnitPrice.value;
    var TotalPrice = document.forms.ShoppingList.TotalPrice.value; 
    localStorage.setItem("data", JSONdata);
//    localStorage.setItem(Units,2);
//    localStorage.setItem(TotalPrice,4);
//    localStorage.setItem(UnitPrice,3);
    
    doShowAll();
}

function RemoveItem() {
    var Prod = document.forms.ShoppingList.Products.value;
    if (Prod < "2"    || Prod > "5")
        return;
    switch(Prod) {
        case "2":
            var Products = "Apple";
            break;
        case "3":
            var Products = "Banana";
            break;    
        case "4":
            var Products = "Cantalope";
            break;
        case "5":
            var Products = "Dates";
            break;
    }
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