const INPUT_SEARCH = document.getElementById('input-search');
const TABLE_DATAS = document.getElementById('table-datas');

INPUT_SEARCH.addEventListener('keyup', () => {
    let express = INPUT_SEARCH.value.toLowerCase();

    let lines = TABLE_DATAS.getElementsByTagName('tr');

    for (let position in lines){
        if(true === isNaN(position)){
            continue;
        }
        
        let contentLine = lines[position].innerHTML.toLowerCase();

        if(true === contentLine.includes(express)){
            lines[position].style.display = '';
        }else{
            lines[position].style.display = 'none';
        }
    }
})
