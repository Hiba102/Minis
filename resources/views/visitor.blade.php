<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />
    <style>
        body::before {
  display: block;
  content: '';
  height: 60px;
}

#map {
  width: 100%;
  height: 100%;
  border-radius: 10px;
}

@media (min-width: 768px) {
  .news-input {
    width: 50%;
  }
}
    </style>
    <title>Minis</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
      <div class="container">
        <a href="#" class="navbar-brand">Minis</a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="{{route('login')}}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
              <a href="{{route('register')}}" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
              <a href="#questions" class="nav-link">FAQ</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   <!-- Showcase -->
   <section
      class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start"
    >
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Improve your language by<span class="text-warning"> writing </span> every day!</h1>
            <p class="lead my-4">
            “Writing is the painting of the voice” - Voltaire
            </p>
      
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="img/showcase.svg"
            alt=""
          />
        </div>
      </div>
    </section>


    <!-- Learn Sections -->
    <section id="learn" class="p-5">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md">
            <img src="{{asset('image/learn1.jpg')}}" class="img-fluid" alt="" />
          </div>
          <div class="col-md p-5">
            <h2>Write Write Write ... </h2>
            <p class="lead">
            Believe it or not, consistent writing practice when learning a foreign language can also help your speaking skills. You're probably wondering how that works. When you learn how to write in a foreign language, it's typically in an academic setting like in a language course. You focus on all of the grammar rules and the appropriate words to use depending on the context. The skills you develop to become a great writer in your target language can give you argumentative skills. That can actually help you verbally communicate better in the target language.
            </p>
      
            </div>
        </div>
      </div>
    </section>

    <section id="learn" class="p-5 bg-dark text-light">
      <div class="container">
        <div class="row align-items-center justify-content-between">
                 <div class="col-md p-5">
            <h2>Why writing?</h2>
            <p class="lead">
            Writing practice helps you think and speak in the foreign language. As you continue practicing, you are able to quickly form new thoughts in the other language. The practice eventually leads to proficiency in the language because you have developed a deeper understanding of it.
            </p>
      
     
          </div>
          <div class="col-md">
            <img src="{{asset('image/learn2.jpg')}}" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>



    <!-- Question Accordion -->
    <section id="questions" class="p-5">
      <div class="container">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
        <div class="accordion accordion-flush" id="questions">
          <!-- Item 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#question-one"
              >
                What is Minis?
              </button>
            </h2>
            <div
              id="question-one"
              class="accordion-collapse collapse"
              data-bs-parent="#questions"
            >
              <div class="accordion-body">
                Minis is a website that you can use to practice writing. Each "mini" is similiar to a blog post but you can only write 500 letters maximum. You can practice writing everyday when you are trying to learn a new language or simply to improve writing in your mother language.
                You can also read other users' minis.
              </div>
            </div>
          </div>
          <!-- Item 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#question-two"
              >
                How much does it cost to use Minis?
              </button>
            </h2>
            <div
              id="question-two"
              class="accordion-collapse collapse"
              data-bs-parent="#questions"
            >
              <div class="accordion-body">
                Minis is FREE. but you need to register first to use it.
              </div>
            </div>
          </div>
          <!-- Item 3 -->
     
          <!-- Item 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#question-four"
              >
                How Do I sign up?
              </button>
            </h2>
            <div
              id="question-four"
              class="accordion-collapse collapse"
              data-bs-parent="#questions"
            >
              <div class="accordion-body">
                Click on "Register". you can find it at the top of this page.
              </div>
            </div>
          </div>
          <!-- Item 5 -->
   
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy; 2023 Minis</p>

        <a href="#" class="position-absolute bottom-0 end-0 p-5">
          <i class="bi bi-arrow-up-circle h1"></i>
        </a>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>

</body>
</html>