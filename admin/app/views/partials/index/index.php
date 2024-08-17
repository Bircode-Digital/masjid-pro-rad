        <?php 
        $page_id = null;
        $comp_model = new SharedController;
        ?>
        <!-- <div  class=" py-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        
                        <div  class="bg-light p-3 animated fadeIn page-content">
                            <div>
                                <h4><i class="material-icons">lock_open</i> User Login</h4>
                                <hr />
                                <?php 
                                $this :: display_page_errors(); 
                                ?>
                                <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                                    <div class="input-group form-group">
                                        <input placeholder="Username Or Email" name="username"  required="required" class="form-control" type="text"  />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="form-control-feedback material-icons">account_circle</i></span>
                                        </div>
                                    </div>
                                    <div class="input-group form-group">
                                        <input  placeholder="Password" required="required" v-model="user.password" name="password" class="form-control " type="password" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="form-control-feedback material-icons">lock</i></span>
                                        </div>
                                    </div>
                                    <div class="row clearfix mt-3 mb-3">
                                        <div class="col-6">
                                            <label class="">
                                                <input value="true" type="checkbox" name="rememberme" />
                                                Remember Me
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Reset Password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary btn-block btn-md" type="submit"> 
                                            <i class="load-indicator">
                                                <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                            </i>
                                            Login <i class="material-icons">lock_open</i>
                                        </button>
                                    </div>
                                    <hr />
                                    <div class="text-center">
                                        Don't Have an Account? <a href="<?php print_link("index/register") ?>" class="btn btn-success">Register
                                        <i class="material-icons">account_box</i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<div class="app-container">
    <div class="hero-section">
        <div class="header">
            <h1>Masjid Pro</h1>
            <div class="header-icons">
                <div class="search-container" id="searchContainer">
                    <input type="text" class="search-input" placeholder="Cari...">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="white" onclick="toggleSearch()">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                    </svg>
                </div>
                <svg class="settings-icon" viewBox="0 0 24 24" fill="white">
                    <path d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58c.18-.14.23-.41.12-.61l-1.92-3.32c-.12-.22-.37-.29-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54c-.04-.24-.24-.41-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58c-.18.14-.23.41-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6 3.6 1.62 3.6 3.6-1.62 3.6-3.6 3.6z"></path>
                </svg>
            </div>
        </div>
        <div class="hero-content">
            <div class="hero-time">
                <span id="currentTime">16:01</span>
                <span class="hero-seconds" id="currentSeconds">00</span>
            </div>
            <div class="hero-prayer">Asar • Jm:16:01</div>
            <div class="hero-location">Kabupaten Brebes, Kecamatan Jatibarang</div>
            <div class="hero-date">28 Muharram 1445 H • Rabu, 4 Agt 2024</div>
        </div>
    </div>
    <div class="prayer-times">
        <div class="prayer-time">
            <div class="prayer-name">Subuh</div>
            <div class="prayer-hour">05:10</div>
        </div>
        <div class="prayer-time">
            <div class="prayer-name">Dzuhur</div>
            <div class="prayer-hour">12:42</div>
        </div>
        <div class="prayer-time">
            <div class="prayer-name">Asar</div>
            <div class="prayer-hour">16:01</div>
        </div>
        <div class="prayer-time">
            <div class="prayer-name">Maghrib</div>
            <div class="prayer-hour">18:36</div>
        </div>
        <div class="prayer-time">
            <div class="prayer-name">Isya</div>
            <div class="prayer-hour">19:47</div>
        </div>
    </div>
    <div class="feature-grid">
        <div class="feature-item">
            <div class="feature-icon" style="background: linear-gradient(135deg, #0C4B33, #1A936F);">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="white">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path>
                </svg>
            </div>
            <div class="feature-name">Al-Qur'an</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon" style="background: linear-gradient(135deg, #0C4B33, #1A936F);">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="white">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
                </svg>
            </div>
            <div class="feature-name">Info Masjid</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon" style="background: linear-gradient(135deg, #0C4B33, #1A936F);">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="white">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>
                </svg>
            </div>
            <div class="feature-name">Kendeng</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon" style="background: linear-gradient(135deg, #0C4B33, #1A936F);">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="white">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"></path>
                </svg>
            </div>
            <div class="feature-name">Lainnya</div>
        </div>
    </div>
    <div class="banner-container">
        <div class="banner-scroll">
            <div class="banner">
                <img alt="Punya tetangga yang memerlukan bantuan kesehatan? Mari kita bantu bersama!" src="https://masjidpro.com/health-aid-banner.jpg" width="370" height="100">
            </div>
            <div class="banner">
                <img alt="Sedekah untuk anak yatim - Mari berbagi kebahagiaan" src="https://masjidpro.com/orphan-donation-banner.jpg" width="370" height="100">
            </div>
        </div>
    </div>
    
    <div class="recommendations">
        <div class="recommendation-header">
            <h2 class="recommendation-title">Rekomendasi untukmu</h2>
            <a href="#" class="see-all">Selengkapnya</a>
        </div>
        <div class="recommendation-tabs">
            <div class="tab active">Semua</div>
            <div class="tab">Event</div>
            <div class="tab">Fiqih</div>
            <div class="tab">Tadabbur</div>
            <div class="tab">Reminder</div>
        </div>
        <div class="recommendation-card">
            <div class="recommendation-content">
                <img src="https://masjidpro.com/doa-image.jpg" alt="Seorang pria muslim membawa koper dan tas perjalanan" class="recommendation-image">
                <div class="recommendation-info">
                    <h3 class="recommendation-name">Doa Setelah Bepergian</h3>
                    <p class="recommendation-description">Setiap kali kita pulang dari bepergian, baik itu perjalanan bisnis, liburan, atau kunjungan keluarga, ada rasa lega...</p>
                    <div class="recommendation-meta">
                        <div class="recommendation-likes">
                            <svg class="like-icon" viewBox="0 0 24 24" fill="#666">
                                <path d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z"></path>
                            </svg>
                            0
                        </div>
                        <div class="recommendation-time">Baru saja</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loginModal" class="modal">
    <div class="modal-content">
    <span class="close" onclick="closeLoginModal()">×</span>
    <div class="login-illustration" style="display: flex; justify-content: center; align-items: center;">
    <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="100" cy="100" r="90" fill="#F0F4F8"></circle>
        <path d="M100 120C116.569 120 130 106.569 130 90C130 73.4315 116.569 60 100 60C83.4315 60 70 73.4315 70 90C70 106.569 83.4315 120 100 120Z" fill="#0C4B33"></path>
        <path d="M155 160C155 137.909 130.376 120 100 120C69.6243 120 45 137.909 45 160" stroke="#0C4B33" stroke-width="10" stroke-linecap="round"></path>
    </svg>
</div>
    <h2>Login</h2>
    <form class="login-form" onsubmit="return login(event)">
        <div class="form-group">
            <input type="text" id="username" placeholder="Username" required="" style="width: 100%; box-sizing: border-box; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
        </div>
        <div class="form-group">
            <input type="password" id="password" placeholder="Password" required="" style="width: 100%; box-sizing: border-box; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
        </div>
        <div class="form-group">
            <button type="submit" style="width: 100%; padding: 15px; background-color: var(--primary-color); color: white; border: none; border-radius: 8px; font-size: 18px; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='var(--secondary-color)'" onmouseout="this.style.backgroundColor='var(--primary-color)'">Login</button>
        </div>
    </form>
</div>
</div>





        