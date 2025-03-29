

/************* o modo dark ****************/

const contagem=document.getElementById('output')
const btnclick=document.getElementById('clicks')
let count=0


    const switchMode = document.getElementById('switch-mode')  

    sessionStorage.setItem("lightMode","lightMode")

    switchMode.addEventListener('click',function () {
    
        if (this.checked) 
        {
            sessionStorage.setItem("darkMode","darkMode")
            count=count+1
            document.body.classList.add('dark')


        }
        else{
            count=count-1
            if (count<0) {
                count=0
                document.body.classList.remove('dark')
            }

            if (sessionStorage.setItem("darkMode","darkMode")==="darkMode")
            {
                document.body.classList.add('dark')
            }
            else{
                document.body.classList.remove('dark')
                sessionStorage.removeItem("darkMode","darkMode")
            }
            
        }
        
    })
    
    if (sessionStorage.getItem('darkMode')==='darkMode')
    {
        document.body.classList.add('dark')
    }
    else
    {
        document.body.classList.remove('dark')
    }



const { isEmpty } = require("lodash");



const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('mousemove', function () {
		allSideMenu.forEach(i=> {
			if (i.href.includes(window.location.pathname) != true) {
				item.addEventListener('mouseout', function(){
					i.parentElement.classList.remove('active');
				})
			}else{
				li.classList.add('active')
			}
		})
		li.classList.add('active');
	})
})




let accordions = document.querySelectorAll('#sidebar .side-menu.top li a');

accordions.forEach(acco =>{
    acco.onclick = () =>{
        accordions.forEach(subAcco => {subAcco.classList.remove('active')});
        acco.classList.add('active');
    }
})



/************************ TOGGLE SIDEBAR ************************/
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})



/************************************** Menu search ****************************************/
const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})



if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



	  /************* galeria admin code ****************/
    
	  document.addEventListener('DOMContentLoaded', function(){
		lightGallery(document.getElementById('lightgallery'),{
			selector:'a',
			thumbnail:true,
			autoplay:true,
			zoom:true,
		});
	  })
	 
/****** BOTAO ATUALIZAR FOTO DO PERFIL DO CLIENTE ***************/
			function atualizarfoto(){
				document.getElementById('actualperfil').style.display='block';
			}
