/*eslint no-console: ["error", { allow: ["warn", "error", "log"] }] */
export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    var scroller = {
      topptekst: document.querySelector('.topptekst__navigasjon'),
      initOffsetTop: 0,
      body: document.querySelector("body"),
      lastKnownScrollPosition: 0,
      ticking: false,
      endret: false,
      mobilBredde: 764,
    };
    scroller.initOffsetTop = scroller.topptekst.offsetTop;
    scroller.scrollSjekker = function(scrollPos){
      if(!scroller.endret && scrollPos >= scroller.initOffsetTop ){
        scroller.topptekst.className = "topptekst__navigasjon topptekst__navigasjon--topp";
        scroller.body.style.paddingTop = scroller.topptekst.offsetHeight + "px"
        scroller.endret = true;
      }else if(scroller.endret && scrollPos < scroller.initOffsetTop){
        scroller.topptekst.className = "topptekst__navigasjon";
        scroller.body.style.paddingTop = 0;
        scroller.endret = false;
      }
    }
    window.addEventListener('scroll', function() {
      scroller.lastKnownScrollPosition = window.scrollY;
      if (!scroller.ticking) {
        window.requestAnimationFrame(function() {
          scroller.scrollSjekker(scroller.lastKnownScrollPosition);
          scroller.ticking = false;
        });
      }
      scroller.ticking = true;
    });

    var brukerpanel = document.querySelector('.topptekst__login');
    var handlekurv = document.querySelector('.topptekst__handlekurv');
    var login = document.querySelector('.showlogin');
    document.querySelector(".topptekst__navigasjon .bruker").addEventListener('click', function(event) {
      if(window.innerWidth > scroller.mobilBredde){
        event.preventDefault();
        brukerpanel.classList.toggle('aktiv');
      }
    });
    document.querySelector(".topptekst__navigasjon .kurv").addEventListener('click', function(event) {
      if(window.innerWidth > scroller.mobilBredde){
        event.preventDefault();
        handlekurv.classList.toggle('aktiv');
      }
    });
    if(login){
      login.addEventListener('click', function(event){
        if(window.innerWidth > scroller.mobilBredde){
          event.preventDefault();
          brukerpanel.classList.toggle('aktiv');
        }
      });
    }

    document.querySelector('.mobilmeny').addEventListener('click', function(event){
      event.preventDefault();
      scroller.topptekst.className = "topptekst__navigasjon topptekst__navigasjon--full";
    });
    document.querySelector('.topptekst__navigasjon__lukk').addEventListener('click', function(event){
      event.preventDefault();
      scroller.topptekst.className = "topptekst__navigasjon";
    });


  },
};
