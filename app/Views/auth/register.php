<?php

use App\Controllers\Auth;

?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
      <div class="container mt-5 col-5">
          <div class="card">
              <div class="card-header bg-dark text-white text-center">
                  REGISTER
              </div>
              <div class="card-body">
                  <form action="/save-register" method="POST">
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
                          <div class="alert alert-success" role="alert">
                              <?= session()->getFlashdata('pesan'); ?>
                          </div>
                      <?php endif ?>
                      <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" name="user_name" class="form-control" id="username" placeholder="Masukkan username..." autofocus value="<?= old('user_name'); ?>">
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" name="user_email" class="form-control" id="email" placeholder="Masukkan email..." value="<?= old('user_email'); ?>">
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="user_password" class="form-control" id="password" placeholder="Masukkan password..." value="<?= old('user_password'); ?>">
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Ulangi Password</label>
                          <input type="password" name="retype_password" class="form-control" id="password" placeholder="Masukkan ulang password..." value="<?= old('retype_password'); ?>">
                      </div>
                      <div class="mb-3">
                          <a href="/login">Login disini</a>
                      </div>
                      <div class="mb-2">
                          <input type="submit" name="register" class="btn btn-primary" value="Register">
                      </div>
                  </form>
              </div>
          </div>
      </div>
<?= $this->endSection(); ?>