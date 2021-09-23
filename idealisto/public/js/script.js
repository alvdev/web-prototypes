// Set and show selected price on input type range
price.addEventListener('change', setPrice);

function setPrice() {
  const priceInput = document.querySelector('.price input');
  const priceOutput = document.querySelector('.price output');

  priceInput.setAttribute('value', priceInput.value);
  // Add formatted price value to the HTML <output> placeholder
  priceOutput.textContent = Number(price.value).toLocaleString() + '€';
}

// Fetch login page and show it at the index page
fetch('?page=login')
  .then(res => res.text())
  .then(data =>
    loginForm = data.substring(data.indexOf('<main>') + 8, data.indexOf('</main>'))
  )

loginbtn.addEventListener('click', (e) => {
  e.preventDefault();
  const loginPlace = document.querySelector('#login-form');
  loginPlace.innerHTML = loginForm;
  loginPlace.classList.toggle('show')
  loginbtn.classList.toggle('close');
})
