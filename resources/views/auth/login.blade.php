    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('log/assets/style.css') }}" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
            <form method="POST"  class="sign-in-form" action="{{ route('login') }}">
                @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="email"  class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            @error('email')
            <div class="alert">
                <h5>{{ $message }}</h5>
            </div>
        @enderror
            <button type="submit" class="btn solid">Login</button>

          </form>

          <form method="POST" action="{{ route('register') }}" class="sign-up-form">
            @csrf
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Name" name="name"/>
             </div>

             <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
            </div>


            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
            </div>

            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Input Password Again"  name="password_confirmation" required autocomplete="new-password"/>
              </div>
            <input type="submit" class="btn" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="{{ asset('log/assets/img/log.svg') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="{{ asset('log/assets/img/register.svg') }}" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{ asset('log/assets/app.js') }}"></script>
  </body>
</html>
