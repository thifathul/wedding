document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS Animation
    AOS.init({
        duration: 1000,
        once: true,
        offset: 50
    });

    const openBtn = document.getElementById('open-btn');
    const coverSection = document.getElementById('cover');
    const mainContent = document.getElementById('main-content');
    const bgAudio = document.getElementById('bg-audio');
    const musicPlayer = document.getElementById('music-player');
    const bgVideo = document.getElementById('bg-video');

    // Open Invitation
    openBtn.addEventListener('click', function() {
        coverSection.style.transform = 'translateY(-100%)';
        coverSection.style.opacity = '0';
        
        setTimeout(() => {
            coverSection.style.display = 'none';
            mainContent.style.display = 'block';
            musicPlayer.style.display = 'flex';
            
            // Re-init AOS to trigger animations in main content
            AOS.refresh();
            
            // Play Audio
            bgAudio.play().catch(e => console.log("Audio autoplay prevented"));

            // Ensure video plays when invitation is opened
            if (bgVideo) {
                bgVideo.play().catch(e => console.log("Video autoplay prevented"));
            }
        }, 1000);
    });



    // Music Player Toggle
    musicPlayer.addEventListener('click', function() {
        if (bgAudio.paused) {
            bgAudio.play();
            musicPlayer.classList.add('playing');
        } else {
            bgAudio.pause();
            musicPlayer.classList.remove('playing');
        }
    });

    // RSVP Form Submit
    const rsvpForm = document.getElementById('rsvp-form');
    const formMsg = document.getElementById('form-msg');

    rsvpForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = rsvpForm.querySelector('.btn-submit');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Mengirim...';

        const formData = new FormData(rsvpForm);
        const data = {
            name: formData.get('name'),
            status: formData.get('status'),
            message: formData.get('message'),
        };

        fetch('/rsvp', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                formMsg.textContent = data.message;
                formMsg.style.color = '#155724';
                rsvpForm.reset();
                
                // Add new message to the top of the list dynamically
                const wishesList = document.getElementById('wishes-list');
                const badgeClass = data.status === 'hadir' ? 'badge-hadir' : (data.status === 'tidak_hadir' ? 'badge-tidak' : 'badge-ragu');
                const badgeText = data.status === 'hadir' ? 'Hadir' : (data.status === 'tidak_hadir' ? 'Tidak Hadir' : 'Masih Ragu');
                
                // Quick hack for demo, normally we'd return the created object
                // Reloading page after 2 seconds to show the new wish properly
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            formMsg.textContent = 'Terjadi kesalahan, silakan coba lagi.';
            formMsg.style.color = '#721c24';
            submitBtn.disabled = false;
            submitBtn.textContent = 'Kirim Ucapan';
        });
    });
});

// Copy to Clipboard
function copyToClipboard(elementId, btnElement) {
    const textToCopy = document.getElementById(elementId).innerText;
    navigator.clipboard.writeText(textToCopy).then(() => {
        const originalText = btnElement.innerText;
        btnElement.innerText = 'Tersalin!';
        setTimeout(() => {
            btnElement.innerText = originalText;
        }, 2000);
    });
}
