const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)


const path = window.location.pathname;
const page = path.split("/").pop();

var condi = page.includes('ch');
console.log("includes ch : " + condi)

 

var condi5 = page.includes('videos');
console.log("includes videos : " + condi5)

var condi4 = page.includes('open');
console.log("includes open : "+condi4)

var condi2 = page.includes('index'); /*novel chapters*/
console.log("includes index : " +condi2 )

console.log('1 st condition checked');
console.log(page);
/*
if (condi2 === true){
   window.onscroll = function (){
      document.getElementById('stupid').classList.add('bdani');
      console.log('bdani added');
   }
}*/

if (condi5 === true ){
  // autoplay();
}

      // When the user scrolls down 20px from the top of the document, show the button
if (condi === true ||  condi4 === true || condi5 === true) {
   window.onscroll = function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
         document.getElementById('bac_2').classList.add('shw');
      } else if (document.body.scrollTop < 20 || document.documentElement.scrollTop < 20) {
         document.getElementById('bac_2').classList.remove('shw');
         document.getElementById('nov_tool').classList.remove('novel_tool');
      }
   }
}

// When the user clicks on the button, scroll to the top of the document
function bac_2_func() {
document.body.scrollTop = 0; // For Safari
document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
/*
function stupid(){
   document.getElementById('notfun').classList.toggle('bdani');
}*/


// following is dark mode cookie - local stor

      // setting theme when contents are loaded
      window.addEventListener('load', function () {
         var theme = localStorage.getItem('theme');
         // when first load, choose an initial theme
         if (theme === null || theme === undefined) {
            theme = 'light';
            localStorage.setItem('theme', theme);
         }
         // set theme
         var html = document.querySelector("html");
         // apply the variable
         html.classList.add(theme);
      })

      function switchTheme() {
         var theme = localStorage.getItem('theme');
         var html = document.querySelector('html');
         // choose new theme
         if (theme === 'dark') {
            new_theme = 'light';
         } else {
            new_theme = 'dark';
         }
         // remove previous class
         html.classList.remove(theme);
         // add new class
         html.classList.add(new_theme);
         // store theme
         localStorage.setItem('theme', new_theme);
      }

  function dropdowns(){
   document.getElementById('dropdown').classList.toggle("new");
     document.getElementById('dropdown2').classList.toggle("new2");
     
 }

window.onclick = function(event) {  
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
	var novel= window.open("./home-novels.php","_self")
}

function movi() { // opens 'movie' pg, called by onclick
	var movies = window.open("../Html/videos.php","_self")

}
function graphical(){
   var graphical = window.open("./Graphi.php","_self")
}

 
function listch(){ // list chapters on novels - needs improv - called by onclick
var show_ch = window.open("./index_novel.php","_self")
}



function manga(){ // opens manga index - needs lot of work
	var mangas = window.open("../Html/manga-index.php","_self")
}
 /*
window.onload = function(){
   document.body.classList.toggle('.bdani');
   console.log('onload triggered');
}*/


  

/*
if (condi === true) {
   console.log('Novel tools are "allowed" in this page');
   console.log(condi);
   console.log('2nd condition checked');
   window.onclick = function(){
      var god = 
         globalThis.afk =  true ;
  
   } 
 
      console.log(' 3rd condition checked  set afk = ' + afk );
     
if (afk === true){
      alert('yes yes yes');
   }
 
} */


if ( condi == true || condi5 == true) {
var lastScrollTop = 0 ;

document.addEventListener("scroll",function(){
   var st = window.pageYoffset ||document.documentElement.scrollTop ;
   if (st > lastScrollTop ){
      document.getElementById('nov_tool').classList.remove('novel_tool');
   }else if (st < lastScrollTop){
      document.getElementById('nov_tool').classList.add('novel_tool');
   }
   lastScrollTop = st <= 0 ? 0 : st;
},false);
} else {
   console.log('no nov tool');
}

if (vw <= 414   && vh <= 896){
   console.log('vw <= 414 and vh<= 896 ');
} else {
   console.log(' not working');
}
 

 /*
var img_src_01 = [" /006.jpg","/004.jpg","../Resources/images/005.jpg","../Resources/images/001.jpg"]
var index = 0;
var renew = setInterval (function(){
   if(img_src_01.length == index){
      index = 0;
   }
   else {
      document.getElementById("img_01").src = img_src_01[index];
      index++;
   }
},5000);
*/
/*

function autoplay(){
   let videos = document.querySelectorAll('video');
   videos.forEach((video) => {
      video.muted = true;
      let playPromise = video.play();
      if (playPromise !==  undefined){
         playPromise.them((_) =>{
            let observer = new IntersectionObserver((entries) => {
                  entries.forEach((entry) => {
                     if (
                        entry.intersectioRatio !== 1 &&
                        !video.paused){
                        video.pause();

                     } else if (video.paused){
                        video.play();
                        vid.volume = 0.3;
                     }
                  });
               },
               {threshold: 1}
               );
         });
      }
   });
}

 function myauto(){
   let allvid = document.querySelectorAll('video');
   allvid.forEach(autoplay());
 
 }*/

function autoplay(){
 const videos = document.querySelectorAll("video"); // Select ALL the Videos
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) {
      entry.target.pause(); // Pause the TARGET video
    } else {
      entry.target.play(); // Play the TARGET video
    }
  });
}, {threshold:0.5});
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