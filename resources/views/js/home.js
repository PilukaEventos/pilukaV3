




function loading() {
    const preload = document.getElementById('box-load');
    const bodyHome = document.getElementById('couteudoInteiro');
    preload.style.display='none';
    bodyHome.style.display="block";
}


/************* o modo dark ***************/
/*const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}
*/
var swiper = new Swiper(".home-slider", {
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay:2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".room-slider", {
    spaceBetween: 30,
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".gallery-slider", {
    spaceBetween: 10,
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay: 1000,
        disableOnInteraction: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".opniao-slider", {
    spaceBetween: 10,
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

let accordions = document.querySelectorAll('.perguntas .row .content .box');

accordions.forEach(acco =>{
    acco.onclick = () =>{
        accordions.forEach(subAcco => {subAcco.classList.remove('active')});
        acco.classList.add('active');
    }
})



/*************** faz o swiper funcionar ****************/
document.getElementById('menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}



/************************* Faz o upload das imagens ***********************/
const imageField = document.querySelector("#image-field");
const imagePreview = document.querySelector("#image-preview");

const loadImage = (e) => {
    const filePath = e.target || window.event.srcElement;

    const file = filePath.files;

    const fileReader = new FileReader();

    fileReader.onload = () => {
        imagePreview.src = fileReader.result;
    };

    fileReader.readAsDataURL(file[0]);
};

imageField.addEventListener("change",loadImage);

/************************ FUNCOES SERVICOS SELECIONADOS ******************************/


    function servp1()
    {
        if (document.getElementById("servcheck1").checked==true) {
            document.getElementById('servp1').style.color="#8B0000";
            document.getElementById("servcheck1").checked=false;
        }
        else{
            document.getElementById('servp1').style.color="#FFD700";
            document.getElementById("servcheck1").checked=true;
        }
    }

    function servp2()
        {
            if (document.getElementById("servcheck2").checked==true) {
                document.getElementById('servp2').style.color="#8B0000";
                document.getElementById("servcheck2").checked=false;
            }
            else{
                
                document.getElementById('servp2').style.color="#FFD700";
                document.getElementById("servcheck2").checked=true;
            }
        }

    function servp3(){
            if (document.getElementById("servcheck3").checked==true) {
                document.getElementById('servp3').style.color="#8B0000";
                document.getElementById("servcheck3").checked=false;
            }
            else{
                
                document.getElementById('servp3').style.color="#FFD700";
                document.getElementById("servcheck3").checked=true;
            }
        }

    function servp4(){
        if (document.getElementById("servcheck4").checked==true) {
            document.getElementById('servp4').style.color="#8B0000";
            document.getElementById("servcheck4").checked=false;
        }
        else{
            
            document.getElementById('servp4').style.color="#FFD700";
            document.getElementById("servcheck4").checked=true;
        }
    }
    
    function servp5(){

        if (document.getElementById("servcheck5").checked==true) {
            document.getElementById('servp5').style.color="#8B0000";
            document.getElementById("servcheck5").checked=false;
        }
        else{
            
            document.getElementById('servp5').style.color="#FFD700";
            document.getElementById("servcheck5").checked=true;
        }
    } 
