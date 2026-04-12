<footer class="footer">
    <div class="ft-top">
      <div class="ft-brand">
        <span class="logo logo--img">
          <img src="assets/backgroud_picture/logo-ym.png" alt="" width="160" height="64" decoding="async" loading="lazy"/>
          <div class="logo-txt">YM<span>SUCCESS</span></div>
        </span>
        <p>A focused web | system development based in Malaysia. We build and redesign websites that look great and perform even better.</p>
      </div>
      <div class="ft-col">
        <h5>PACKAGES</h5>
        <ul>
          <li><a href="index.php#packages">Starter</a></li>
          <li><a href="index.php#packages">Growth</a></li>
          <li><a href="index.php#packages">Elite</a></li>
          <li><a href="index.php#packages">Redesign Plans</a></li>
        </ul>
      </div>
      <div class="ft-col">
        <h5>SERVICES</h5>
        <ul>
          <li><a href="index.php#services">New Website</a></li>
          <li><a href="index.php#services">Website Redesign</a></li>
          <li><a href="index.php#services">UI/UX Design</a></li>
          <li><a href="index.php#services">SEO</a></li>
          <li><a href="index.php#services">Maintenance</a></li>
        </ul>
      </div>
      <div class="ft-col">
        <h5>CONTACT</h5>
        <ul>
          <li><a href="mailto:info@ymsuccess.com">info@ymsuccess.com</a></li>
          <li><a href="https://wa.me/60174776935" target="_blank" rel="noopener noreferrer">+60 17-477 6935</a></li>
          <li><a href="">Taman Pandan Mewah, <br> Ampang, Selangor</a></li>
        </ul>
      </div>
    </div>
    <div class="ft-bottom">
    <span id="secretAccess">Copyright © 2026 YMSUCCESS. All Rights Reserved.</span>      <!-- <div class="social-row">
        <a href="#">Instagram</a>
        <a href="#">LinkedIn</a>
        <a href="#">Facebook</a>
        <a href="#">WhatsApp</a>
      </div> -->
    </div>
  </footer>
  <script>
let clickCount = 0;
let timer;

const secret = document.getElementById('secretAccess');

secret.addEventListener('click', () => {
  clickCount++;

  clearTimeout(timer);
  timer = setTimeout(() => {
    clickCount = 0;
  }, 1500); // reset kalau lambat

  if (clickCount === 3) {
    window.location.href = '/invoice-generate';
  }
});
</script>