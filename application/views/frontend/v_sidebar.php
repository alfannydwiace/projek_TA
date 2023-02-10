<div class="page-head-blog">
  <div class="single-blog-page">
    <!-- search option start -->

    <?php echo form_open(base_url().'search'); ?>
    <div class="search-option">

      <input type="text" name="cari" placeholder="Search..." aria-label="Search for...">
      <button class="button" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </form>

  <!-- search option end -->
</div>

<div class="single-blog-page">
  <!-- recent start -->
  <div class="left-blog">
    <h4>recent post</h4>
    <div class="recent-post">

      <?php 
      $artikel = $this->db->query("SELECT * FROM artikel,pengguna,kategori WHERE artikel_status='publish' AND artikel_author=pengguna_id AND artikel_kategori=kategori_id ORDER BY artikel_id DESC LIMIT 4")->result();
      foreach($artikel as $a){
        ?>
        <!-- start single post -->
        <div class="recent-single-post">
          <div class="post-img">
            <a href="<?php echo base_url().$a->artikel_slug; ?>">
              <?php if($a->artikel_sampul != ""){ ?>
                <img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="<?php echo $a->artikel_judul ?>">
              <?php } ?>
            </a>
          </div>
          <div class="pst-content">
            <p><a href="<?php echo base_url().$a->artikel_slug; ?>"><?php echo $a->artikel_judul; ?></a></p>
          </div>
        </div>
        <!-- End single post -->

        <?php
      }
      ?>

    </div>
  </div>
  <!-- recent end -->
</div>
<div class="single-blog-page">
  <div class="left-blog">
    <h4>Kategori</h4>
    <ul>

      <?php 
      $kategori = $this->m_data->get_data('kategori')->result();
      foreach($kategori as $k){
        ?>
        <li>
          <a href="<?php echo base_url().'kategori/'.$k->kategori_slug; ?>"><?php echo $k->kategori_nama; ?></a>
        </li>
        <?php
      }
      ?>

    </ul>
  </div>
</div>
<div class="single-blog-page">
  <div class="left-blog">
    <h4>Halaman</h4>
    <ul>
      <?php 
      $halaman = $this->m_data->get_data('halaman')->result();
      foreach($halaman as $h){
        ?>
        <li>
          <a href="<?php echo base_url().'page/'.$h->halaman_slug; ?>"><?php echo $h->halaman_judul; ?></a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
</div>

<!-- <div class="single-blog-page">
  <div class="left-tags blog-tags">
    <div class="popular-tag left-side-tags left-blog">
      <h4>popular tags</h4>
      <ul>
        <li>
          <a href="#">Portfolio</a>
        </li>
        <li>
          <a href="#">Project</a>
        </li>
        <li>
          <a href="#">Design</a>
        </li>
        <li>
          <a href="#">Website</a>
        </li>
        <li>
          <a href="#">Joomla</a>
        </li>
        <li>
          <a href="#">Html</a>
        </li>
        <li>
          <a href="#">wordpress</a>
        </li>
        <li>
          <a href="#">Masonry</a>
        </li>
      </ul>
    </div>
  </div>
</div> -->

</div>