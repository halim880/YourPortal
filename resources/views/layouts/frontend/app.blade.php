<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Font-awesome --}}
    <script src="https://kit.fontawesome.com/d40aacf1b2.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("assets/style.css")}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    {{-- Jquery --}}
    <title>Yourportal</title>
  </head>
  <body>
    <!-- Header section -->
    <section>
      <nav class="navbar navbar-expand-lg shadow-sm navbar-dark fixed-top" id="mainNav">
          <div class="container">
              <a class="navbar-brand fw-bold" style="font-size: 25px;" href="#page-top"><span  style="color:rgb(255, 190, 68);">Your</span>portal</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  Menu
                  <i class="bi-list"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  @include('layouts.frontend.navbar')
              </div>
          </div>
      </nav>
  </section>
  
    <div style="height: 60px"></div>

    @yield('content')

    @include('layouts.frontend.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{(asset('js/jquery.js'))}}"></script>
  </body>
</html>

<style>
    #copyright{
        margin: 0 !important;
        background-color: rgb(14, 24, 39);
    }

    #copyright .copy-text div{
        color: rgb(125, 127, 128);
    }
</style>