function loadDoc(url, cFunction) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    cFunction(this);
  };
  xhttp.open("GET", url);
  xhttp.send();
}

loadDoc("../../model/getCartItems.php", loaded);

function loaded(xhttp) {
  document.getElementById("itemsList").innerHTML += xhttp.responseText;
  calmoney();
  send_link();
}

function checkEmptyCart() {
  const parentElement = document.getElementById("itemsList");
  const firstChild = parentElement.firstElementChild;
  if (firstChild.className == "cart-empty") {
    document.getElementById("goto_payment").classList.add("button-disabled");
  } else {
    document.getElementById("goto_payment").classList.remove("button-disabled");
  }
}

function calmoney() {
  if (document.getElementsByClassName("cartpage-empty") != null) {
    const items = document.getElementsByClassName("price");
    let counts = document.getElementsByClassName("count_input");
    var s = 0;
    for (var i = 0; i < items.length; i++) {
      s +=
        parseFloat(items[i].getAttribute("value")) *
        parseFloat(counts[i].value);
    }
    document.getElementById("offcprice").innerText =
      s.toLocaleString("en-US") + " $";
    const itemDiscounts = document.getElementsByClassName("discounted");
    var sDiscounted = 0;
    for (var i = 0; i < itemDiscounts.length; i++) {
      sDiscounted +=
        parseFloat(itemDiscounts[i].getAttribute("value")) *
        parseFloat(counts[i].value);
    }
    checkEmptyCart();
    // document.getElementById("discount").innerText = (-(s - sDiscounted)).toLocaleString('en-US') + "$";
    /* document.getElementById("subtotal").innerText =
      sDiscounted.toLocaleString("en-US") + "$"; */
  }
}

function changed_quantity() {
  let items = document.getElementsByClassName("count_input");
  var arr = [].slice.call(items);
  if (arr.every((element) => element.value != "")) {
    calmoney();
    for (var i = 0; i < arr.length; i++) {
      loadDoc(
        "../../model/update_cart.php?item_id=" +
          arr[i].parentNode.parentNode.id +
          "&item_quantity=" +
          arr[i].value,
        updatedItem
      );
    }
  } else {
    for (var i = 0; i < arr.length; i++) {
      if (arr[i].value == "") {
        alert("Only " + arr[i].max + " products left in stock");
        arr[i].value = 1;
        loadDoc(
          "../../model/update_cart.php?item_id=" +
            arr[i].parentNode.parentNode.id +
            "&item_quantity=" +
            arr[i].value,
          updatedItem
        );
      }
    }
    calmoney();
  }

  send_link();
}

function send_link() {
  item = document.getElementById("goto_payment");
  total = document.getElementById("offcprice").innerText;
  if (total == "0$") {
    item.href = "#";
    document.getElementById("goto_payment").style.pointerEvents = "none";
    document.getElementById("goto_payment").style.backgroundColor = "#3d3d3d";
  } else item.href = "../../model/sendCartItemsToSV.php?total=" + total;
}

function updatedItem(xhttp) {
  responseText = xhttp.responseText;
  console.log("UPDATED");
}
