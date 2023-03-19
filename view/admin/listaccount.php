<div class="main">
    <div class="title">
        <span>Accounts</span>
    </div>
    <div class="nav-bar">
        <div class="search">
        <input type="search" placeholder="Search mail" id="searchgames" onkeyup="showlistgame(1,document.getElementById('gcategory').value,this.value,document.getElementById('pfrom').value,document.getElementById('pto').value)">
        </div>
        <div class="selection">
            <select name="">
                <option value="all">All</option>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
                <option value="customer">Customer</option>
            </select>
        </div>
        <div class="button">
            <a href="./editaccount.php?page=listaccount">
                <button><span>Add</span></button>
            </a>
        </div>
    </div>  
    <div class="listgames">
        <table>
            <thead>
                <tr>
                <th style="width: 5%;">AccountID</th>
                <th style="width: 5%;">UserID</th>
                <th style="width: 20%;">Full name</th>
                <th style="width: 30%;">Mail</th>
                <th style="width: 10%;">Group</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>Hu chuynh</td>
                        <td>huchuynh0707@gmail.com</td>
                        <td>Admin</td>
                        <td>On</td>
                        <td>
                            <a href='./editaccount.php?page=listaccount&accid=1'><button>Edit</button></a>            
                            <a href=''><button>Delete</button></a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>  
    <div class="pagination">
        <div>
            <input type="button" value="1"> 
            <input type="button" value="2"> 
            <input type="button" value="3"> 
            <input type="button" value="4"> 
            <input type="button" value="5"> 
        </div>
  </div>
</div>