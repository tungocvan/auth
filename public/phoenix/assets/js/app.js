document.addEventListener('DOMContentLoaded', function(event) {
    let main = document.querySelector('main');
    let navLinkLabel = document.querySelectorAll('.nav-link');
    let footerRight = document.querySelector('.navbar-vertical-footer')
    let thunho = document.querySelector('#thunho')

    thunho.addEventListener('click',function(){
        
        main.classList.toggle('navbar-vertical-collapsed')
        footerRight.classList.toggle('footer-border-right')
        let content = document.querySelector('main .content');
        if(footerRight.classList.contains("footer-border-right")){           
            content.style.marginLeft='50px';
        }else{
            content.style.marginLeft= '15.875rem';
        }
        
    })
    navLinkLabel.forEach((item) => {
        item.style.paddingLeft = 0;
    })

    
});
// let active = document.querySelector('.active');
//     console.log('active:',active)
//     active.classList.remove('active');