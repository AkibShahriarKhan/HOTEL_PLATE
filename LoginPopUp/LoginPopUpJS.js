loghtml = `
<center>
    <div id="logSignOverly"></div>
    <div id="logSign">  
        <form style="width:100%;">
            <input id="username" type = "text" name = "usr" placeholder="User Name" required/><br>
            <h6 id="nameErr"></h6><br>
            <input id="password" type="password" name="pass" placeholder="Password" required/><br>
            <h6 id="passErr"></h6><br>
        </form>
        <button style="border: 2px solid #ffcc99;" onclick="LoginAjaxCall()">LOGIN</button><br>
        <a href="#">Forgot Password?</a><br>
        <form action="reg.php" style="width:100%;">
            <input id="signupInp" style="width:80%;" type = "submit" value = "SIGN UP"/>
        </form><br>
        <button style="margin:10px 0px 0px 0px;" onclick="showLoginSignup(0)">Cancel</button>
    </div>
</center>
`;

logINbtn = `<button id="logSignBtn" style="float:right;" onclick="showLoginSignup(1)">Login/Signup</button>`;
logOUTbtn = `<button id="logoutBtn" style="float:right;" onclick="logout()">Logout</button>`;


function createLoginButton(idOfParent){
  document.getElementById(idOfParent).innerHTML ='';
  document.getElementById(idOfParent).innerHTML = logINbtn;
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
function LoginAjaxCall() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      response = this.responseText;
      console.log(response);
      if(response == 1){
        //window.location.href = "home.php";//relative path with respect to the hosting html page
        document.location.reload();
      }
      else if(response == 5)
      {
        window.location.href = "agent_home.php";
      }
      else if(response == 2){
        document.getElementById('nameErr').innerHTML = "Name Does Not Exist";
      }
      else if(response == 3){
        document.getElementById('passErr').innerHTML = "Wrong Password";
      }
      else{
        document.getElementById('passErr').innerHTML = "something Messed Up";
      }
    }
  };
  xhttp.open("POST", "LoginPopUp/login.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("uname="+username+"&pass="+password);
  
}
function FakeLoginAjaxCall() {
  console.log(document.getElementById('username').value);
  console.log(document.getElementById('password').value);
}

function createLogOutButton(idOfParent){
  document.getElementById(idOfParent).innerHTML ='';
  document.getElementById(idOfParent).innerHTML = logOUTbtn;
}
function logout(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.location.reload();
    }
  }
  xhttp.open("GET", "LoginPopUp/logout.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();  
}

function loginLogoutToggler(tf, container){
  if(isLoggedIn == "true"){
    createLogOutButton(container);
  }
  else{
    createLoginButton(container);
    addLoginForm();
  }
}