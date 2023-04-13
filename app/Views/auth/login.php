<?php

use App\Controllers\Auth;

?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
      <div class="container mt-5 col-5">
          <div class="card">
              <div class="card-header bg-dark text-white text-center">
                  LOGIN
              </div>
              <div class="card-body">
                  <form action="/cek-login" method="POST">
                      <?php
                      $errors = session()->getFlashdata('errors');
                      if (! empty($errors)): ?>
                          <div class="alert alert-danger" role="alert">
                              <ul>
                              <?php foreach ($errors as $error): ?>
                                  <li><?= esc($error) ?></li>
                              <?php endforeach ?>
                              </ul>
                          </div>
                      <?php endif ?>
                      <?php 
                      if(session()->getFlashdata('pesan')): ?>
                          <div class="alert alert-danger" role="alert">
                              <?= session()->getFlashdata('pesan'); ?>
                          </div>
                      <?php endif ?>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" name="user_email" class="form-control" id="email" placeholder="Masukkan email..." autofocus value="<?= old('user_email'); ?>">
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="user_password" class="form-control" id="password" placeholder="Masukkan password..." value="<?= old('user_password'); ?>">
                      </div>
                      <div class="mb-3">
                          <a href="/register">Register disini</a>
                      </div>
                      <div class="mb-2">
                          <input type="submit" name="login" class="btn btn-primary" value="Login">
                      </div>
                  </form>
              </div>
          </div>
      </div>
<?= $this->endSection(); ?>