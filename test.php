<html>

<body>
  <div class="test"></div>
</body>
<script>
  let xmlreq = new XMLHttpRequest();

  xmlreq.onreadystatechange = function() {
    document.querySelector(".test").innerHTML = this.responseText
  }
  xmlreq.open("GET", "testphp.php", true);
  xmlreq.send();
</script>

</html>