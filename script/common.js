//theme 

var BoxShaId;



function setInitialTheme() {
   var theme = localStorage.getItem('theme');
   document.getElementById('switch').classList.toggle('actives');
   if (!theme) {
      theme = 'light';
      localStorage.setItem('theme', theme);
   }
   var switchIcon = localStorage.getItem('switchIcon');
   if (!switchIcon) {
      switchIcon = 'icon-wb_sunny';
      localStorage.setItem('switchIcon', switchIcon);
   }
   return [theme, switchIcon];
}

function applyTheme(theme, switchIcon) {

   document.getElementById('switch').classList.toggle(switchIcon);
   var html = document.querySelector('html');
   html.classList.add(theme);
   BoxShaId = document.querySelector('.SectionBg');
   SectionCookie = document.querySelector('.SectionBg');
   SectionCookie.classList.add(theme)
   BoxShaId.classList.add(theme);
}

function switchTheme() {
   var theme = localStorage.getItem('theme');
   var html = document.querySelector('html');
   var new_theme = theme === 'dark' ? 'light' : 'dark';

   var switchIconObj = document.getElementById('switch');
   if (switchIconObj.classList.contains('icon-sun')) {
      switchiconCurr = 'icon-sun';
      new_switchIcon = 'icon-wb_sunny';
   } else if (switchIconObj.classList.contains('icon-wb_sunny')) {
      switchiconCurr = 'icon-wb_sunny';
      new_switchIcon = 'icon-sun';
   }
   switchIconObj.classList.replace(switchiconCurr, new_switchIcon);

   document.getElementById('switch').classList.toggle('actives', new_theme === 'dark');
   localStorage.setItem('switchIcon', new_switchIcon);
   localStorage.setItem('theme', new_theme);
   html.classList.replace(theme, new_theme);
   BoxShaId.classList.replace(theme, new_theme);
   SectionCookie.classList.replace(theme, new_theme);

}

window.addEventListener('load', function () {
   var Getvalues = setInitialTheme();
   applyTheme(Getvalues[0], Getvalues[1]);
});


const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);


const path = window.location.pathname;
const page = path.split("/").pop();

var condi = page.includes('ch');
//console.log("includes ch : " + condi + "(condi)");


var condi3 = page.includes('home');


var condi5 = page.includes('videos');
//console.log("includes videos : " + condi5 + '(condi5)');

var condi4 = page.includes('open');
//console.log("includes open : " + condi4 + '(condi4)');

var condi2 = page.includes('index'); /*novel chapters*/
//console.log("includes index : " + condi2 + '(condi2)');

//console.log('1 st condition checked');
//console.log(page);


function storePreviousPage() {
   sessionStorage.setItem('previousPage', window.location.href);
}

/*
function chkscrnsiz(){
   var AlrtScrnSiz = localStorage.getItem('AlrtFlg');
   if ( vw <=460 && !AlrtScrnSiz){
      
      localStorage.setItem('AlrtFlg',true);
      document.addEventListener('DOMContentLoaded', function () {
         var ErrMsgBox = document.createElement('div');
         ErrMsgBox.className = 'ErrFlex';

         var ErrMsg = document.createElement('div');
         ErrMsg.className = 'Err';

         ErrMsgBox.appendChild(ErrMsg);
         document.body.appendChild(ErrMsgBox);

         var ErrMsgTxt = document.createElement('p');
         ErrMsg.appendChild(ErrMsgTxt);
         ErrMsg.classList.add('fonts');
             // ErrMsg.classList.toggle('ErrShw');
         ErrMsgTxt.innerHTML ="Your screen size is not Optimized yet. We recommend a standard size monitor or wait for support to be enrolled";
     setTimeout(function()   {
         ErrMsg.classList.add('ErrReMov');
         setTimeout(function(){
            ErrMsg.parentNode.removeChild(ErrMsg);
         },1*1000);
     }, (2*14)*1000);
     
     });

      
   }
   else if ( AlrtScrnSiz ){
    //
   }
}
chkscrnsiz();*/


if (condi5 === true) {
   //autoplay();
}

