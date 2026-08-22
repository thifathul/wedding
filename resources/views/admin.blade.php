<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Undangan</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/flower.svg') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; padding: 20px; color: #333; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { margin-top: 0; color: #2c3e50; text-align: center; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-bottom: 30px; }
        .form-group { margin-bottom: 25px; }
        label { display: block; font-weight: 600; margin-bottom: 8px; color: #34495e; }
        input[type="file"], input[type="text"], textarea { display: block; width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background: #fafafa; font-family: inherit; }
        textarea { resize: vertical; }
        .current-media { margin-top: 10px; font-size: 0.9em; color: #7f8c8d; }
        .current-media img { max-width: 150px; border-radius: 4px; display: block; margin-top: 5px; border: 1px solid #eee; }
        .current-media video { max-width: 200px; border-radius: 4px; display: block; margin-top: 5px; border: 1px solid #eee; }
        .btn-submit { background-color: #3498db; color: #fff; padding: 12px 25px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; width: 100%; font-weight: bold; transition: background 0.3s; }
        .btn-submit:hover { background-color: #2980b9; }
        .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; }
        .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
        .alert-danger { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
        .back-link { display: inline-block; margin-bottom: 20px; color: #3498db; text-decoration: none; font-weight: bold; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ url('/') }}" class="back-link">&larr; Kembali ke Undangan</a>
    <h1>Pengaturan Media Undangan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin:0; padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="cover_image">Foto Sampul (Cover Kanan / Mobile - JPG/PNG/WEBP)</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*">
            @if($settings && $settings->cover_image)
                <div class="current-media">
                    Media saat ini:
                    <img src="{{ asset($settings->cover_image) }}" alt="Cover">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="desktop_bg_image">Foto Latar Kiri (Desktop - JPG/PNG/WEBP)</label>
            <input type="file" name="desktop_bg_image" id="desktop_bg_image" accept="image/*">
            @if($settings && $settings->desktop_bg_image)
                <div class="current-media">
                    Media saat ini:
                    <img src="{{ asset($settings->desktop_bg_image) }}" alt="Desktop BG">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="bg_video">Video Background (MP4)</label>
            <input type="file" name="bg_video" id="bg_video" accept="video/mp4,video/x-m4v,video/*">
            @if($settings && $settings->bg_video)
                <div class="current-media">
                    Media saat ini:
                    <video src="{{ asset($settings->bg_video) }}" controls muted></video>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="bg_music">Musik Latar (Opsional, MP3/WAV)</label>
            <input type="file" name="bg_music" id="bg_music" accept="audio/mpeg,audio/wav,audio/ogg">
            @if($settings && $settings->bg_music)
                <div class="current-media">
                    Musik saat ini sudah terpasang.
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="groom_image">Foto Mempelai Pria (JPG/PNG/WEBP)</label>
            <input type="file" name="groom_image" id="groom_image" accept="image/*">
            @if($settings && $settings->groom_image)
                <div class="current-media">
                    Media saat ini:
                    <img src="{{ asset($settings->groom_image) }}" alt="Groom">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="bride_image">Foto Mempelai Wanita (JPG/PNG/WEBP)</label>
            <input type="file" name="bride_image" id="bride_image" accept="image/*">
            @if($settings && $settings->bride_image)
                <div class="current-media">
                    Media saat ini:
                    <img src="{{ asset($settings->bride_image) }}" alt="Bride">
                </div>
            @endif
        </div>

        <hr style="margin: 40px 0; border: none; border-top: 1px solid #ddd;">
        <h2>Data Mempelai</h2>

        <div class="form-group">
            <label for="groom_name">Nama Panggilan Pria</label>
            <input type="text" name="groom_name" id="groom_name" value="{{ old('groom_name', $settings->groom_name ?? 'Candra') }}">
        </div>
        <div class="form-group">
            <label for="groom_fullname">Nama Lengkap Pria</label>
            <input type="text" name="groom_fullname" id="groom_fullname" value="{{ old('groom_fullname', $settings->groom_fullname ?? 'Candra Wijaya, S.T.') }}">
        </div>
        <div class="form-group">
            <label for="groom_parents">Nama Orang Tua Pria</label>
            <input type="text" name="groom_parents" id="groom_parents" value="{{ old('groom_parents', $settings->groom_parents ?? 'Putra dari Bapak Fulan & Ibu Fulanah') }}">
        </div>
        <div class="form-group">
            <label for="groom_ig">Link Instagram Pria (Opsional, misal: https://instagram.com/username)</label>
            <input type="text" name="groom_ig" id="groom_ig" value="{{ old('groom_ig', $settings->groom_ig ?? '') }}">
        </div>

        <div class="form-group">
            <label for="bride_name">Nama Panggilan Wanita</label>
            <input type="text" name="bride_name" id="bride_name" value="{{ old('bride_name', $settings->bride_name ?? 'Anisa') }}">
        </div>
        <div class="form-group">
            <label for="bride_fullname">Nama Lengkap Wanita</label>
            <input type="text" name="bride_fullname" id="bride_fullname" value="{{ old('bride_fullname', $settings->bride_fullname ?? 'Anisa Putri, S.E.') }}">
        </div>
        <div class="form-group">
            <label for="bride_parents">Nama Orang Tua Wanita</label>
            <input type="text" name="bride_parents" id="bride_parents" value="{{ old('bride_parents', $settings->bride_parents ?? 'Putri dari Bapak Fulan & Ibu Fulanah') }}">
        </div>
        <div class="form-group">
            <label for="bride_ig">Link Instagram Wanita (Opsional, misal: https://instagram.com/username)</label>
            <input type="text" name="bride_ig" id="bride_ig" value="{{ old('bride_ig', $settings->bride_ig ?? '') }}">
        </div>

        <hr style="margin: 40px 0; border: none; border-top: 1px solid #ddd;">
        <h2>Data Acara</h2>

        <div class="form-group">
            <label for="wedding_date">Tanggal Pernikahan (Tampil di Cover)</label>
            <input type="text" name="wedding_date" id="wedding_date" value="{{ old('wedding_date', $settings->wedding_date ?? '07 . 06 . 2026') }}">
        </div>

        <div class="form-group">
            <label for="akad_date">Tanggal Akad Nikah</label>
            <input type="text" name="akad_date" id="akad_date" value="{{ old('akad_date', $settings->akad_date ?? 'Minggu, 07 Juni 2026') }}">
        </div>
        <div class="form-group">
            <label for="akad_time">Waktu Akad Nikah</label>
            <input type="text" name="akad_time" id="akad_time" value="{{ old('akad_time', $settings->akad_time ?? '08.00 WIB - Selesai') }}">
        </div>

        <div class="form-group">
            <label for="resepsi_date">Tanggal Resepsi</label>
            <input type="text" name="resepsi_date" id="resepsi_date" value="{{ old('resepsi_date', $settings->resepsi_date ?? 'Minggu, 07 Juni 2026') }}">
        </div>
        <div class="form-group">
            <label for="resepsi_time">Waktu Resepsi</label>
            <input type="text" name="resepsi_time" id="resepsi_time" value="{{ old('resepsi_time', $settings->resepsi_time ?? '11.00 - 14.00 WIB') }}">
        </div>
        <div class="form-group">
            <label for="resepsi_location">Lokasi Resepsi</label>
            <textarea name="resepsi_location" id="resepsi_location" rows="3">{{ old('resepsi_location', $settings->resepsi_location ?? "Gedung Serbaguna\nJl. Contoh Alamat No. 123, Kota Bandung") }}</textarea>
        </div>
        <div class="form-group">
            <label for="location_link">Link Lokasi (Google Maps, untuk tombol Lihat Lokasi)</label>
            <input type="text" name="location_link" id="location_link" value="{{ old('location_link', $settings->location_link ?? '') }}" placeholder="https://maps.app.goo.gl/...">
        </div>

        <hr style="margin: 40px 0; border: none; border-top: 1px solid #ddd;">
        <h2>Kado Digital (Rekening)</h2>

        <div class="form-group">
            <label for="bank_name">Nama Bank 1 (misal: BCA, Mandiri)</label>
            <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $settings->bank_name ?? 'BCA') }}">
        </div>
        <div class="form-group">
            <label for="bank_account">Nomor Rekening 1</label>
            <input type="text" name="bank_account" id="bank_account" value="{{ old('bank_account', $settings->bank_account ?? '1234567890') }}">
        </div>
        <div class="form-group">
            <label for="bank_account_name">Atas Nama Rekening 1</label>
            <input type="text" name="bank_account_name" id="bank_account_name" value="{{ old('bank_account_name', $settings->bank_account_name ?? 'a.n. Candra Wijaya') }}">
        </div>

        <hr style="margin: 20px 0; border: none; border-top: 1px dashed #ddd;">

        <div class="form-group">
            <label for="bank_name_2">Nama Bank 2 (Opsional)</label>
            <input type="text" name="bank_name_2" id="bank_name_2" value="{{ old('bank_name_2', $settings->bank_name_2 ?? '') }}">
        </div>
        <div class="form-group">
            <label for="bank_account_2">Nomor Rekening 2</label>
            <input type="text" name="bank_account_2" id="bank_account_2" value="{{ old('bank_account_2', $settings->bank_account_2 ?? '') }}">
        </div>
        <div class="form-group">
            <label for="bank_account_name_2">Atas Nama Rekening 2</label>
            <input type="text" name="bank_account_name_2" id="bank_account_name_2" value="{{ old('bank_account_name_2', $settings->bank_account_name_2 ?? '') }}">
        </div>

        <hr style="margin: 20px 0; border: none; border-top: 1px dashed #ddd;">

        <div class="form-group">
            <label for="gift_address">Alamat Pengiriman Kado Fisik (Opsional)</label>
            <textarea name="gift_address" id="gift_address" rows="3" placeholder="Contoh: Jl. Merdeka No. 123, RT/RW 01/02, Kel. ABC, Kec. DEF, Kota/Kab. GHI">{{ old('gift_address', $settings->gift_address ?? '') }}</textarea>
        </div>

        <hr style="margin: 20px 0; border: none; border-top: 1px dashed #ddd;">
        
        <h2>Video Momen (YouTube)</h2>
        <div class="form-group">
            <label for="youtube_link">Link Embed YouTube (Opsional, misal: https://www.youtube.com/embed/xxxxx)</label>
            <input type="text" name="youtube_link" id="youtube_link" value="{{ old('youtube_link', $settings->youtube_link ?? '') }}" placeholder="https://www.youtube.com/embed/...">
        </div>

        <hr style="margin: 20px 0; border: none; border-top: 1px dashed #ddd;">
        
        <h2>Galeri Foto</h2>
        <div class="form-group">
            <label for="gallery_images">Tambah Foto Galeri (Bisa pilih banyak file sekaligus)</label>
            <input type="file" name="gallery_images[]" id="gallery_images" multiple accept="image/*">
            <small>Pilih beberapa foto dengan menahan tombol Ctrl/Shift saat memilih file.</small>
        </div>

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>

    <!-- Daftar Foto Galeri dengan Form Hapus Terpisah -->
    @if(isset($galleries) && $galleries->count() > 0)
        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">
        <h2>Foto Galeri Saat Ini</h2>
        <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 40px;">
            @foreach($galleries as $gallery)
                <div style="position: relative; width: 120px; height: 120px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
                    <img src="{{ asset($gallery->image_path) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST" style="position: absolute; top: 5px; right: 5px; margin: 0;">
                        @csrf
                        <button type="submit" onclick="return confirm('Hapus foto ini?')" style="background: rgba(255,0,0,0.8); color: white; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 14px;">&times;</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
</body>
</html>
