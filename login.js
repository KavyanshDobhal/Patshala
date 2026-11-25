(function () {
  var forms = { signin: document.getElementById('signin'), signup: document.getElementById('signup') };
  var tabs  = { signin: document.getElementById('tab-signin'), signup: document.getElementById('tab-signup') };

  function show(name) {
    Object.keys(forms).forEach(function (k) {
      forms[k].hidden = (k !== name);
      tabs[k].setAttribute('aria-selected', k === name ? 'true' : 'false');
    });
    var first = forms[name].querySelector('input');
    if (first) first.focus();
  }

  tabs.signin.addEventListener('click', function () { show('signin'); });
  tabs.signup.addEventListener('click', function () { show('signup'); });
  document.querySelectorAll('[data-go]').forEach(function (b) {
    b.addEventListener('click', function () { show(b.getAttribute('data-go')); });
  });

  document.querySelectorAll('.show').forEach(function (b) {
    b.addEventListener('click', function () {
      var input = document.getElementById(b.getAttribute('data-target'));
      var hidden = input.type === 'password';
      input.type = hidden ? 'text' : 'password';
      b.textContent = hidden ? 'Hide' : 'Show';
      b.setAttribute('aria-label', hidden ? 'Hide password' : 'Show password');
    });
  });
})();