if (condi3 === true) {
   //console.log('condi3');
   var getele = document.querySelectorAll('.abc');
   var length = getele.length;
   var i = 0;
   while (i < length) {
      getele[i].classList.add('abc_fix');
      //  console.log('ele no :');
      //console.log(i);
      i += 1;

   }


}



var checkid = document.getElementById('bac_2');
var checkid2 = document.getElementById('nov_tool');
if (checkid || checkid2) {
   // When the user scrolls down 20px from the top of the document, show the button
   if (condi === true || condi4 === true || condi5 === true) {
      window.onscroll = function scrollFunction() {
         if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById('bac_2').classList.add('shw');
         } else if (document.body.scrollTop < 20 || document.documentElement.scrollTop < 20) {
            document.getElementById('bac_2').classList.remove('shw');
            document.getElementById('nov_tool').classList.remove('novel_tool');
         }
      }
   }
} else {
   // console.log('no bac_2 or nov_tool ')
}

// When the user clicks on the button, scroll to the top of the document
function bac_2_func() {
   window.scrollTo({ top: 0, behavior: 'smooth' });// For Chrome, Firefox, IE and Opera
}





function dropdowns() {
   document.getElementById('dropdown').classList.toggle("new");
   // document.getElementById('dropdown2').classList.toggle("new2"); no use , feel free to delete it,
   // after verifing it is indeed useless.


}
window.onclick = function (event) {
   let GetUserOptDOM = document.getElementById('UserOpt');
   let GetPostOptDOM = document.getElementsByClassName('UPoptsBox');
   try {
      if (GetUserOptDOM) {
         if (!GetUserOptDOM.contains(event.target)) {
            GetUserOptDOM.classList.add('UserOpt2');
         }
      }
      if (GetPostOptDOM) {




         for (var i = 0; i < GetPostOptDOM.length; i++) {
            var currentElem = GetPostOptDOM[i];
            if (currentElem.classList.contains('UPotpsDis') && !currentElem.contains(event.target)) {
               currentElem.classList.remove('UPoptsDis');
               console.log(currentElem);
               console.log(event.target);
            }

         }
      }
   } catch (e) {
      console.error(e.message);
   }

   /* let GetDropDown = document.getElementById('dropdown');
    let ArrGetDrpDwn = Array.from(GetDropDown.classList);
    if (ArrGetDrpDwn.includes('new')) {
      if (!GetDropDown.contains(event.target)) {
       console.log('---');
       // GetDropDown.classList.r('new');
      }
    }*/

   if (!event.target.matches('.new3')) {
      var dropdowns = document.getElementsByClassName('drpshow');
      for (var i = 0; i < dropdowns.length; i++) {
         var openDropdown = dropdowns[i];
         if (openDropdown.classList.contains('new') && !openDropdown.contains(event.target)) {
            openDropdown.classList.toggle('new');
         }
      }
   }
};



function novl() {//opens novels pg, called by onclick func
   var novel = window.open("./home-novels.php", "_self")
}

function movi() { // opens 'movie' pg, called by onclick
   var movies = window.open("../Html/videos.php", "_self")

}
function graphical() {
   var graphical = window.open("./Graphi.php", "_self")
}
function EduMainPg() {
   var EduMainPgLnk = window.open("./Educ.php", "_self")
   // body...
}

function listch() { // list chapters on novels - needs improv - called by onclick
   var show_ch = window.open("./index_novel.php", "_self")
}



function manga() { // opens manga index - needs lot of work
   var mangas = window.open("../Html/manga-index.php", "_self")
}



if (condi == true || condi5 == true) {
   var lastScrollTop = 0;

   document.addEventListener("scroll", function () {
      var st = window.pageYoffset || document.documentElement.scrollTop;
      if (st > lastScrollTop) {
         document.getElementById('nov_tool').classList.remove('novel_tool');
      } else if (st < lastScrollTop) {
         document.getElementById('nov_tool').classList.add('novel_tool');
      }
      lastScrollTop = st <= 0 ? 0 : st;
   }, false);
}

if (vw <= 414 && vh <= 896) {
   //console.log('vw <= 414 and vh<= 896 ');
} else {
   // console.log(' not working');
}





