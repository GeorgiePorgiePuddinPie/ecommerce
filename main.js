/* function values(){
    var kartValue = document.forms.checkOut.totalKart.value;;
    //document.getElementById("totalShipping").value = parseFloat(kartValue  * .03).toFixed(2);
    document.getElementById("totalTaxes").value = parseFloat(kartValue  * .08).toFixed(2);
    var shippingTotal = document.getElementById("totalShipping").value;
    var taxesTotal = document.getElementById("totalTaxes").value;
    document.getElementById("totalDue").value = parseFloat(kartValue + shippingTotal + taxesTotal ).toFixed(2);
    
    console.log(kartValue);
    console.log(taxesTotal);
    console.log(shippingTotal);
} */
function validation(){
var cardRegEx = document.getElementById('cardExp');
var cardExpCheck = /(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/;

    if(cardExpCheck.test(cardRegEx.cardID)){

        document.getElementById('cardExpError').innerHTML = " ";
        alert('Finalizing Process')

    }else{
        
        console.log(cardRegEx.cardID);
        document.getElementById('cardExpError').innerHTML = "Card Format Invalid (MM/YYYY) ";
        return false;
    }

}

