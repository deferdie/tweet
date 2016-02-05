@extends('master-font')
 <section id="registration-page" class="container">
    <form class="center" action='/auth/register' method="POST">
      <fieldset class="registration-form">
        <div class="control-group">
          <!-- Username -->
          <div class="controls">
            <input type="text" name="name" class="input-xlarge" value="{{ old('name') }}" placeholder="Your Name">
          </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <div class="controls">
            <input type="email" name="email" value="{{ old('email') }}" class="input-xlarge" placeholder="Your Email. (We do not spam. :)">
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="Password" class="input-xlarge">
          </div>
        </div>

        <div class="control-group">
          <!-- Password -->
          <div class="controls">
            <input type="password" id="password_confirm" name="password_confirmation" placeholder="Password (Confirm)" class="input-xlarge">
          </div>
        </div>

        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success btn-large btn-block">Register</button>
          </div>
        </div>
      </fieldset>
    </form>
  </section>
