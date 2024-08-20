<div>

    <div class="">
        <div class="shadow-lg rounded-lg p-4 w-25">
            <h1 class="text-lg font-bold my-2">Data Produk</h1>
            <hr class="mb-2">
            <div class="flex text-center gap-10">
                <div class="bg-blue-400 text-white p-3 rounded-lg">
                    <p>Total Produk</p>
                    <strong>
                        {{ count($syrup) }}
                    </strong>
                </div>
                <div class="bg-blue-400 text-white p-3 rounded-lg">
                    <p>Terjual</p>
                    <strong>
                        {{ $terjual }}
                    </strong>
                </div>
                <div class="bg-blue-400 text-white p-3 rounded-lg">
                    <p>Sisa Stok</p>
                    <strong>
                        {{ $sisa }}
                    </strong>
                </div>
            </div>

        </div>
        
    </div>
    <style>
      .row > .column {
          padding: 0 8px;
      }
  
      .row::after {
          content: "";
          display: table;
          clear: both;
      }
  
      /* Create four equal columns that float next to each other */
      .column {
          float: left;
          width: 25%;
      }
  
      /* The Modal (background) */
      .modal {
          display: none;
          position: fixed;
          z-index: 1;
          padding-top: 100px;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0, 0, 0, 0.8); /* Changed background to be slightly transparent */
      }
  
      /* Modal Content */
      .modal-content {
          position: relative;
          background-color: #fefefe;
          margin: auto;
          padding: 0;
          width: 90%;
          max-width: 1200px;
      }
  
      /* The Close Button */
      .close {
          color: white;
          position: absolute;
          top: 10px;
          right: 25px;
          font-size: 35px;
          font-weight: bold;
      }
  
      .close:hover,
      .close:focus {
          color: #999;
          text-decoration: none;
          cursor: pointer;
      }
  
      /* Hide the slides by default */
      .mySlides {
          display: none;
      }
  
      /* Next & previous buttons */
      .prev,
      .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin-top: -50px;
          color: white;
          font-weight: bold;
          font-size: 20px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
          -webkit-user-select: none;
      }
  
      .next {
          right: 0;
          border-radius: 3px 0 0 3px;
      }
  
      .prev:hover,
      .next:hover {
          background-color: rgba(0, 0, 0, 0.8);
      }
  
      /* Number text (1/3 etc) */
      .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
      }
  
      /* Caption text */
      .caption-container {
          text-align: center;
          background-color: black;
          padding: 2px 16px;
          color: white;
      }
  
      img.demo {
          opacity: 0.6;
      }
  
      .active,
      .demo:hover {
          opacity: 1;
      }
  
      img.hover-shadow {
          transition: 0.3s;
      }
  
      .hover-shadow:hover {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
  </style>
  
  <div class="p-5 bg-slate-400 w-auto mt-10 text-white rounded-lg">
   <h1 class=" font-black text-3xl text-center">Galery</h1>
  </div>
  <div class="flex justify-center my-5 ">
      @foreach ($galery as $key => $poto)
          <div class="mx-1">
              <img src="{{ asset('images/galery/' . $poto) }}" onclick="openModal();currentSlide({{ $key+1 }})"
                  class="hover-shadow" style="width:100%">
          </div>
      @endforeach
  </div>
  
  <div id="myModal" class="modal">
      <span class="close cursor" onclick="closeModal()">&times;</span>
      <div class="modal-content">
          @foreach ($galery as $key => $item)
              <div class="mySlides">
                  <div class="numbertext">{{ $key+1 }} / {{ count($galery) }}</div>
                  <img src="{{ asset('images/galery/' . $item) }}" style="width:100%">
              </div>
          @endforeach
  
          <!-- Next/previous controls -->
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
          <!-- Caption text -->
          <div class="caption-container">
              <p id="caption"></p>
          </div>
  
          <!-- Thumbnail image controls -->
          <div class="flex">
              @foreach ($galery as $key => $mod)
                  <div class="column">
                      <img class="demo" src="{{ asset('images/galery/' . $mod) }}"
                          onclick="currentSlide({{ $key+1 }})" alt="{{ $mod }}" style="width:100%">
                  </div>
              @endforeach
          </div>
      </div>
  </div>
  
  <script>
      function openModal() {
          document.getElementById("myModal").style.display = "block";
      }
  
      function closeModal() {
          document.getElementById("myModal").style.display = "none";
      }
  
      var slideIndex = 1;
      showSlides(slideIndex);
  
      function plusSlides(n) {
          showSlides(slideIndex += n);
      }
  
      function currentSlide(n) {
          showSlides(slideIndex = n);
      }
  
      function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          var captionText = document.getElementById("caption");
          if (n > slides.length) {
              slideIndex = 1;
          }
          if (n < 1) {
              slideIndex = slides.length;
          }
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " active";
          captionText.innerHTML = dots[slideIndex - 1].alt;
      }
  </script>
  
</div>
