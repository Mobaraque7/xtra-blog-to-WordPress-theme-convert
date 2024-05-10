(function(){
    const xBpagiNav = document.querySelectorAll("a.tm-paging-item");
    const xbpaniNavTwo = document.querySelectorAll("ul.tm-paging-item");
    const nextButton = document.querySelector("a.next");

    xbpaniNavTwo.forEach((eel)=>{
        eel.classList.remove('tm-paging-item');
    });
    xBpagiNav.forEach((el)=>{
        el.classList.remove("tm-paging-item");
        el.classList.add("tm-paging-link");
        el.classList.add("mb-2");
        el.classList.add("tm-btn");
    });
})();