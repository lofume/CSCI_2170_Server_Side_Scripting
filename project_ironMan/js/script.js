/*
 * script.js
 * Author: Ava Powelson
 * 22 November 2021
 */

function userIconHover(img) {
    img.src = "img/user-6-32-active.png";
}

function userIconExit(img) {
    img.src = "img/user-6-32.png";
}

function sendBtnHover(btn) {
    btn.style.backgroundColor = "#c8d6e5";
}

function sendBtnExit(btn) {
    btn.style.backgroundColor = "white";
}

function dropdownMenu() {
    document.getElementById("dropdown-links").classList.toggle("show");
}

/* Close the dropdown menu if the user clicks outside of it */
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        let dropdowns = document.getElementsByClassName("dropdown-content");
        let i;
        for (i = 0; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

/* This is so that the most recent chats are displayed first */
document.body.onload = function () {
    let chatDisplay = document.getElementById("chatDisplay");
    chatDisplay.scrollTop = chatDisplay.scrollHeight;
}

/* The following is used to drop any temp tables when users exit the site.

   Original Solution:

   Author: Ava Powelson
   Date: December 2021

   document.body.onunload = function() {
       let ajax = new XMLHttpRequest();
       ajax.open("GET", "includes/logout.php", true);
       ajax.send();
   };

   Updated solution
   Retrieved from: https://developers.google.com/web/updates/2018/07/page-lifecycle-api?utm_source=lighthouse&utm_medium=devtools#the-unload-event
   Author: Philip Walton
   Date: July 2018
   Date Accessed: 05 December 2021

   Updated after audit performed using Chrome Dev Tools. Recommended avoiding the use of onunload.

*/
const terminationEvent = 'onpagehide' in self ? 'pagehide' : 'unload';

addEventListener(terminationEvent, () => {
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "includes/logout.php", true);
    ajax.send();
});
