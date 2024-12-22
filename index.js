const navItems = document.querySelectorAll('.items');
const section1= document.querySelector('.addSection')
const section2= document.querySelector('.deleteSection')
const section3= document.querySelector('.editSection')
const section4= document.querySelector('.viewSection')




navItems[0].addEventListener("click",()=>{
    section1.style.display="block"
    section2.style.display="none"
    section3.style.display="none"
 section4.style.display="none"
    
})

navItems[1].addEventListener("click",()=>{
    section1.style.display="none"
    section2.style.display="block"
    section3.style.display="none"
    section4.style.display="none"

})

navItems[2].addEventListener("click",()=>{
    section1.style.display="none"
    section2.style.display="none"
    section3.style.display="block"
    section4.style.display="none"

})

navItems[3].addEventListener("click",()=>{
    section1.style.display="none"
    section2.style.display="none"
    section3.style.display="none"
    section4.style.display="block"

})









 
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('#navbarNavDropdown');
    navItems.forEach(link => {
        link.addEventListener('click', () => {
            if (navbarToggler.getAttribute('aria-expanded') === 'true') {
                const bootstrapCollapse = new bootstrap.Collapse(navbarCollapse, {
                    toggle: true
                });
            }
        });
    });





