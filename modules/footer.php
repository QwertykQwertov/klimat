</main>

<!-- Modal -->
<div class="modal fade " id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <!-- modal-lg -->
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-end">
        <button style="background: transparent; border: none" type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true" class="h4">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carouselModal" class="carousel carousel-dark slide" style="height: 100%;">
          <div class="carousel-inner" id="modalCarouselInner" style="height: 100%;">
            <div class="carousel-item active" style="height: 100%;">
              <img class="ki-modal-carousel-item-image" id="modalImage" src="" alt="">
            </div>
          </div>
          <button id="carouselButtonPrev" class="carousel-control-prev" type="button" data-bs-target="#carouselModal" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
          </button>
          <button id="carouselButtonNext" class="carousel-control-next" type="button" data-bs-target="#carouselModal" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->

<footer class=" pt-5 bg-dark text-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5">
      <div class="col mb-3">
        <a href="/" class="mb-3 text-decoration-none nav-link text-light ki-footer-link">
          <h5>ООО "КЛИМАТ МА"</h5>
        </a>
        <p class="text-light">ИНН: 5017103317</p>
        <p class="text-light">КПП: 501701001</p>
        <p class="text-light">ОГРН: 1145017007410</p>
      </div>

      <div class="col mb-3"></div>
      <div class="col mb-3"></div>
      <div class="col mb-3">
        <a href="/contacts" class="mb-3 text-decoration-none nav-link text-light ki-footer-link">
          <h5>Контакты</h5>
        </a>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="/contacts/" class="nav-link p-0 text-light ki-footer-link">
              143532 Р.Ф., Московская область, Истринский район, г. Дедовск, ул. Энергетиков, д.24
            </a></li>
          <li class="nav-item mb-2"><a href="tel:+79099747545" class="nav-link p-0 text-light ki-footer-link">+7 (909) 974-75-45</a></li>
          <li class="nav-item mb-2"><a href="/contacts/" class="nav-link p-0 text-light ki-footer-link">climatma@mail.ru</a></li>
        </ul>
      </div>

      <div class="col mb-3">
        <p><a class="ki-footer-link nav-link text-ligh" href="/confidential">Политика конфиндицеальности</a></p>
      </div>


    </div>
  </div>
</footer>

<script>
  // Открытие модального окна со слайдером
  function onImageClick(e) {
    console.log(e)

    let div
    let img

    if (e.target.nodeName === 'DIV') {
      div = e.target.parentNode
    } else if (e.target.className === 'h5') {
      div = e.target.parentNode.parentNode
    }
    img = div.querySelector('img')

    setSlides(img)

    console.log(img)
    $('#modalCenter').modal('show')
    // if (e.target.classList.contains('ki-modal-trigger')) {
    //   console.dir(e.target.children[0])
    //   setSlides(e.target.children[0])
    //   // modalImage.src = e.target.children[0].currentSrc
    // } else if (e.target.nodeName === 'IMG') {
    //   console.dir(e.target)
    //   setSlides(e.target)
    //   // modalImage.src = e.target.currentSrc
    // } else {
    //   e.stopPropagation()
    // }
  }


  function setSlides(el) {
    modalCarouselInner.innerHTML = ''

    addSlide(el.src, true)

    let path = el.src.split('/')
    path.pop()
    path = path.join('/') + '/'

    const otherImg = el.dataset.images && el.dataset.images.split(',')

    if (!otherImg) {
      carouselButtonPrev.classList.add('d-none')
      carouselButtonNext.classList.add('d-none')
      return
    } else {
      carouselButtonPrev.classList.remove('d-none')
      carouselButtonNext.classList.remove('d-none')
    }

    otherImg.forEach(imageName => {
      addSlide(path + imageName.trim())
    })
  }

  function addSlide(src, isActive) {
    const activeItem = document.createElement('div')
    activeItem.classList.add('carousel-item', 'text-center')
    if (isActive) activeItem.classList.add('active')

    const img = document.createElement('img')
    img.classList.add('ki-modal-carousel-item-image')
    img.src = src

    activeItem.append(img)
    modalCarouselInner.append(activeItem)
  }

  // Закрытие модального окна
  function closeModal() {
    $('#modalCenter').modal('hide')
  }
</script>

<script src="/assets/js/mainSlider.js"></script>
<script src="/assets/js/projSlider.js"></script>
<script src="/assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
</body>

</html>