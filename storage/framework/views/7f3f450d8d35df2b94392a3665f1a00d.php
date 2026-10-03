

<?php $__env->startSection('title', 'Scan QR'); ?>

<?php $__env->startSection('content'); ?>

<div class="scanner-page">

    

    <div class="scanner-header">

        <div class="eyebrow">
            <span></span>
            QR ATTENDANCE SYSTEM
        </div>

        <h1>Scan Presensi</h1>

        <p>
            Upload gambar QR Code untuk mencatat kehadiran mahasiswa.
        </p>

    </div>


    

    <div class="scanner-grid">


        

        <div class="scanner-card primary-card">

            <div class="card-top">

                <div class="card-icon">
                    ↑
                </div>

                <div>

                    <h2>Upload QR Code</h2>

                    <p>
                        Metode utama
                    </p>

                </div>

            </div>


            <div
                class="upload-area"
                id="uploadArea">

                <div class="upload-icon">
                    ↑
                </div>

                <h3>
                    Pilih gambar QR Code
                </h3>

                <p>
                    JPG, PNG, WEBP
                </p>

                <label
                    for="qrFile"
                    class="upload-button">

                    Pilih File

                </label>

                <input
                    type="file"
                    id="qrFile"
                    accept="image/*"
                    hidden>

                <div
                    id="fileName"
                    class="file-name">
                </div>

            </div>


            <div
                id="uploadStatus"
                class="scanner-status hidden">
            </div>

        </div>


        

        <div class="scanner-card camera-card">

            <div class="card-top">

                <div class="card-icon camera">
                    📷
                </div>

                <div>

                    <h2>Kamera</h2>

                    <p>
                        Opsi kedua
                    </p>

                </div>

            </div>


            <div class="camera-area">

                <div
                    id="reader">
                </div>

                <div
                    id="cameraPlaceholder">

                    <div class="camera-placeholder-icon">
                        📷
                    </div>

                    <h3>
                        Kamera belum digunakan
                    </h3>

                    <p>
                        Gunakan kamera jika diperlukan.
                    </p>

                </div>

            </div>


            <button
                type="button"
                id="cameraButton"
                class="camera-button">

                📷 Aktifkan Kamera

            </button>

        </div>

    </div>


    

    <div
        id="resultCard"
        class="result-card hidden">

        <div class="result-icon">
            ✓
        </div>

        <div>

            <span class="result-label">
                HASIL QR CODE
            </span>

            <strong id="resultText">
                -
            </strong>

        </div>

    </div>


    

    <div class="instruction-card">

        <div class="instruction-number">
            01
        </div>

        <div>

            <h3>
                Cara menggunakan
            </h3>

            <p>
                Pilih foto QR Code mahasiswa. Sistem akan membaca
                NIM secara otomatis dan mencatat presensi jika
                mahasiswa belum melakukan presensi hari ini.
            </p>

        </div>

    </div>

</div>


<?php $__env->startPush('styles'); ?>

