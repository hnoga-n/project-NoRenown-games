const show_detail_in = document.querySelector(".import-containers");
searchImportList("01/01/1970", "01/01/2030", "", '', '')
function searchImportList(dateStart, dateEnd, ID, priceFrom, priceTo) {
  const outside_container = document.querySelector("#show-list-import");
  const page_container = document.getElementById('showPagination');
  let date_start = ''
  let date_end = ''
  if (dateStart == '') {
    date_start = new Date('01/01/1970')
  } else {
    date_start = new Date(dateStart);
  }
  if (dateEnd == '') {
    let currentDate = new Date();
    date_end = new Date((currentDate.getMonth() + 1) + '/' + (currentDate.getDate() + 1) + '/' + (currentDate.getFullYear() + 100));
    //dateEnd = new Date('01/01/2100')
  } else {
    date_end = new Date(dateEnd);
  }

  const message = document.getElementById("message");
  let id_account = document.getElementById("search-with-account");
  let price_from = document.getElementById("price-from")
  let price_to = document.getElementById("price-to")
  message.innerHTML = '';

  if (date_start > date_end) {
    message.innerHTML = "Date is not valid !";
    return;
  }
  if (priceFrom == '') {
    priceFrom = 0
  }
  if (priceTo == '') {
    priceTo = 10000000
  }
  if (ID == undefined) {
    ID = '';
  }
  if (ID == "" || ID == undefined) {
    ID = '';
  }

  if (parseFloat(priceFrom) >= parseFloat(priceTo)) {
    message.innerHTML = "Price value not valid !";
    return;
  }
  const start = date_start.getFullYear() + '-' + (date_start.getMonth() + 1) + '-' + date_start.getDate();
  const end = date_end.getFullYear() + '-' + (date_end.getMonth() + 1) + '-' + date_end.getDate();

  const xml = new XMLHttpRequest;
  xml.onreadystatechange = function () {
    if (this.responseText == "empty") {
      message.innerHTML = "No result !";
      outside_container.innerHTML = '';
      page_container.innerHTML = '';
    } else {
      let data = this.responseText.split("###");
      outside_container.innerHTML = data[1];

      showPagination(data[0])
    }
  }

  xml.open("GET", "../../model/importHandle.php?query=listimport&d_strt=" + start + "&d_end=" + end + "&accID=" + ID + "&priceFr=" + priceFrom + "&priceTo=" + priceTo);
  xml.send();

}

function searchImportListWithPage(page, dateStart, dateEnd, ID, priceFrom, priceTo) {
  const outside_container = document.querySelector("#show-list-import");
  const message = document.getElementById("message");
  let date_start = ''
  let date_end = ''
  if (dateStart == '') {
    date_start = new Date('01/01/1970')
  } else {
    date_start = new Date(dateStart);
  }
  if (dateEnd == '') {
    let currentDate = new Date();
    date_end = new Date((currentDate.getMonth() + 1) + '/' + (currentDate.getDate() + 1) + '/' + (currentDate.getFullYear() + 100));
  } else {
    date_end = new Date(dateEnd);
  }

  message.innerHTML = '';
  if (date_start > date_end) {
    message.innerHTML = "Date is not valid !";
    return;
  }
  if (priceFrom == '') {
    priceFrom = 0
  }
  if (priceTo == '') {
    priceTo = 10000000
  }
  if (ID == undefined) {
    ID = '';
  }
  if (parseFloat(priceFrom) >= parseFloat(priceTo)) {
    message.innerHTML = "Price value not valid !";
    return;
  }
  const start = date_start.getFullYear() + '-' + (date_start.getMonth() + 1) + '-' + date_start.getDate();
  const end = date_end.getFullYear() + '-' + (date_end.getMonth() + 1) + '-' + date_end.getDate();

  const xml = new XMLHttpRequest;
  xml.onreadystatechange = function () {
    //log data without recreate page number
    outside_container.innerHTML = this.responseText;
    document.querySelectorAll(".pageNum").forEach(pg => {
      if (pg.value == page) {
        document.querySelector(".pageNum.active").classList.remove('active')
        pg.classList.add('active')
      }
    })
  }

  xml.open("GET", "../../model/importHandle.php?query=listimportpage&pg=" + page + "&d_strt=" + start + "&d_end=" + end + "&accID=" + ID + "&priceFr=" + priceFrom + "&priceTo=" + priceTo);
  xml.send();

}
// create page number btn
function showPagination(pageNumber) {
  let s = ""
  s += `<input type='button' value='1' class='pageNum active' onclick="searchImportListWithPage(this.value,document.getElementById('date-start').value,document.getElementById('date-end').value,document.getElementById('search-with-account').value,document.getElementById('price-from').value,document.getElementById('price-to').value);returnPageValue(this);">`
  for (let i = 2; i <= pageNumber; i++) {
    s += `<input type='button' value='${i}' class='pageNum' onclick="searchImportListWithPage(this.value,document.getElementById('date-start').value,document.getElementById('date-end').value,document.getElementById('search-with-account').value,document.getElementById('price-from').value,document.getElementById('price-to').value);returnPageValue(this);returnPageValue(this);">`
  }

  document.getElementById('showPagination').innerHTML = s
  scrollToPosition(document.getElementById('showPagination'), document.querySelectorAll('#showPagination input').length);
}

let tmpInputValuePage;
function returnPageValue(input) {
  tmpInputValuePage = Number(input.value);//input value pagination active
}

let tmpCount = 0;
function scrollToPosition(element, length) {
  if (tmpInputValuePage == 1 || tmpInputValuePage == 2) {
    document.querySelector('#showPagination').scrollTo(0, 0);
    return;
  } else if (tmpInputValuePage == length || tmpInputValuePage == length - 1) {
    document.querySelector('#showPagination').scrollTo(length * 50, 0);
    return;
  } else if (tmpInputValuePage == length - 2) {
    document.querySelector('#showPagination').scrollTo(tmpInputValuePage * 45, 0);
    return;
  }
  else {
    if (tmpInputValuePage > length / 2) {
      document.querySelector('#showPagination').scrollTo(tmpInputValuePage * 40, 0);
    } else {
      document.querySelector('#showPagination').scrollTo((tmpInputValuePage - 1) * 40, 0);
    }

  }
}
function showImportDetail(impID, accID, date_create, total_price) {
  console.log(date_create);
  const xml = new XMLHttpRequest;
  xml.onload = function () {
    console.log(this.responseText);
    show_detail_in.innerHTML = this.responseText;
    const import_container = document.querySelector(".import-container");
    import_container.addEventListener("click", function (event) {
      event.stopPropagation();
    })
    show_detail_in.style.display = "block";

  }
  xml.open("GET", "../../model/importHandle.php?query=showdetail&impID=" + impID + "&accID=" + accID + "&date_create=" + date_create + "&total_price=" + total_price);
  xml.send();
}

show_detail_in.addEventListener("click", function (event) {
  show_detail_in.style.display = "none";
})

const backBtn = document.querySelector(".back-to-import span");
backBtn.addEventListener("click", function () {
  console.log("hello");
  window.location.href = "./employee.php?page=import";
})