function autoplay() {
   const videos = document.querySelectorAll("video"); // Select ALL the Videos
   const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
         if (!entry.isIntersecting) {
            entry.target.pause(); // Pause the TARGET video
         } else {
            entry.target.play(); // Play the TARGET video
         }
      });
   }, { threshold: 0.5 });
   for (const video of videos) observer.observe(video); // Observe EACH video
   const onVisibilityChange = () => {
      if (document.hidden) {
         for (const video of videos) video.pause(); // Pause EACH video
      } else {
         for (const video of videos) video.play();
         for (const video of videos) video.classList.add('active'); // Play EACH video
      }
   };
   document.addEventListener("visibilitychange", onVisibilityChange);
}


function after(id_vid) {
   // console.log('forLike');
   this.classList.add('after');

   forLike.classList.add('after');
   //   console.log('after  ')
}


function submitted() {
   const user = document.getElementById("user").value;
   const pswd = document.getElementById("pass").value;
   var getemail = document.getElementById("email").value;
   const email = (getemail === '' || getemail === " ") ? null : getemail;

   const submitValue = document.activeElement.value;

   const xmlhttp = new XMLHttpRequest();
   xmlhttp.onload = function () {
      const textbox = document.getElementById("res");
      textbox.classList.add('responseBox1');

      textbox.innerHTML = this.responseText;
      const customHeader = xmlhttp.getResponseHeader('X-Custom-Variable');


      if (customHeader) {
         location.reload();
      }
      // Use the custom header value in your JavaScript code
      //console.log(customHeader);

   }
   xmlhttp.open("POST", "account0.php");
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xmlhttp.send("user=" + user + "&pswd=" + pswd + "&submit=" + submitValue + "&email=" + email);
}




//tnks 2 w3schkl
function setCookie(cname, cvalue, exdays) {
   const d = new Date();
   d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
   let expires = "expires=" + d.toUTCString();
   document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
   let name = cname + "=";
   let ca = document.cookie.split(';');
   for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
         c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
         return c.substring(name.length, c.length);
      }
   }
   return false;
}




var SetVerifIcon = getCookie('token');
if (SetVerifIcon !== false && SetVerifIcon !== 'undefined ') {

   document.getElementById('account').style.setProperty('--acc-sign-blr', '#2ada79');
}

const GetValidity = getCookie('valid');

if (GetValidity === true || GetValidity === 1 || GetValidity === '1') {
   document.getElementById('account').classList.remove('icon-login');
   document.getElementById('account').classList.add('icon-account_circle');
} else if (GetValidity !== 'deleted') {
   //console.log('YOU DONE   UP');

}

function StartTokChk() {
   if (document.hidden === false) {


      let GetToken = getCookie('token');
      if ((GetValidity === true || GetValidity === 1 || GetValidity === '1') && GetToken !== false) {
         document.cookie = "valid = false ; expires Thu ,  01 May 1994 00:00:00 UTC";
         //  console.clear();


         var RefreshTokenAjax = new XMLHttpRequest();
         RefreshTokenAjax.onload = function () {

         }
         RefreshTokenAjax.open("POST", "RefreshToken.php");
         RefreshTokenAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         RefreshTokenAjax.send()
      }

   }
}


setInterval(StartTokChk, 5 * 60 * 1000);

function DisplErr(ErrStr) {

   var ErrMsgBox = document.createElement('div');
   ErrMsgBox.className = 'ErrFlex ';

   var ErrMsg = document.createElement('div');
   ErrMsg.className = 'Err';

   ErrMsgBox.appendChild(ErrMsg);

   var unselectableElements = document.body.getElementsByClassName('unselectable');
   if (unselectableElements.length > 0) {
      var firstUnselectableElement = unselectableElements[0];
      firstUnselectableElement.appendChild(ErrMsgBox);
   }

   var ErrMsgTxt = document.createElement('p');
   ErrMsg.appendChild(ErrMsgTxt);
   ErrMsg.classList.add('font');
   // ErrMsg.classList.toggle('ErrShw');
   ErrMsgTxt.innerHTML = ErrStr;
   setTimeout(function () {
      ErrMsg.classList.add('ErrReMov');
      setTimeout(function () {
         ErrMsg.parentNode.removeChild(ErrMsg);
         ErrMsgBox.parentNode.removeChild(ErrMsgBox);
      }, 1 * 1000);
   }, 14 * 1000);

}