<style>

    /* =========================
       PAGE
    ========================= */

    .scanner-page {
        max-width: 1100px;

        margin: 0 auto;

        padding: 15px 0 70px;
    }


    .scanner-header {
        margin-bottom: 30px;
    }


    .eyebrow {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        color: #22d3ee;

        font-size: 12px;

        font-weight: 800;

        letter-spacing: 2px;

        margin-bottom: 12px;
    }


    .eyebrow span {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        background: #22d3ee;

        box-shadow:
            0 0 12px #22d3ee;
    }


    .scanner-header h1 {
        color: #f8fafc;

        font-size: 38px;

        margin-bottom: 8px;
    }


    .scanner-header p {
        color: #94a3b8;

        font-size: 15px;
    }


    /* =========================
       GRID
       ========================= */

    .scanner-grid {
        display: grid;

        grid-template-columns:
            1.15fr
            .85fr;

        gap: 20px;

        margin-bottom: 20px;
    }


    /* =========================
       CARD
       ========================= */

    .scanner-card {
        position: relative;

        background:
            linear-gradient(
                145deg,
                rgba(15,23,42,.95),
                rgba(2,6,23,.95)
            );

        border: 1px solid rgba(148,163,184,.12);

        border-radius: 18px;

        padding: 24px;

        box-shadow:
            0 15px 45px rgba(0,0,0,.2);

        overflow: hidden;
    }


    .primary-card {
        border-color:
            rgba(34,211,238,.15);
    }


    .card-top {
        display: flex;

        align-items: center;

        gap: 13px;

        margin-bottom: 22px;
    }


    .card-icon {
        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background:
            rgba(34,211,238,.1);

        color: #22d3ee;

        font-size: 22px;

        font-weight: 900;
    }


    .card-icon.camera {
        background:
            rgba(168,85,247,.1);

        color: #c084fc;
    }


    .card-top h2 {
        color: #f8fafc;

        font-size: 18px;

        margin-bottom: 4px;
    }


    .card-top p {
        color: #64748b;

        font-size: 12px;
    }


    /* =========================
       UPLOAD
       ========================= */

    .upload-area {
        min-height: 310px;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        text-align: center;

        padding: 30px;

        border: 1px dashed
            rgba(34,211,238,.3);

        border-radius: 15px;

        background:
            rgba(34,211,238,.025);

        transition: .2s;
    }


    .upload-area:hover,
    .upload-area.dragover {
        border-color: #22d3ee;

        background:
            rgba(34,211,238,.05);

        box-shadow:
            inset 0 0 30px
            rgba(34,211,238,.03);
    }


    .upload-icon {
        width: 70px;
        height: 70px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin-bottom: 17px;

        border-radius: 20px;

        background:
            rgba(34,211,238,.08);

        color: #22d3ee;

        font-size: 35px;

        font-weight: 900;

        box-shadow:
            0 0 30px
            rgba(34,211,238,.08);
    }


    .upload-area h3 {
        color: #f8fafc;

        font-size: 17px;

        margin-bottom: 7px;
    }


    .upload-area p {
        color: #64748b;

        font-size: 13px;

        margin-bottom: 20px;
    }


    .upload-button {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        padding: 11px 20px;

        border-radius: 9px;

        background: #22d3ee;

        color: #06111f;

        font-size: 13px;

        font-weight: 800;

        cursor: pointer;

        transition: .2s;
    }


    .upload-button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 0 25px
            rgba(34,211,238,.35);
    }


    .file-name {
        color: #22d3ee;

        font-size: 12px;

        margin-top: 15px;

        max-width: 100%;

        overflow: hidden;

        text-overflow: ellipsis;

        white-space: nowrap;
    }


    /* =========================
       CAMERA
       ========================= */

    .camera-area {
        position: relative;

        min-height: 310px;

        display: flex;

        align-items: center;
        justify-content: center;

        overflow: hidden;

        border-radius: 15px;

        background: #020617;

        border: 1px solid
            rgba(148,163,184,.1);
    }


    #reader {
        width: 100%;

        min-height: 310px;

        display: none;
    }


    #reader video {
        width: 100% !important;

        height: 310px !important;

        object-fit: cover;
    }


    #cameraPlaceholder {
        text-align: center;

        padding: 30px;
    }


    .camera-placeholder-icon {
        font-size: 42px;

        margin-bottom: 12px;

        opacity: .7;
    }


    #cameraPlaceholder h3 {
        color: #cbd5e1;

        font-size: 15px;

        margin-bottom: 7px;
    }


    #cameraPlaceholder p {
        color: #64748b;

        font-size: 12px;
    }


    .camera-button {
        width: 100%;

        margin-top: 14px;

        padding: 11px;

        border-radius: 9px;

        border: 1px solid
            rgba(168,85,247,.2);

        background:
            rgba(168,85,247,.08);

        color: #c084fc;

        font-weight: 800;

        cursor: pointer;

        transition: .2s;
    }


    .camera-button:hover {
        background:
            rgba(168,85,247,.14);

        box-shadow:
            0 0 20px
            rgba(168,85,247,.12);
    }


    /* =========================
       STATUS
       ========================= */

    .scanner-status {
        margin-top: 15px;

        padding: 12px 14px;

        border-radius: 9px;

        font-size: 13px;

        font-weight: 700;
    }


    .scanner-status.success {
        background:
            rgba(34,197,94,.08);

        border: 1px solid
            rgba(34,197,94,.15);

        color: #4ade80;
    }


    .scanner-status.error {
        background:
            rgba(239,68,68,.08);

        border: 1px solid
            rgba(239,68,68,.15);

        color: #f87171;
    }


    /* =========================
       RESULT
       ========================= */

    .result-card {
        display: flex;

        align-items: center;

        gap: 15px;

        padding: 18px 20px;

        margin-bottom: 20px;

        border-radius: 14px;

        background:
            rgba(34,197,94,.06);

        border:
            1px solid
            rgba(34,197,94,.15);

        box-shadow:
            0 10px 30px
            rgba(0,0,0,.12);
    }


    .result-icon {
        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 12px;

        background:
            rgba(34,197,94,.1);

        color: #4ade80;

        font-size: 22px;

        font-weight: 900;
    }


    .result-label {
        display: block;

        color: #64748b;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 1.5px;

        margin-bottom: 4px;
    }


    #resultText {
        color: #4ade80;

        font-size: 15px;
    }


    /* =========================
       INSTRUCTION
       ========================= */

    .instruction-card {
        display: flex;

        align-items: flex-start;

        gap: 15px;

        padding: 20px;

        border-radius: 15px;

        background:
            rgba(15,23,42,.7);

        border:
            1px solid
            rgba(148,163,184,.08);
    }


    .instruction-number {
        color: #22d3ee;

        font-size: 12px;

        font-weight: 900;

        letter-spacing: 1px;
    }


    .instruction-card h3 {
        color: #e2e8f0;

        font-size: 14px;

        margin-bottom: 6px;
    }


    .instruction-card p {
        color: #64748b;

        font-size: 13px;

        line-height: 1.6;
    }


    .hidden {
        display: none !important;
    }


    /* =========================
       RESPONSIVE
       ========================= */

    @media (max-width: 800px) {

        .scanner-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 600px) {

        .scanner-header h1 {
            font-size: 30px;
        }


        .scanner-card {
            padding: 18px;
        }


        .upload-area,
        .camera-area {
            min-height: 270px;
        }

    }

