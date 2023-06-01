//theme 

var BoxShaId;



function setInitialTheme() {
   var theme = localStorage.getItem('theme');
   document.getElementById('switch').classList.toggle('actives');
   if (!theme) {
      theme = 'light';
      localStorage.setItem('theme', theme);
   }
   return theme;
}

function applyTheme(theme) {
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

   document.getElementById('switch').classList.toggle('actives', new_theme === 'dark');
   localStorage.setItem('theme', new_theme);
   html.classList.replace(theme, new_theme);
   BoxShaId.classList.replace(theme, new_theme);
   SectionCookie.classList.replace(theme, new_theme);

}

window.addEventListener('load', function () {
   var theme = setInitialTheme();
   applyTheme(theme);
});


const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);


const path = window.location.pathname;
const page = path.split("/").pop();

var condi = page.includes('ch');
console.log("includes ch : " + condi + "(condi)")


var condi3 = page.includes('home');


var condi5 = page.includes('videos');
console.log("includes videos : " + condi5 + '(condi5)')

var condi4 = page.includes('open');
console.log("includes open : " + condi4 + '(condi4)')

var condi2 = page.includes('index'); /*novel chapters*/
console.log("includes index : " + condi2 + '(condi2)')

console.log('1 st condition checked');
console.log(page);


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
   console.log('condi3');
   var getele = document.querySelectorAll('.abc');
   var length = getele.length;
   var i = 0;
   while (i < length) {
      getele[i].classList.add('abc_fix');
      console.log('ele no :');
      console.log(i);
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
   console.log('no bac_2 or nov_tool ')
}

// When the user clicks on the button, scroll to the top of the document
function bac_2_func() {
   document.body.scrollTop = 0; // For Safari
   document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}





function dropdowns() {
   document.getElementById('dropdown').classList.toggle("new");
  // document.getElementById('dropdown2').classList.toggle("new2"); no use , feel free to delete it,
  // after verifing it is indeed useless.

}

window.onclick = function (event) {
   if (!event.target.matches('.new3')) {
      var dropdowns = document.getElementsByClassName("drpshow");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
         var openDropdown = dropdowns[i];
         if (openDropdown.classList.contains("new")) {
            openDropdown.classList.toggle("new");
         }
      }
   }
}



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
   console.log('vw <= 414 and vh<= 896 ');
} else {
   console.log(' not working');
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
   console.log('forLike');
   this.classList.add('after');

   forLike.classList.add('after');
   console.log('after  ')
}


function submitted() {
   const user = document.getElementById("user").value;
   const pswd = document.getElementById("pass").value;
   const submitValue = document.activeElement.value;
   
   const xmlhttp = new XMLHttpRequest();
   xmlhttp.onload = function () {
      const textbox = document.getElementById("res");
      textbox.innerHTML = this.responseText;
      const customHeader = xmlhttp.getResponseHeader('X-Custom-Variable');
      if (customHeader){
         location.reload();
      }
      // Use the custom header value in your JavaScript code
      //console.log(customHeader);

   }
   xmlhttp.open("POST", "account0.php");
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xmlhttp.send("user=" + user + "&pswd=" + pswd + "&submit=" + submitValue);
}


function RefreshToken(){
   var RefreshTokenAjax = new XMLHttpRequest();
   RefreshTokenAjax.onload = function (){
   setCookie('token',this.responseText,1/24);
   }
   RefreshTokenAjax.open("POST","RefreshToken.php")
}

//tnks 2 w3schkl
function setCookie(cname, cvalue, exdays) {
   const d = new Date();
   d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
   let expires = "expires="+d.toUTCString();
   document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
 }
 
 function getCookie(cname) {
   let name = cname + "=";
   let ca = document.cookie.split(';');
   for(let i = 0; i < ca.length; i++) {
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
if ( SetVerifIcon !== false && SetVerifIcon !=='undefined ')  {
    
   document.getElementById('account').style.setProperty('--acc-sign-blr', '#2ada79');
}

