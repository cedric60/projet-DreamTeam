/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global password2 */

var password = document.getElementById("password")
  , confirm_password = document.getElementById("password2");

function validatePassword(){
  if(password.value !== password2.value) {
    password2.setCustomValidity("Le mot de passe ne correspond pas ");
  } else {
    password2.setCustomValidity('');
  }
}

password.onchange = validatePassword;
password2.onkeyup = validatePassword;
