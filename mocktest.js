(function () {
  // Each question: t = text, o = options, a = index of the correct option
  var BANK = {
    general: { title: 'General', q: [
      { t: 'What is the capital of India?', o: ['Mumbai', 'New Delhi', 'Kolkata'], a: 1 },
      { t: 'What is 2 + 2?', o: ['3', '5', '4'], a: 2 },
      { t: 'Which planet is known as the Red Planet?', o: ['Mars', 'Venus', 'Jupiter'], a: 0 }
    ]},
    gate: { title: 'GATE', q: [
      { t: 'What is the SI unit of electric current?', o: ['Volt', 'Ampere', 'Ohm'], a: 1 },
      { t: 'Which law states that current through a conductor is directly proportional to the voltage across it?', o: ["Faraday's Law", "Newton's Law", "Ohm's Law"], a: 2 },
      { t: 'What is the derivative of sin(x)?', o: ['-sin(x)', '-cos(x)', 'cos(x)'], a: 2 },
      { t: 'What is the standard value of gravitational acceleration on Earth?', o: ['9.8 m/s²', '10 m/s²', '8.9 m/s²'], a: 0 },
      { t: 'Which material is commonly used as a semiconductor?', o: ['Copper', 'Silicon', 'Aluminium'], a: 1 }
    ]},
    neet: { title: 'NEET', q: [
      { t: 'What is the chemical formula of water?', o: ['CO2', 'O2', 'H2O'], a: 2 },
      { t: 'Which organ in the human body pumps blood?', o: ['Heart', 'Liver', 'Kidney'], a: 0 },
      { t: 'What is the process by which plants make their food?', o: ['Respiration', 'Photosynthesis', 'Transpiration'], a: 1 },
      { t: 'Which vitamin is produced when skin is exposed to sunlight?', o: ['Vitamin C', 'Vitamin A', 'Vitamin D'], a: 2 },
      { t: 'What is the basic unit of life?', o: ['Atom', 'Cell', 'Molecule'], a: 1 }
    ]}
  };

  var chips = document.getElementById('chips');
  var quiz = document.getElementById('quiz');
  var bestEl = document.getElementById('best');
  var current = 'general';

  function safeGet(k) { try { return localStorage.getItem(k); } catch (e) { return null; } }
  function safeSet(k, v) { try { localStorage.setItem(k, v); } catch (e) {} }

  var param = new URLSearchParams(location.search).get('exam');
  if (param && BANK[param]) current = param;

  function esc(s) { var d = document.createElement('div'); d.textContent = s; return d.innerHTML; }

  function renderChips() {
    chips.innerHTML = '';
    Object.keys(BANK).forEach(function (key) {
      var b = document.createElement('button');
      b.type = 'button';
      b.className = 'chip';
      b.textContent = BANK[key].title;
      b.setAttribute('aria-pressed', key === current ? 'true' : 'false');
      b.addEventListener('click', function () {
        current = key;
        history.replaceState(null, '', '?exam=' + key);
        renderChips(); renderQuiz();
      });
      chips.appendChild(b);
    });
  }

  function showBest() {
    var best = safeGet('ss_best_' + current);
    bestEl.textContent = best !== null ? 'Your best score here: ' + best + ' / ' + BANK[current].q.length : '';
  }

  function renderQuiz() {
    var qs = BANK[current].q;
    var html = '';
    qs.forEach(function (q, i) {
      html += '<fieldset class="q" style="border:1px solid var(--line)"><legend class="sr" style="position:absolute;left:-999px">Question ' + (i + 1) + '</legend><h4>' + (i + 1) + '. ' + esc(q.t) + '</h4>';
      q.o.forEach(function (opt, j) {
        html += '<label class="opt"><input type="radio" name="q' + i + '" value="' + j + '"> <span>' + esc(opt) + '</span></label>';
      });
      html += '</fieldset>';
    });
    html += '<p id="msg" class="center" role="alert" style="color:var(--bad);min-height:1.5rem"></p>';
    html += '<div class="btn-row center"><button class="btn" type="submit">Submit</button></div>';
    html += '<div id="result"></div>';
    quiz.innerHTML = html;
    showBest();
  }

  quiz.addEventListener('submit', function (ev) {
    ev.preventDefault();
    var qs = BANK[current].q, score = 0, missing = [];
    qs.forEach(function (q, i) {
      var picked = quiz.querySelector('input[name="q' + i + '"]:checked');
      if (!picked) missing.push(i + 1);
    });
    var msg = document.getElementById('msg');
    if (missing.length) { msg.textContent = 'Please answer question(s): ' + missing.join(', '); return; }
    msg.textContent = '';

    qs.forEach(function (q, i) {
      var picked = +quiz.querySelector('input[name="q' + i + '"]:checked').value;
      var labels = quiz.querySelectorAll('input[name="q' + i + '"]');
      if (picked === q.a) score++;
      labels.forEach(function (inp, j) {
        var lab = inp.closest('.opt');
        lab.classList.remove('correct', 'wrong');
        if (j === q.a) lab.classList.add('correct');
        else if (j === picked) lab.classList.add('wrong');
        inp.disabled = true;
      });
    });

    var prev = safeGet('ss_best_' + current);
    if (prev === null || score > +prev) safeSet('ss_best_' + current, score);
    showBest();

    var res = document.getElementById('result');
    res.innerHTML = '<p class="score">Your score: ' + score + ' / ' + qs.length + '</p>' +
      '<div class="btn-row center"><button class="btn btn-ghost" type="button" id="retry">Try again</button></div>';
    quiz.querySelector('button[type="submit"]').hidden = true;
    res.scrollIntoView({ behavior: 'smooth', block: 'center' });
    document.getElementById('retry').addEventListener('click', function () {
      renderQuiz(); window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  });

  renderChips();
  renderQuiz();
})();