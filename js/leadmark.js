
// smooth scroll
$(document).ready(function(){
    $(".navbar .nav-link").on('click', function(event) {

        if (this.hash !== "") {

            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 700, function(){
                window.location.hash = hash;
            });
        } 
    });
});

// protfolio filters
$(window).on("load", function() {
    var t = $(".portfolio-container");
    t.isotope({
        filter: ".new",
        animationOptions: {
            duration: 750,
            easing: "linear",
            queue: !1
        }
    }), $(".filters a").click(function() {
        $(".filters .active").removeClass("active"), $(this).addClass("active");
        var i = $(this).attr("portfolio-item");
        return t.isotope({
            filter: i,
            animationOptions: {
                duration: 750,
                easing: "linear",
                queue: !1
            }
        }), !1
    })
})

// formulario emailjs
const btn = document.getElementById('button');

document.getElementById('form')
    .addEventListener('submit', function (event) {
        event.preventDefault();

        btn.value = 'Enviando...';

        const serviceID = 'default_service';
        const templateID = 'template_xwtog37';

        emailjs.sendForm(serviceID, templateID, this)
            .then(() => {
                btn.value = 'Enviar';
                swal("¡ Gracias por tu mensaje! ", " ...Recuerda fijarte en tu casilla de entrada de Email o Spam.")

            }, (err) => {
                btn.value = 'Enviar';
                alert(JSON.stringify(err));
            });
    });
    const puntos = document.querySelector('.puntos'); // Obtener el elemento padre

    if (window.innerWidth >= 1200) {
      let ultimo;
      for(let i = 1; i <= 3; i++){
        ultimo = puntos.querySelector(':last-child');
        puntos.removeChild(ultimo);
      }
      
    } else if (window.innerWidth >= 1024) {
      let ultimo;
      for(let i = 1; i <= 2; i++){
        ultimo = puntos.querySelector(':last-child');
        puntos.removeChild(ultimo);
      }
      
    } else if (window.innerWidth >= 768) {
      const ultimo = puntos.querySelector(':last-child');
      console.log(ultimo);
      puntos.removeChild(ultimo);
      
    } 
    
    
    const grande = document.querySelector('.grande');
    const punto = document.querySelectorAll('.punto');
    let posicionState = 0;
    
    // Cuando CLICK en punto
    //   Saber la posición de ese punto
    // Aplicar un transform translateX al grande
    // Quitar la clase activo de todos puntos
    // Añadir la clase activo al punto que hemos hecho click
    
    // Recorrer todos los puntos
    punto.forEach((cadaPunto, i) => {
    //   Asignamos un click a cada punto
      punto[i].addEventListener('click', () => {
        const primerPunto = punto[0];
        const ultimoPunto = punto[punto.length - 1];
    //     Guardar la posición de ese punto
        posicionState = i;
        dezplazarCarrousel();
        carrouselBtnPrev.disabled = false;
        carrouselBtnNext.disabled = false;
        
        
        
    //     Recorremos todos los puntos 
        punto.forEach((cadaPunto, i) => {
          punto[i].classList.remove('active');
        })
        
    //     Añadir clase active en el punto que hemos hecho click
        punto[i].classList.add('active');
        if(primerPunto.classList.contains('active')){
          carrouselBtnPrev.disabled = true;
        } else if(ultimoPunto.classList.contains('active')) {
          carrouselBtnNext.disabled = true;
        }
        
      })
    });
    
    // Deplazar carrousel a la derecha o la izquierda
    const carrouselBtnNext = document.querySelector('.carrousel__btn--next');
    const carrouselBtnPrev = document.querySelector('.carrousel__btn--prev');
    
    
    carrouselBtnNext.addEventListener('click', () => {
      const ultimoPunto = punto[punto.length - 1];
      if(!ultimoPunto.classList.contains('active')) {
        posicionState++;
        punto.forEach((cadaPunto, i) => {
        punto[i].classList.remove('active');
        })
      punto[posicionState].classList.add('active');
        carrouselBtnPrev.disabled = false;
        dezplazarCarrousel();
        if(ultimoPunto.classList.contains('active')) {
          carrouselBtnNext.disabled = true;
        }
      } else {
        carrouselBtnNext.disabled = true;
      }
      
    })
    
    carrouselBtnPrev.addEventListener('click', () => {
      
      const primerPunto = punto[0];
      if(!primerPunto.classList.contains('active')) {
        posicionState--;
        punto.forEach((cadaPunto, i) => {
          punto[i].classList.remove('active');
        })
        punto[posicionState].classList.add('active');
        carrouselBtnNext.disabled = false;
        dezplazarCarrousel();
        if(primerPunto.classList.contains('active')) {
          carrouselBtnPrev.disabled = true;
        }
      } else {
        carrouselBtnPrev.disabled = true;
      }
    
      
    })
    
    function dezplazarCarrousel() {
      let operacion = posicionState * -8.34;
      grande.style.transform = `translateX(${ operacion }%)`;
    }


    