const GetCookStat = getCookie('token');
const UserName = getCookie('User');




function UserOpts() {
   var NotSignedIn;

   if (GetCookStat !== false) {
      const GetOptElem = document.getElementById('UserOpt');
      if (GetOptElem === 'undefined' || GetOptElem === null) {



         var UserOptBox = document.createElement('div');

         document.body.appendChild(UserOptBox);
         UserOptBox.className = 'font';


         UserOptBox.setAttribute('id', 'UserOpt');


         var UserNameBox = document.createElement('p');
         UserOptBox.appendChild(UserNameBox)
         UserNameBox.setAttribute('id', 'UserName');

         UserNameBox.innerHTML = UserName;

         var LogOutBox = document.createElement('button');

         UserOptBox.appendChild(LogOutBox);
         LogOutBox.className = 'UserOptIcon icon-exit';
         LogOutBox.style.setProperty('background-color', ' #e22828ee');
         //LogOutBox.innerHTML = 'Sign Out';
         LogOutBox.setAttribute('onclick', 'LogOut();');


         var GotoUserPgBox = document.createElement('button');
         UserOptBox.appendChild(GotoUserPgBox);
         GotoUserPgBox.className = "UserOptIcon icon-cog";
         GotoUserPgBox.style.setProperty('background-color', ' rgba(62, 184, 221, 0.781)');
         GotoUserPgBox.setAttribute('onclick', 'GotoUserPage();');


         setTimeout(function () {
            UserOptBox.classList.toggle('UserOpt');
         }, 25);


      }
      else if (GetOptElem !== ('undefined' || null)) {
         GetOptElem.classList.toggle('UserOpt2');
         //GetOptElem.classList.toggle('UserOpt');
      }
   } else if (NotSignedIn === false || NotSignedIn === 'undefined' || NotSignedIn === null) {
      var NotSignedIn = true;
      console.error("You are not signed in right now. Sign in with your Sammlung account to user this feature.");
   }
}





window.addEventListener('load', function () {
   const GetProfToken = getCookie('token');
   if (page.includes('UserPage') && (GetProfToken !== 'undefined' || GetProfToken !== false)) {

      var GetProfileUser = document.getElementById('profileName');
      var GetProfileName = getCookie('User');
      if (GetProfileName !== false || GetProfileName !== 'undefined') {
         GetProfileUser.innerHTML = GetProfileName;
      } else {
         GetProfileUser.innerHTML = "Not Signed In";
      }

   }
});


//copied code --START--

// left: 37, up: 38, right: 39, down: 40,
// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
var keys = { 37: 1, 38: 1, 39: 1, 40: 1 };

function GotoUserPage() {
   if (page.includes('UserPage')) {
      UserOpts()
   } else {
      window.open('UserPage.php', '_self');
   }
}

function preventDefault(e) {
   e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
   if (keys[e.keyCode]) {
      preventDefault(e);
      return false;
   }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
   window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
      get: function () { supportsPassive = true; }
   }));
} catch (e) {
   console.error(e.message);
 }

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
   window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
   window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
   window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
   window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
   window.removeEventListener('DOMMouseScroll', preventDefault, false);
   window.removeEventListener(wheelEvent, preventDefault, wheelOpt);
   window.removeEventListener('touchmove', preventDefault, wheelOpt);
   window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}

//copied code --END--



function LogOut() {

   document.cookie = "token =; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/HTML/Html;";
   document.cookie = "valid = false; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/HTML/Html;";
   document.cookie = "User = null; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/HTML/Html;";
   var RemUserOpt = document.getElementById('UserOpt');
   if (arguments.length > 0) {
      setTimeout(() => {
         window.open('./home-index.php', '_self');
      }, 1000);
   }
   else if (RemUserOpt === 'undefined' || RemUserOpt === null) {
      DisplErr("You will be signed out in 10 secs");
      setTimeout(() => {
         history.back();
      }, 10 * 1000);

   } else {
      setInterval(() => {
         RemUserOpt.classList.add('UserOpt2');
      }, 250);
      DisplErr("You will be signed out in 10 secs");
      setTimeout(() => {
         history.back();
      }, 10 * 1000);
   }


}


