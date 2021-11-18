function yesnoCheck(that) {
    if (that.value == "Credit Card") {
        alert("check");
        document.getElementById("paymethod").style.display = "block";
    } else {
        document.getElementById("paymethod").style.display = "none";
    }
}
