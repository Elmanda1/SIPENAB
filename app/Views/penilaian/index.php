<?php # Halaman daftar penilaian mahasiswa ?>
<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">
            Matriks Penilaian</h1>
        <p style="color: var(--muted);">Pemantauan Evaluasi dan Skor Kandidat</p>
    </div>
    <div style="display: flex; gap: 1rem; align-items: center;">
        <div style="position: relative; min-width: 300px;">
            <i class="ti ti-search"
                style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--muted); pointer-events: none;"></i>
            <input type="text" id="liveSearchInput" placeholder="Cari Nama, NIM, atau Email..." class="form-control"
                value="<?= esc($search ?? '') ?>"
                style="padding: 0.6rem 1rem 0.6rem 2.8rem; border-radius: 12px; width: 100%; background: var(--glass); border: 1px solid var(--border); color: var(--text);">
        </div>
        <form method="get" action="<?= current_url() ?>" id="limitForm"
            style="display: flex; align-items: center; gap: 0.5rem;">
            <label style="font-weight: 600; font-size: 0.9rem; color: var(--muted);">Tampilkan</label>
            <select name="limit" onchange="this.form.submit()" class="form-control"
                style="min-width: 80px; padding: 0.4rem 1rem; height: auto;">
                <option value="25" <?= isset($perPage) && $perPage === 25 ? 'selected' : '' ?>>25</option>
                <option value="50" <?= isset($perPage) && $perPage === 50 ? 'selected' : '' ?>>50</option>
                <option value="100" <?= isset($perPage) && $perPage === 100 ? 'selected' : '' ?>>100</option>
            </select>
        </form>
    </div>
</div>

<div class="bento-dashboard">
    <div class="bento-card glass-panel col-12 row-4 table-container" data-aos="fade-up" data-aos-delay="100">
        <div class="table-header">
            <h3><i class="ti ti-clipboard-data" style="color: var(--accent);"></i> Rekapitulasi Data Evaluasi</h3>
            <div style="font-size: 0.85rem; color: var(--muted);"><i class="ti ti-server"></i> Total Kandidat:
                <strong id="headerTotalCount"><?= $pager->getTotal() ?></strong>
            </div>
        </div>

        <div id="ajaxTableContainer">
            <?= view('penilaian/table_partial') ?>
        </div>
    </div>
</div>

<script>
    # Logika untuk inisialisasi elemen dan variabel setelah dokumen selesai dimuat
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('liveSearchInput');
        const container = document.getElementById('ajaxTableContainer');
        const headerTotal = document.getElementById('headerTotalCount');
        const limitSelect = document.querySelector('select[name="limit"]');
        let debounceTimer;

        # Logika untuk mendeteksi input pencarian dengan metode debounce
        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                performSearch();
            }, 300);
        });

        # Function yang berfungsi untuk mengambil data hasil pencarian secara asinkron(AJAX)
        async function performSearch() {
            const query = searchInput.value;
            const limit = limitSelect.value;
            const url = new URL(window.location.href);
            url.searchParams.set('search', query);
            url.searchParams.set('limit', limit);

            // Update URL without reloading
            window.history.replaceState({}, '', url);

            try {
                container.style.opacity = '0.5';
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) throw new Error('Network response was not ok');

                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.getElementById('ajaxTableContainer');

                if (newContent) {
                    container.innerHTML = newContent.innerHTML;

                    const newTotalElement = doc.getElementById('totalCountDisplay');
                    if (newTotalElement) {
                        const totalMatch = newTotalElement.innerText.match(/total\s+(\d+)/i);
                        if (totalMatch && totalMatch[1]) {
                            headerTotal.innerText = totalMatch[1];
                        }
                    }
                }
            } catch (error) {
                console.error('Search failed:', error);
            } finally {
                container.style.opacity = '1';
                if (typeof AOS !== 'undefined') AOS.refresh();
            }
        }
    });
</script>

<style>
    .bento-dashboard {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-auto-rows: minmax(100px, auto);
        gap: 1.5rem;
        padding-bottom: 4rem;
    }

    .bento-card {
        position: relative;
        border-radius: 32px;
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease;
        padding: 2rem;
        display: flex;
        flex-direction: column;
    }

    .col-12 {
        grid-column: span 12;
    }

    .table-container {
        padding: 0;
    }

    .table-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-header h3 {
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1rem 2rem;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }

    th {
        font-weight: 600;
        color: var(--muted);
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        background: rgba(0, 0, 0, 0.02);
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background: rgba(255, 255, 255, 0.02);
    }

    .score-col {
        font-family: 'JetBrains Mono', monospace;
        font-weight: 700;
    }

    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    /* Pagination Styling */
    .custom-pagination ul.pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 0.25rem;
    }

    .custom-pagination ul.pagination li a,
    .custom-pagination ul.pagination li span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 32px;
        height: 32px;
        padding: 0 0.5rem;
        border-radius: 8px;
        background: var(--glass);
        color: var(--text);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        border: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .custom-pagination ul.pagination li.active a,
    .custom-pagination ul.pagination li.active span {
        background: var(--accent);
        color: #fff;
        border-color: var(--accent);
    }

    .custom-pagination ul.pagination li a:hover {
        background: var(--surface2);
        border-color: var(--accent);
    }
</style>
<?= $this->endSection() ?>