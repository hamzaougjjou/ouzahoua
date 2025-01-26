// let current_page = 1;
// let total_pages = 1;
// const btn_next = document.getElementById("btn_next");
// const btn_prev = document.getElementById("btn_prev");

// const section_1 = document.getElementById("section-1");
// const section_2 = document.getElementById("section-2");
// const section_3 = document.getElementById("section-3");
// const btn_submit_register = document.getElementById("btn_submit_register");
// const register_form = document.getElementById("register_form");

// btn_submit_register.addEventListener("click", () => {
//     // alert(77777)
//     register_form.submit();
// })



// btn_next.addEventListener("click", () => {

//     switch ( current_page ) {
//         case 1:
//             section_1.classList.remove("block");
//             section_1.classList.add("hidden");

//             section_2.classList.remove("hidden");
//             section_2.classList.add("block");

//             btn_prev.classList.remove("hidden");
//             btn_prev.classList.add("block");
//             break;
//         case 2:
//             section_1.classList.remove("block");
//             section_1.classList.add("hidden");

//             section_2.classList.remove("block");
//             section_2.classList.add("hidden");

//             section_3.classList.remove("hidden");
//             section_3.classList.add("block");

//             btn_prev.classList.remove("hidden");
//             btn_prev.classList.add("block");


//             btn_next.classList.remove("block");
//             btn_next.classList.add("hidden");

//             btn_submit_register.classList.add("block");
//             btn_submit_register.classList.remove("hidden");
//             break;
//         default:
//             break;
//     }
//     current_page++;
// })


// btn_prev.addEventListener("click", () => {

//     switch ( current_page ) {
//         case 2:
//             section_2.classList.remove("block");
//             section_2.classList.add("hidden");

//             section_1.classList.remove("hidden");
//             section_1.classList.add("block");

//             btn_prev.classList.remove("block");
//             btn_prev.classList.add("hidden");

//             break;
//         case 3:
//             section_3.classList.remove("block");
//             section_3.classList.add("hidden");

//             section_2.classList.remove("hidden");
//             section_2.classList.add("block");

//             // btn_prev.classList.remove("block");
//             // btn_prev.classList.add("hidden");

//             btn_next.classList.add("block");
//             btn_next.classList.remove("hidden");

//             btn_submit_register.classList.add("hidden");
//             btn_submit_register.classList.remove("block");

//             break;
//         default:
//             break;
//     }
//     current_page--;
// })