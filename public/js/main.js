// const sel = document.getElementById("select");
// const comp = document.getElementById("comp");
// const cit = document.getElementById("cit");
// const choose = document.querySelectorAll(".choose");
// const col = document.querySelectorAll(".col");
// sel.addEventListener("change", changeOpt);

// function changeOpt(){
//     let opt = sel.options[sel.selectedIndex];
//     if(opt.value == 'company'){
//         comp.style.display = "block";

//     }else{
//         comp.style.display = "none";
//     }
//     if(opt.value == "city"){
//         cit.style.display = "block";
//     }else{
//         cit.style.display = "none";
//     }
// }

// cit.addEventListener("click", cityValue);

// function cityValue(){
//     c = document.querySelectorAll(".choose");
//     c.forEach((e, i) =>{
//         let city = cit.options[cit.selectedIndex].value;
//         if(e.innerText!=city.toUpperCase()){
//             col[i].classList.add("hide");
//         }else{

//             col[i].classList.remove("hide");
//         }
//     })
// }

// comp.addEventListener("change", companyValue);

// function companyValue(){

//     choose.forEach((elemnt, index) =>{
//         let company = comp.options[comp.selectedIndex].value;

//         if(elemnt.innerText.includes(company.toUpperCase())){
//             col[index].classList.remove("hide");  
//         }else{
//             col[index].classList.add("hide");
//         }
//     })
// }



// // function showAll(){

// //     col.forEach((index) =>{
// //         let all = sel.options[sel.selectedIndex].value;
// //         if(all.value == "all"){
// //             col[index].classList.remove("hide");  
// //         }
// //     })
// // }

$(function () {
    $('.navbar-header').click(function () {
        $("#sidebar").hide();
        $('.navbar-header2').removeClass('d-none');
        $('.holder').removeClass('aside');
    });

    $(".navbar-toggle").click(function () {
        $('.navbar-collapses').slideToggle("fast");
    });
    $(document).on("click", function (event) {
        var $trigger = $(".navbar-toggle");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".navbar-collapses").slideUp("fast");
        }
    });
    $('.navbar-header2').click(function () {
        $('.holder').removeClass('mobile');
        $("#sidebar").show();
        $('.navbar-header2').addClass('d-none');
        $('.holder').addClass('aside');


    });


    $('.dropdown').click(function () {
        $('#manage').toggle();
    });


    $("#bell").click(function () {
        $('.notification').slideToggle("fast");
    });
    $(document).on("click", function (event) {
        var $trigger = $("#bell");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".notification").slideUp("fast");
        }
    });

    $("#user").click(function () {
        $('.userinfo').slideToggle("fast");
    });
    $(document).on("click", function (event) {
        var $trigger = $("#user");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".userinfo").slideUp("fast");
        }
    });
    $('.dropdown2').click(function () {
        $('#manage2').toggle();
    });
})

function reveal() {
    var reveals = document.querySelectorAll(".animate");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 100;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("scroll", reveal);
