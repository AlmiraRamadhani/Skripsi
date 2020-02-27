<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:100%">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="home">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Barang Yang Tersedia</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">1 set Main Frame ukuran 1,9</div>
        <img rc="<?= base_url('assets/'); ?>img/product/1.png" s style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">1 set Main Frame ukuran 1,7</div>
        <img src="/assets/img/product/2.jpg" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Leader 0,9 <b>dengan</b> Join Pin</div>
        <img src="/w3images/house3.jpg" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Leader 0,9 <b>tanpa</b> Join Pin</div>
        <img src="/w3images/house4.jpg" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Jack Base 60cm</div>
        <img src="/w3images/house4.jpg" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">U head Jack 60cm</div>
        <img src="/w3images/house4.jpg" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Cat Walk</div>
        <img src="/w3images/house4.jpg" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Roda 1 set (4pcs)</div>
        <img src="/w3images/house2.jpg" style="width:99%">
      </div>
    </div>
  </div>
  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Tangga</div>
        <img src="/w3images/house5.jpg" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Pipa Support</div>
        <img src="/w3images/house4.jpg" style="width:99%">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="w3-container w3-padding-32" id="about">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
        <p>Penyewaan Scaffolding Samarinda Terletak di Samarinda Kalimantan Timur. <br>
          Penyewaan kami buka pada hari Senin,Selasa,Rabu,Sabtu pukul 08.00-14.00 WITA, <br>Kamis pukul 08.00-12.00 WITA, <br>dan libur pada hari Jum'at dan Minggu.
        </p>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="w3-row-padding w3-grayscale">
        <div class="w3-col l3 m6 w3-margin-bottom">
          <img src="/w3images/team2.jpg" alt="Sumeru" style="width:100%">
          <h3>Sumeru Syahdaini</h3>
          <p class="w3-opacity">CEO & Founder</p>
          <p>Pemilik Usaha Penyewaan Scaffolding Samarinda</p>
          <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
    <p>Lets get in touch and talk about your next project.</p>
    <form action="<?= base_url('user/add'); ?>" method="post">
      <input class="w3-input w3-border" type="text" placeholder="Name" required name="nama">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="email">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="subject">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="comment">
      <button class="w3-button w3-black w3-section" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  </div>
  <!-- End page content -->
</div>