<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Phonebook App</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>

    <div id="app">
      <Navbar></Navbar>
      <router-view></router-view>
      <app-footer></app-footer>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>
