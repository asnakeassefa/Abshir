    window.addEventListener("scroll" , function(){
        var nav = document.getElementById("nav");
        
        nav.classList.toggle("sticky" ,window.scrollY > 0)
    })

    var ul = document.getElementById("menulist");
    var lbut=document.getElementById("l");
    var xbut = document.getElementById("x");
    function togglemenu(){
        ul.style.left = "0px";
        lbut.style.display = "none";
        xbut.style.display = "inline";
    }
    function cancel(){
        ul.style.left = "-3230px";
        lbut.style.display = "inline";
        xbut.style.display = "none";
    }

    const div = document.querySelector('#pop');
    
function pop(){
    div.style.display = "flex";
    wrap.classList.add("wrap-blur");
}
function popdown(){
    div.style.display="none";
    wrap.classList.remove("wrap-blur");
}

// if ( window.history.replaceState ) {
//   window.history.replaceState( null, null, window.location.href );
// }