</style>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>


<script src="https://unpkg.com/html5-qrcode"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const fileInput =
        document.getElementById('qrFile');

    const uploadArea =
        document.getElementById('uploadArea');

    const fileName =
        document.getElementById('fileName');

    const uploadStatus =
        document.getElementById('uploadStatus');

    const resultCard =
        document.getElementById('resultCard');

    const resultText =
        document.getElementById('resultText');

    const cameraButton =
        document.getElementById('cameraButton');

    const reader =
        document.getElementById('reader');

    const cameraPlaceholder =
        document.getElementById('cameraPlaceholder');


    /*
     * ==========================
     * FILE UPLOAD
     * ==========================
     */

    fileInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }


        fileName.textContent =
            file.name;


        uploadStatus.className =
            'scanner-status success';

        uploadStatus.textContent =
            'Membaca QR Code...';


        readQRCodeFromFile(file);

    });


    /*
     * ==========================
     * DRAG & DROP
     * ==========================
     */

    uploadArea.addEventListener(
        'dragover',
        function (event) {

            event.preventDefault();

            uploadArea.classList.add(
                'dragover'
            );

        }
    );


    uploadArea.addEventListener(
        'dragleave',
        function () {

            uploadArea.classList.remove(
                'dragover'
            );

        }
    );


    uploadArea.addEventListener(
        'drop',
        function (event) {

            event.preventDefault();

            uploadArea.classList.remove(
                'dragover'
            );


            const file =
                event.dataTransfer.files[0];


            if (!file) {
                return;
            }


            fileInput.files =
                event.dataTransfer.files;


            fileName.textContent =
                file.name;


            uploadStatus.className =
                'scanner-status success';

            uploadStatus.textContent =
                'Membaca QR Code...';


            readQRCodeFromFile(file);

        }
    );


    /*
     * ==========================
     * READ QR FROM FILE
     * ==========================
     */

    function readQRCodeFromFile(file) {

        const scanner =
            new Html5Qrcode(
                'qr-reader-hidden'
            );


        scanner.scanFile(
            file,
            true
        )
        .then(function (decodedText) {

            scanner.clear();

            handleQRCode(
                decodedText
            );

        })
        .catch(function () {

            scanner.clear();

            uploadStatus.className =
                'scanner-status error';

            uploadStatus.textContent =
                '❌ QR Code tidak terbaca. Pastikan gambar QR terlihat jelas.';

        });

    }


    /*
     * ==========================
     * SEND QR TO SERVER
     * ==========================
     */

    function handleQRCode(data) {

        resultCard.classList.remove(
            'hidden'
        );


        resultText.textContent =
            'QR Code terbaca: ' + data;


        uploadStatus.className =
            'scanner-status success';

        uploadStatus.textContent =
            'QR berhasil dibaca. Mengirim data ke server...';


        fetch(
            "<?php echo e(route('scanner.presensi')); ?>",
            {
                method: 'POST',

                headers: {

                    'Content-Type':
                        'application/json',

                    'Accept':
                        'application/json',

                    'X-CSRF-TOKEN':
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        )?.getAttribute('content')

                },

                body: JSON.stringify({
                    nim: data
                })

            }
        )
        .then(function (response) {

            return response.json();

        })
        .then(function (result) {

            if (result.success) {

                uploadStatus.className =
                    'scanner-status success';

                uploadStatus.textContent =
                    '✅ ' + result.message;


                resultText.textContent =
                    result.data.nama +
                    ' — Presensi berhasil dicatat.';

            } else {

                uploadStatus.className =
                    'scanner-status error';

                uploadStatus.textContent =
                    '❌ ' + result.message;

            }

        })
        .catch(function () {

            uploadStatus.className =
                'scanner-status error';

            uploadStatus.textContent =
                '❌ Gagal terhubung ke server.';

        });

    }


    /*
     * ==========================
     * CAMERA
     * ==========================
     */

    let cameraScanner = null;

    let cameraRunning = false;


    cameraButton.addEventListener(
        'click',
        function () {

            if (cameraRunning) {

                stopCamera();

                return;

            }


            reader.style.display =
                'block';

            cameraPlaceholder.style.display =
                'none';


            cameraScanner =
                new Html5Qrcode(
                    'reader'
                );


            cameraScanner.start(

                {
                    facingMode: 'environment'
                },

                {
                    fps: 10,

                    qrbox: {
                        width: 220,
                        height: 220
                    }

                },

                function (decodedText) {

                    handleQRCode(
                        decodedText
                    );

                    stopCamera();

                },

                function () {

                    // QR belum terbaca.
                    // Tidak perlu menampilkan error
                    // setiap frame.

                }

            )
            .then(function () {

                cameraRunning = true;

                cameraButton.textContent =
                    '⏹ Matikan Kamera';

            })
            .catch(function () {

                reader.style.display =
                    'none';

                cameraPlaceholder.style.display =
                    'block';

                uploadStatus.className =
                    'scanner-status error';

                uploadStatus.textContent =
                    '❌ Kamera tidak dapat digunakan.';

            });

        }
    );


    function stopCamera() {

        if (
            cameraScanner &&
            cameraRunning
        ) {

            cameraScanner.stop()
                .then(function () {

                    cameraScanner.clear();

                })
                .catch(function () {});

        }


        cameraRunning = false;


        reader.style.display =
            'none';

        cameraPlaceholder.style.display =
            'block';

        cameraButton.textContent =
            '📷 Aktifkan Kamera';

    }

});

</script>




<div
    id="qr-reader-hidden"
    style="
        width: 1px;
        height: 1px;
        overflow: hidden;
        position: absolute;
        left: -9999px;
        top: -9999px;
    ">
</div>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\presensi_qr\resources\views/scanner/index.blade.php ENDPATH**/ ?>