
/*********Pesquisa de saloões e categorias de serviços*******/
function formatacaoLetras(textoPesquisado){
    return textoPesquisado.toLowerCase().trim().normalize('NFD').replace(/[\u0300-\u036f]/g,' ');
}

const searchCategory = document.getElementById('btnprincipalSearch');

const mediaQuery = window.matchMedia("(max-width:88rem)")
function pesquisaCategorias() {
    
if (mediaQuery.matches) {
searchCategory.addEventListener('input',(event)=>{
    
    const textoPesquisado = formatacaoLetras(event.target.value);

    const resultadoDaPesquisa =document.getElementById('resultadoNaoEncontrado')
    
    const itemsListned = document.querySelectorAll(`.items .item`);

    const separador =document.getElementById('line')

    let resultadoNaoEncontrado = false;
    
    itemsListned.forEach(itemsListned =>{
    /**Se quiser apenas pequisar o titulo****
     *  const itemTitle = item.querySelector('item-title').textContent
     * depois substituir itemsListned.textContent
     *  funciona para pesquisar item individual
     * ****/
        if(formatacaoLetras(itemsListned.textContent).indexOf(textoPesquisado) !== -1){
            itemsListned.style.display='block';
            resultadoNaoEncontrado=true;
            line.style.display="block";
        }
        else{
            itemsListned.style.display='none';
          
        }
    })
    if (resultadoNaoEncontrado) {
        resultadoDaPesquisa.style.display='none';
    }
    else{
        resultadoDaPesquisa.style.display='block';
    }
    
});
}
else{
    searchCategory.addEventListener('input',(event)=>{
    
        const textoPesquisado = formatacaoLetras(event.target.value);
    
        const resultadoDaPesquisa =document.getElementById('resultadoNaoEncontrado')
        
        const itemsListned = document.querySelectorAll(`.items .item`);
    
        const separador =document.getElementById('line')
    
        let resultadoNaoEncontrado = false;
    
        
        itemsListned.forEach(itemsListned =>{
        /**Se quiser apenas pequisar o titulo****
         *  const itemTitle = item.querySelector('item-title').textContent
         * depois substituir itemsListned.textContent
         *  funciona para pesquisar item individual
         * ****/
            if(formatacaoLetras(itemsListned.textContent).indexOf(textoPesquisado) !== -1){
                itemsListned.style.display='flex';
                resultadoNaoEncontrado=true;
                line.style.display="flex";
            }
            else{
                itemsListned.style.display='none';
              
            }
        })
        if (resultadoNaoEncontrado) {
            resultadoDaPesquisa.style.display='none';
        }
        else{
            resultadoDaPesquisa.style.display='flex';
        }
        
    });
}
}
pesquisaCategorias()
mediaQuery.addEventListener('change',()=>{pesquisaCategorias()});