function ConfirmedDel() {

   var DelReq = new XMLHttpRequest();

   DelReq.onreadystatechange = function () {

      if (this.readyState === 4 && this.status === 200) {
         disableScroll()
         var DisplDelRes = document.getElementById('ConfirmDelDiag');

         while (DisplDelRes.firstChild) {
            DisplDelRes.removeChild(DisplDelRes.firstChild);
         }

         DisplDelRes.innerHTML = this.responseText;

      }
   };

   DelReq.open("POST", "DeleteAcc.php");
   DelReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   DelReq.send();

}

function ReqDel(event, type) {

   if (type === 1 || type === '1') {

      event.preventDefault();
      var a12 = document.getElementById('UserDelName').value;
      var b12 = document.getElementById('UserDelPswd').value;
      if (a12.length < 8 || b12.length < 4) {
         DisplErr("You have entered Invalid Details!");
      }
      else {
         var ReqDel = new XMLHttpRequest();

         ReqDel.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {

               var DisplDelRes = document.getElementById('ConfirmDelDiag');

               while (DisplDelRes.firstChild) {
                  DisplDelRes.removeChild(DisplDelRes.firstChild);
               }

               DisplDelRes.innerHTML = this.responseText;
               var DeldStat = ReqDel.getResponseHeader('Deld');

               if (DeldStat) {
                  LogOut('DelAcc');
               }
            }
         }
         ReqDel.open("POST", "ReqDel.php");
         ReqDel.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         ReqDel.send("DelName=" + a12 + "&DelPswd=" + b12);


      }
   }

   else if (type === 2 || type === '2') {

      ConfirmedCancl();
   }

}

function ConfirmedCancl() {
   var RemoveDelBox = document.getElementById('ConfirmDelBox');

   try {
      RemoveDelBox.style.animationName = 'Disappear';

      setTimeout(() => {
         RemoveDelBox.parentNode.removeChild(RemoveDelBox);
         enableScroll();
      }, 1000);
   } catch (err) {
      console.error(e.message);
   }

}

function Delete() {
   disableScroll();
   var ConfirmDelBox = document.createElement('div');
   ConfirmDelBox.className = 'ConfirmDelBox font coolTransit';
   ConfirmDelBox.setAttribute('id', 'ConfirmDelBox');
   document.body.appendChild(ConfirmDelBox);
   var ConfirmDelDiag = document.createElement('div');
   ConfirmDelDiag.setAttribute('id', 'ConfirmDelDiag');

   ConfirmDelBox.appendChild(ConfirmDelDiag);
   ConfirmDelDiag.className = 'ConfirmDelDiag';



   var DelOptStr = document.createElement('p');
   var DelOptConf = document.createElement('button');
   var DelOptCancl = document.createElement('button');

   ConfirmDelDiag.appendChild(DelOptStr);
   ConfirmDelDiag.appendChild(DelOptConf);
   ConfirmDelDiag.appendChild(DelOptCancl);

   DelOptStr.setAttribute('id', 'DelOptStr');
   DelOptConf.setAttribute('id', 'DelOptConf');
   DelOptCancl.setAttribute('id', 'DelOptCancl');

   DelOptStr.className = 'font';
   DelOptConf.className = 'DelOptConf';
   DelOptCancl.className = 'DelOptCancl';

   DelOptStr.innerHTML = 'Are you sure you want to Permanently Delete your Account?\nThis is a Irreversible process!';
   DelOptConf.innerHTML = 'Confirm Deletetion';
   DelOptCancl.innerHTML = 'Cancel';



   DelOptConf.setAttribute('onclick', 'ConfirmedDel()');
   DelOptCancl.setAttribute('onclick', 'ConfirmedCancl()');



   ConfirmDelBox.addEventListener('click', function (event) {
      event.stopPropagation();
      event.preventDefault();
      event.stopImmediatePropagation()
   });
   /*
  var FixTop =window.pageXOffset || document.documentElement.scrollTop;
  var FixLeft = window.pageYoffset || document.documentElement.scrollLeft;
  
  window.onscroll = function(){
     window.scrollTo(FixTop,FixLeft);
  }*/


}

