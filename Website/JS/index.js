const head1 = document.getElementById('Welcome');

window.onload = Welcome();

function Welcome (){
    let nama = prompt('Siapa nama Anda?');
    if (nama!=null){
        if(nama.length>=1 && nama[0]!=""){
            head1.innerText = "Selamat Datang, "+nama+"!";   
        }
        
    }
}

