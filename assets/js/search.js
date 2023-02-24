const container = document.querySelector('.products-list-filter');
const searchValue = document.querySelector('#header-search');
const genreInp = document.querySelector("#genres");
const sortBy = document.querySelector("#sortby");
const priceFrom = document.querySelector("#price-from");
const priceTo = document.querySelector("#price-to");
const genreDropdown = document.querySelector(".category-list")

function search(str, page, genre,priceFrom, priceTo,sortby ) {
  if(str == undefined){
    str = '';
  }
  if (page == undefined) {
    page = "1";
  }
  if (genre == undefined) {
    genre = '';
  }
  if (priceFrom == undefined) {
    priceFrom = '1';
  }
  if (priceTo == undefined) { 
    priceTo = '100';
  }
  if (sortby == undefined) { 
    sortby = 'asc';
  }

  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    // dataRes[0] = pagenumber || dataRes[1] = game_div
    let dataRes = this.responseText.split("page_number");
    console.log(this.responseText);
    if(dataRes[1] === "empty"){
      message = `
      <div class=message-container> 
        <div class='message'> can not find the game you need ! </div>
      </div>
      `;
      container.innerHTML = message;
    }
    else{
      let handleDataRes = dataRes[1] + showPagination(parseInt(dataRes[0]));
      container.innerHTML = handleDataRes;
    }
    
  }

  xmlhttp.open("GET", "searchHandle.php?queryGames=" + str + "&page=" + page + "&genre=" + genre + "&priceFrom=" + priceFrom + "&priceTo=" + priceTo+ "&sort=" + sortby);
  xmlhttp.send();
}

// create page number btn
function showPagination(pageNumber) {
  let s = "<input type='button' value='&laquo;' onclick='previous()'>"
  s += `<input type='button' value='1' class='active' onclick='search(searchValue.value,this.value,genreInp.value, priceFrom.value, priceTo.value,sortBy.value)'>`
  for (let i = 2; i <= pageNumber; i++) {
    s += `<input type='button' value='${i}' onclick='search(searchValue.value,this.value,genreInp.value, priceFrom.value, priceTo.value,sortBy.value)'>`
  }
  s += "<input type='button' value='&raquo;' onclick='next()'>"

  document.getElementById('showPagination').innerHTML = s
} 

//search for genres
function searchGenres(str){
  let xml = new XMLHttpRequest()
  xml.onreadystatechange = function(){
    if(this.responseText.match("empty")=="empty"){
      genreDropdown.innerHTML = "<div>No genre match !</div>"
    }
    else{
      let str = ''
      let genre = this.responseText.split("/");
      for(let index of genre){
        str += `<li onclick="setGenre('${index}')">${index}</li>`;
      }
      genreDropdown.innerHTML = str;
    }
  }
  xml.open("GET","searchGenres.php?queryGenres="+str);
  xml.send();
}

function setGenre(str){
  console.log(str);
  genreInp.value = str;
  search(searchValue.value,1,genreInp.value,priceFrom.value, priceTo.value, sortBy.value);
}

// SORT 

function setSort(str){
  sortBy.value = str;
  console.log(str);
  search(searchValue.value,1,genreInp.value,priceFrom.value, priceTo.value,sortBy.value);

}


search(searchValue.value, 1,genreInp.value,priceFrom.value, priceTo.value,sortBy.value );
