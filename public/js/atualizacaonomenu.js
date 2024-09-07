/************* Submenu Categoria ********************/
let subMenu=document.getElementById('submenu')
let menuDropDown=document.getElementById('navbar')


    subMenu.addEventListener('click',function(){
    
    if(subMenu.checked){
        menuDropDown.style.top="0rem"
        menuDropDown.style.height="12.4rem"
    }
    else{
        menuDropDown.style.top="-3rem"
    }
    
})

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