function UplBox() {
   var UplBoxPop = document.getElementById('UplBox');
   var UplBoxStyles = window.getComputedStyle(UplBoxPop);
   var UplBoxAnim = UplBoxStyles.animationName;
   if (GetValidity === true || GetValidity === '1') {
      if (UplBoxAnim === "none") {
         UplBoxPop.style.animationName = 'AppearUpl';

      }
      else if (UplBoxAnim === 'AppearUpl') {
         UplBoxPop.style.animationName = 'DisappearUpl';

      } else if (UplBoxAnim === 'DisappearUpl') {
         UplBoxPop.style.animationName = 'AppearUpl';
      }
   }

}

var FormSelect = document.getElementById('myform');

if (FormSelect !== null && FormSelect !== undefined) {
   FormSelect.addEventListener('keydown', function (event) {
      if (event.code === 'Enter' && event.target.id === 'pass') {

         document.getElementById('SignIn').focus();
         document.getElementById('SignIn').click();

      }
   });
}

function Upload(event) {
   event.preventDefault();
   var form = document.getElementById('upload');
   var fileInput = document.getElementById('file');
   var SetProgressTxt = document.getElementById('pt');
   var SetProgressBar = document.getElementById('pb');
   var formData = new FormData(form);

   var xhr = new XMLHttpRequest();
   xhr.open('POST', 'Upload.php', true);

   // Progress event listener to track upload progress
   xhr.upload.addEventListener('progress', function (event) {
      if (event.lengthComputable) {
         var percent = Math.round((event.loaded / event.total) * 100);

         // Update the UI with the upload progress
         SetProgressBar.style.width = percent + "%";
         SetProgressTxt.innerHTML = 'Progress: ' + percent + '%';
         console.log('Upload progress: ' + percent + '%');

      }
   });

   // Onload event listener to handle the server response
   xhr.onload = function () {
      if (xhr.status === 200) {
         // Handle the successful upload
         console.log('Upload successful');
      } else {
         // Handle upload errors
         console.log('Upload error: ' + xhr.status);
      }
   };

   // Send the form data
   xhr.send(formData);
}


function gearIcon(element) {
   var curStlye = window.getComputedStyle(element);
   var styleProp = curStlye.transform;
   if (styleProp === 'none') {
      element.style.transform = "matrix(0.707107, 0.707107, -0.707107, 0.707107, 0, 0)";
   } else if (styleProp === 'matrix(0.707107, 0.707107, -0.707107, 0.707107, 0, 0)') {
      element.style.transform = "matrix(1, 0, 0, 1, 0, 0)";
   } else {
      element.style.transform = "matrix(0.707107, 0.707107, -0.707107, 0.707107, 0, 0)";
   }

   var parentElem4 = element.parentNode; //parent
   var parentElem3 = parentElem4.parentNode;
   var parentElem2 = parentElem3.parentNode;
   var parentElem1 = parentElem2.parentNode;

   var TarChild = parentElem1.querySelector('.UPoptsBox');


   TarChild.classList.toggle('UPoptsDis');

}

window.onscroll = function scrollFunction() {
   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById('Go2Top').style.visibility = 'visible';
   } else if (document.body.scrollTop < 20 || document.documentElement.scrollTop < 20) {
      document.getElementById('Go2Top').style.visibility = 'hidden';
   }
}



function FeatureHandler(type, eventOrigin, originVID, originAID) {
   // Origin refers to the origin point of the request -> the target vid
 try {
     var RequestUpdateXML = new XMLHttpRequest();
     
     console.log(UserName + " "+type +" "+ originVID+" "+ originAID);
     RequestUpdateXML.onreadystatechange = function () {
        if (this.status === 200 && this.readyState === 4) {
          
        }
     }
     RequestUpdateXML.open("POST","FeatureHandler.php");
     RequestUpdateXML.setRequestHeader("Content-type","application/x-www-form-urlencoded");
     RequestUpdateXML.send("type="+type+"&VID="+originVID+"&AID="+originAID);
 } catch (e) {
    console.error(e.message);
 }
}