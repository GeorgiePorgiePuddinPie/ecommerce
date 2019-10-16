        function calculateTotal() {
        //var calculateTotal = function(event) {
            //event.preventDefault();
            var unitPrice = document.getElementById("UnitPrice").value;
            var units = document.getElementById("Units").value;
            document.getElementById("TotalPrice").value = parseFloat(unitPrice * units).toFixed(2);
        }
