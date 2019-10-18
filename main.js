
let RandomTotal = Math.floor((Math.random() * 1000) + 1);

function totalTax(KartValue){

   return KartValue * 0.08 ;

}
function totalShipping(KartValue){

    return KartValue * 0.03;

}

function totalAmountDue(x1,x2,x3){

    return x1+x2+x3;


}

const KartValue = RandomTotal;
var taxesTotal= totalTax(KartValue);
var shippingTotal = totalShipping(KartValue);
var totaldue = totalAmountDue(KartValue,taxesTotal,shippingTotal);

console.log(KartValue);
console.log(taxesTotal);
console.log(shippingTotal);

var kartValue =document.getElementById('totalKart');
kartValue.innerHTML = "$" + KartValue.toFixed(2);

var shippingCheckOut =document.getElementById('totalShipping');
shippingCheckOut.innerHTML = "$" + shippingTotal.toFixed(2);


var taxesTot =document.getElementById('totalTaxes');
taxesTot.innerHTML = "$" + taxesTotal.toFixed(2);


var totalDuee =document.getElementById('totalDue');
totalDuee.innerHTML = "$" + totaldue.toFixed(2);

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

