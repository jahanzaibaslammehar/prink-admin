// Load plugins
import helper from "./helper";
import axios from "axios";
import * as Popper from "@popperjs/core";
import dom from "@left4code/tw-starter/dist/js/dom";

// Set plugins globally
window.helper = helper;
window.axios = axios;
window.Popper = Popper;
window.$ = dom;

// CSRF token
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

$('.delete-confirm').on('click', function (e) {
    e.preventDefault();
    let btn = $(this);
    if (confirm("Do you really want to delete the record?") == true) {
        let url = btn.attr('href');
        let xhr = new XMLHttpRequest();
        xhr.open("delete", url, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                location.reload();
            }
        }
        xhr.send(url);
    }
});