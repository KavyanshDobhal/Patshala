</main>
<footer class="footer">
  <p>© <?= date('Y') ?> Patshala. Learn, Grow, Succeed.</p>
</footer>
<script src="js/app.js"></script>
<?php if (!empty($extraScript)): ?><script src="<?= e($extraScript) ?>"></script><?php endif; ?>
</body>
</html>