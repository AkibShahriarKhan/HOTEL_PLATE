loghtml = `
<center><div id="logSignOverly"></div><div id="logSign">  
<form action="index.php" method = "post">
<input type = "text" name = "usr" placeholder="User Name" required/><br>
<input type="password" name="pass" placeholder="Password" required/><br>
<input style="border: 2px solid #ffcc99;" type = "submit" value = "LOGIN"/><br>
<a href="#">Forgot Password?</a><br>
</form>

<form action="reg.php">
<input style="border: 2px solid #ffcc99;" type = "submit" value = "SIGN UP"/>
</form>
<button style="margin:10px 0px 0px 0px;" onclick="showLoginSignup(0)">Cancel</button>
</div>
</center>
`;

logbtn = `<button id="logSignBtn" style="float:right;" onclick="showLoginSignup(1)">Login/Signup</button>`;


function createLoginButton(idOfParent){
    document.getElementById(idOfParent).innerHTML = logbtn;
}
function addLoginForm(){
    document.body.innerHTML += loghtml;
}
function showLoginSignup(x){
    if(x==1){
      document.getElementById('logSign').style.display = "block";
      document.getElementById('logSignOverly').style.display = "block";
    }
    else{
      document.getElementById('logSign').style.display = "none";
      document.getElementById('logSignOverly').style.display = "none";
    }
}
