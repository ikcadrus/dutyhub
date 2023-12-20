function changeText(){

    var checkbox = document.getElementById('checkbox');
    var text = document.getElementById('duty-ready');

    if(checkbox.checked){
        text.style.textDecoration = 'line-through';
        text.style.color = '#bdbdbd';
    } else {
        text.style.textDecoration = 'none';
        text.style.color = 'black';
    }
}
