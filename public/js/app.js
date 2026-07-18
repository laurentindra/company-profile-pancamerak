document.addEventListener('DOMContentLoaded', () => {

    // --- MOBILE NAV TOGGLE ---
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', () => {
            navToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Close menu when a link is clicked
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navToggle.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }

    // --- FLEET GALLERY FILTERING ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const fleetCards = document.querySelectorAll('.fleet-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Toggle active class in buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            fleetCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filterValue === 'all' || category === filterValue) {
                    card.style.display = 'flex';
                    // Animation delay simulation
                    card.style.opacity = '0';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transition = 'opacity 0.3s ease-in-out';
                    }, 50);
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // --- SCHEDULE SEARCH SUBMISSION (AJAX) ---
    const searchForm = document.getElementById('search-schedule-form');
    const searchResults = document.getElementById('search-results');
    const resultsList = document.getElementById('results-list');
    const resultsMeta = document.getElementById('results-meta');

    if (searchForm) {
        searchForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const origin = document.getElementById('origin').value;
            const destination = document.getElementById('destination').value;
            const date = document.getElementById('travel_date').value;

            // Fetch request parameters
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Show loading placeholder
            resultsList.innerHTML = `
                <div style="text-align: center; padding: 40px; color: var(--text-light-muted);">
                    <svg style="animation: spin 1s linear infinite; margin-bottom: 12px; color: var(--accent-cyan);" viewBox="0 0 24 24" width="36" height="36" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 1 10 10"/></svg>
                    <p>Mencari jadwal pelayaran terbaik untuk Anda...</p>
                </div>
            `;
            searchResults.style.display = 'block';
            
            // Scroll to results
            searchResults.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            fetch('/search-schedule', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ origin, destination, date })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const schedules = data.schedules;
                    
                    if (schedules.length === 0) {
                        resultsMeta.textContent = `Rute: ${origin} ke ${destination}`;
                        resultsList.innerHTML = `
                            <div class="no-results-box">
                                <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                <h4>Jadwal Pelayaran Tidak Ditemukan</h4>
                                <p>Maaf, tidak ada jadwal pelayaran langsung rute ${origin} ke ${destination} ${data.day_searched ? `pada hari ` + data.day_searched : 'pada tanggal tersebut'}.</p>
                            </div>
                        `;
                    } else {
                        resultsMeta.textContent = `Ditemukan ${schedules.length} jadwal keberangkatan untuk rute ${origin} ke ${destination}`;
                        let htmlContent = '';
                        
                        schedules.forEach(sched => {
                            const formattedVip = formatIDR(sched.price_vip);
                            const formattedEco = formatIDR(sched.price_economy);
                            const formattedVeh = sched.price_vehicle ? formatIDR(sched.price_vehicle) : 'Tidak Melayani';
                            
                            htmlContent += `
                                <div class="schedule-result-card">
                                    <div class="result-ship-info">
                                        <h4>${sched.ship.name}</h4>
                                        <span>Kapal Penumpang</span>
                                    </div>
                                    <div class="result-time-block">
                                        <span class="time-label">Keberangkatan</span>
                                        <span class="time-val">${sched.departure_time}</span>
                                        <span class="day-val">Hari: ${sched.days_of_week}</span>
                                    </div>
                                    <div class="result-time-block">
                                        <span class="time-label">Tiba di Tujuan</span>
                                        <span class="time-val">${sched.arrival_time}</span>
                                        <span class="day-val">Pelabuhan: ${sched.destination_port}</span>
                                    </div>
                                    <div>
                                        <span class="time-label">Simulasi Tarif Penumpang & Roda 4</span>
                                        <table class="result-price-table">
                                            <tr>
                                                <td>Kelas VIP:</td>
                                                <td>${formattedVip}</td>
                                            </tr>
                                            <tr>
                                                <td>Kelas Ekonomi:</td>
                                                <td>${formattedEco}</td>
                                            </tr>
                                            <tr>
                                                <td>Kendaraan (Mobil):</td>
                                                <td>${formattedVeh}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            `;
                        });
                        
                        resultsList.innerHTML = htmlContent;
                    }
                }
            })
            .catch(error => {
                console.error('Error fetching schedules:', error);
                resultsList.innerHTML = `
                    <div class="no-results-box">
                        <h4>Terjadi Kesalahan Sistem</h4>
                        <p>Gagal memuat jadwal pelayaran. Silakan coba beberapa saat lagi.</p>
                    </div>
                `;
            });
        });
    }

    // Currency Formatter Helper
    function formatIDR(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    }

    // --- CONTACT & CHARTER INQUIRY FORM SIMULATION ---
    const contactForms = document.querySelectorAll('#contact-form');
    contactForms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = form.querySelector('#c_name').value;
            const interest = form.querySelector('#c_interest').value;
            
            let messageText = "Permintaan informasi Anda";
            if (interest === "sewa_tongkang") {
                messageText = "Penyewaan armada kapal tunda / tongkang batubara";
            } else if (interest === "tiket_reguler") {
                messageText = "Simulasi pemesanan tiket pelayaran penumpang";
            } else if (interest === "keagenan") {
                messageText = "Pertanyaan layanan keagenan perkapalan (port agency)";
            }
            
            alert(`Terima kasih Bapak/Ibu ${name}.\n${messageText} telah kami terima secara lokal di server.\nTim Keagenan PT PANCA MERAK SAMUDERA akan segera memproses detail Anda.`);
            form.reset();
        });
    });
});

// --- VISION/MISSION TABS ---
window.switchVisionTab = function(evt, tabName) {
    const tabContents = document.querySelectorAll('.v-tab-content');
    const tabButtons = document.querySelectorAll('.v-tab-btn');

    tabContents.forEach(content => content.classList.remove('active'));
    tabButtons.forEach(btn => btn.classList.remove('active'));

    const activeContent = document.getElementById(tabName);
    if (activeContent) {
        activeContent.classList.add('active');
    }
    if (evt && evt.currentTarget) {
        evt.currentTarget.classList.add('active');
    }
};
