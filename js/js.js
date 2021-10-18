var btnPecil= document.getElementById('btnPencil');
var btnTrash = document.getElementById('btnTrash');

function cargarPencil(){
    alert("Pencil presionado");
}

function cargarTrash(){
    alert("Trash presionado");
}

btnPecil.addEventListener('click',cargarPencil);

btnTrash.addEventListener('click',cargarTrash);