<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of {{ $settings->bride_name ?? 'Arin' }} & {{ $settings->groom_name ?? 'Andrian' }}</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&family=Great+Vibes&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Cover Section -->
    <div id="cover" class="cover-wrapper">
        <div class="cover-left" style="background-image: url('{{ $settings && $settings->desktop_bg_image ? asset($settings->desktop_bg_image) : 'https://hi.rumahundangan.in/wp-content/uploads/2025/11/VINTAGE-06.webp' }}');">
            <div class="desktop-quote" data-aos="zoom-in-up">
                <p>"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya..."</p>
                <p><strong>(Qs. Ar. Rum (30) : 21)</strong></p>
            </div>
        </div>
        <div class="cover-right" style="background-image: url('{{ $settings && $settings->cover_image ? asset($settings->cover_image) : 'https://hi.rumahundangan.in/wp-content/uploads/2025/08/VINTAGE-54.webp' }}');">
            <div class="cover-overlay"></div>
            <div class="cover-content">
                <h3 data-aos="zoom-in-up">The Wedding of</h3>
                <h1 class="couple-name" data-aos="zoom-in-up" data-aos-delay="200">
                    {{ $settings->bride_name ?? 'Arin' }}<br>
                    <span style="display: block; font-size: 0.7em; margin: 5px 0;">&</span>
                    {{ $settings->groom_name ?? 'Andrian' }}
                </h1>
                <p data-aos="zoom-in-up" data-aos-delay="400">Dear</p>
                <h2 class="recipient-name" data-aos="zoom-in-up" data-aos-delay="600">{{ $recipient }}</h2>
                <button id="open-btn" class="btn-open" data-aos="zoom-in-up" data-aos-delay="800">
                    Buka Undangan
                </button>
            </div>
        </div>
    </div>

    <div id="main-content" style="display: none;">
        <!-- Hero Section with Video Background -->
        <section class="hero-section" id="hero">
            <div class="video-overlay"></div>
            <video autoplay loop muted playsinline id="bg-video">
                <source src="{{ $settings && $settings->bg_video ? asset($settings->bg_video) : 'https://inv.rumahundangan.in/wp-content/uploads/2025/10/PREMIUM-VINTAGE-10.mp4' }}" type="video/mp4">
            </video>
            <div class="hero-content text-center">
                <h3 data-aos="zoom-in-up" data-aos-duration="1500">The Wedding of</h3>
                <h1 class="couple-name lg" data-aos="zoom-in-up" data-aos-duration="2000">
                    {{ $settings->bride_name ?? 'Arin' }}<br>
                    <span style="display: block; font-size: 0.7em; margin: 5px 0; line-height: 1;">&</span>
                    {{ $settings->groom_name ?? 'Andrian' }}
                </h1>
                <h3 data-aos="zoom-in-up" data-aos-duration="1500">{{ $settings->wedding_date ?? '07 . 06 . 2026' }}</h3>
            </div>
        </section>

        <!-- Quote Section -->
        <section class="quote-section text-center section-padding" id="quote">
            <div class="container" data-aos="zoom-in-up">
                <p class="quote-text">
                    "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir"
                </p>
                <p class="quote-source"><strong>(Qs. Ar. Rum (30) : 21)</strong></p>
            </div>
        </section>

        <!-- Couple Profile Section -->
        <section class="couple-section section-padding" id="couple">
            <div class="container text-center">
                <h2 class="section-title" data-aos="zoom-in-up">Mempelai</h2>
                <div class="couple-wrapper">
                    <!-- Groom -->
                    <div class="couple-box" data-aos="zoom-in-up">
                        <img src="{{ asset('images/flower.svg') }}" alt="flower" class="flower-decoration flower-left">
                        <img src="{{ asset('images/flower.svg') }}" alt="flower" class="flower-decoration flower-right">
                        <div class="couple-img-wrapper custom-frame">
                            <img src="{{ $settings && $settings->groom_image ? asset($settings->groom_image) : 'https://hi.rumahundangan.in/wp-content/uploads/2025/08/VINTAGE-54.webp' }}" alt="Groom" class="couple-img">
                        </div>
                        <h2 class="couple-name-small">{{ $settings->groom_name ?? 'Candra' }}</h2>
                        <p class="couple-fullname"><strong>{{ $settings->groom_fullname ?? 'Candra Wijaya, S.T.' }}</strong></p>
                        <p class="parents">{{ $settings->groom_parents ?? 'Putra dari Bapak Fulan & Ibu Fulanah' }}</p>
                    </div>
                    
                    <h1 class="and-text" data-aos="zoom-in-up">&</h1>
                    
                    <!-- Bride -->
                    <div class="couple-box" data-aos="zoom-in-up">
                        <img src="{{ asset('images/flower.svg') }}" alt="flower" class="flower-decoration flower-left">
                        <img src="{{ asset('images/flower.svg') }}" alt="flower" class="flower-decoration flower-right">
                        <div class="couple-img-wrapper custom-frame">
                            <img src="{{ $settings && $settings->bride_image ? asset($settings->bride_image) : 'https://hi.rumahundangan.in/wp-content/uploads/2025/08/VINTAGE-32.webp' }}" alt="Bride" class="couple-img">
                        </div>
                        <h2 class="couple-name-small">{{ $settings->bride_name ?? 'Anisa' }}</h2>
                        <p class="couple-fullname"><strong>{{ $settings->bride_fullname ?? 'Anisa Putri, S.E.' }}</strong></p>
                        <p class="parents">{{ $settings->bride_parents ?? 'Putri dari Bapak Fulan & Ibu Fulanah' }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Event Details Section -->
        <section class="event-section section-padding text-center" id="event">
            <div class="container">
                <h2 class="section-title" data-aos="zoom-in-up">Jadwal Acara</h2>
                
                <div class="event-card" data-aos="zoom-in-up" data-aos-delay="200">
                    <img src="{{ asset('images/flower.svg') }}" alt="flower" class="flower-decoration flower-left">
                    <img src="{{ asset('images/flower.svg') }}" alt="flower" class="flower-decoration flower-right">
                    <h3 class="event-title">Akad Nikah</h3>
                    <p class="event-date">{{ $settings->akad_date ?? 'Minggu, 07 Juni 2026' }}</p>
                    <p class="event-time">{{ $settings->akad_time ?? '08.00 WIB - Selesai' }}</p>
                </div>
                
                <div class="event-card" data-aos="zoom-in-up" data-aos-delay="400">
                    <img src="{{ asset('images/flower.svg') }}" alt="flower" class="flower-decoration flower-left">
                    <img src="{{ asset('images/flower.svg') }}" alt="flower" class="flower-decoration flower-right">
                    <h3 class="event-title">Resepsi</h3>
                    <p class="event-date">{{ $settings->resepsi_date ?? 'Minggu, 07 Juni 2026' }}</p>
                    <p class="event-time">{{ $settings->resepsi_time ?? '11.00 - 14.00 WIB' }}</p>
                    <p class="event-location">{!! nl2br(e($settings->resepsi_location ?? "Gedung Serbaguna\nJl. Contoh Alamat No. 123, Kota Bandung")) !!}</p>
                    @if($settings && $settings->location_link)
                        <a href="{{ $settings->location_link }}" target="_blank" class="btn-map">Lihat Lokasi</a>
                    @else
                        <a href="#" class="btn-map">Lihat Lokasi</a>
                    @endif
                </div>
            </div>
        </section>

        @php
            $youtubeUrl = $settings ? $settings->youtube_link : null;
            $embedUrl = null;
            if ($youtubeUrl) {
                $embedUrl = $youtubeUrl;
                if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=|shorts\/))([\w-]{11})/', $youtubeUrl, $matches)) {
                    $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                }
            }
        @endphp

        @if($embedUrl)
        <!-- Video Momen Section -->
        <section class="video-momen-section section-padding text-center" id="video-momen">
            <div class="container">
                <h2 class="section-title" data-aos="zoom-in-up">Video Momen</h2>
                <div class="video-wrapper" data-aos="zoom-in-up" data-aos-delay="200" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: 2px solid rgba(255, 255, 255, 0.3);">
                    <iframe src="{{ $embedUrl }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        @endif

        @if(isset($galleries) && $galleries->count() > 0)
        <!-- Gallery Section -->
        <section class="gallery-section section-padding text-center" id="gallery">
            <div class="container">
                <h2 class="section-title" data-aos="zoom-in-up">Galeri Momen</h2>
                <div class="gallery-grid" data-aos="zoom-in-up" data-aos-delay="200">
                    @foreach($galleries as $gallery)
                        <div class="gallery-item">
                            <img src="{{ asset($gallery->image_path) }}" alt="Gallery Image" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- RSVP & Guestbook Section -->
        <section class="rsvp-section section-padding" id="rsvp">
            <div class="container">
                <h2 class="section-title text-center" data-aos="zoom-in-up">RSVP & Ucapan</h2>
                
                <div class="rsvp-form-container" data-aos="zoom-in-up">
                    <form id="rsvp-form">
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Nama Anda" value="{{ $recipient }}" required>
                        </div>
                        <div class="form-group">
                            <select id="status" name="status" required>
                                <option value="" disabled selected>Konfirmasi Kehadiran</option>
                                <option value="hadir">Hadir</option>
                                <option value="tidak_hadir">Tidak Hadir</option>
                                <option value="ragu">Masih Ragu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" rows="4" placeholder="Tulis ucapan & doa" required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Kirim Ucapan</button>
                        <div id="form-msg"></div>
                    </form>
                </div>

                <div class="guestbook-container" data-aos="zoom-in-up">
                    <h3 class="guestbook-title">{{ count($wishes) }} Ucapan</h3>
                    <div class="wishes-list" id="wishes-list">
                        @foreach($wishes as $wish)
                        <div class="wish-card">
                            <div class="wish-header">
                                <strong>{{ $wish->name }}</strong>
                                @if($wish->status == 'hadir')
                                    <span class="badge badge-hadir">Hadir</span>
                                @elseif($wish->status == 'tidak_hadir')
                                    <span class="badge badge-tidak">Tidak Hadir</span>
                                @else
                                    <span class="badge badge-ragu">Masih Ragu</span>
                                @endif
                            </div>
                            <p class="wish-message">{{ $wish->message }}</p>
                            <small class="wish-time">{{ $wish->created_at->diffForHumans() }}</small>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Digital Gift Section -->
        <section class="gift-section section-padding text-center" id="gift">
            <div class="container">
                <h2 class="section-title" data-aos="zoom-in-up">Kado Digital</h2>
                <p data-aos="zoom-in-up">Bagi bapak/ibu/saudara/i yang ingin memberikan tanda kasih, dapat melalui nomor rekening di bawah ini:</p>
                
                <div class="banks-wrapper" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <div class="bank-card" data-aos="zoom-in-up" data-aos-delay="200" style="margin-top: 30px; margin-left: auto; margin-right: auto; flex: 1; min-width: 280px; max-width: 400px;">
                        <h3>{{ $settings->bank_name ?? 'BCA' }}</h3>
                        <p class="account-number" id="rek-1">{{ $settings->bank_account ?? '1234567890' }}</p>
                        <p>{{ $settings->bank_account_name ?? 'a.n. Candra Wijaya' }}</p>
                        <button class="btn-copy" onclick="copyToClipboard('rek-1', this)">Salin Rekening</button>
                    </div>

                    @if($settings && $settings->bank_name_2 && $settings->bank_account_2)
                    <div class="bank-card" data-aos="zoom-in-up" data-aos-delay="400" style="margin-top: 30px; margin-left: auto; margin-right: auto; flex: 1; min-width: 280px; max-width: 400px;">
                        <h3>{{ $settings->bank_name_2 }}</h3>
                        <p class="account-number" id="rek-2">{{ $settings->bank_account_2 }}</p>
                        <p>{{ $settings->bank_account_name_2 }}</p>
                        <button class="btn-copy" onclick="copyToClipboard('rek-2', this)">Salin Rekening</button>
                    </div>
                    @endif
                </div>
            </div>
        </section>

        <footer class="footer text-center">
            <p>Made with &hearts; for {{ $settings->bride_name ?? 'Anisa' }} & {{ $settings->groom_name ?? 'Candra' }}</p>
        </footer>
    </div>

    <!-- Music Player -->
    <div id="music-player" class="music-player playing">
        <div class="disc"></div>
    </div>
    
    <!-- Audio Element -->
    <audio id="bg-audio" loop>
        <!-- A standard copyright free romantic song for demo -->
        <source src="{{ ($settings && $settings->bg_music) ? asset($settings->bg_music) : 'https://assets.mixkit.co/music/preview/mixkit-beautiful-dream-493.mp3' }}" type="audio/mp3">
    </audio>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
