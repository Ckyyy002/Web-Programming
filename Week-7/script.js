document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Ambil elemen-elemen form
    const form = this;
    const btn = document.getElementById('submitBtn');
    const statusMsg = document.getElementById('statusMessage');
    const inputs = form.querySelectorAll('input, textarea');

    btn.innerHTML = 'Sending...';
    btn.disabled = true;
    statusMsg.innerText = 'Sending data to server...';

    inputs.forEach(input => input.disabled = true);

    setTimeout(function () {

        const isSuccess = true;

        if (isSuccess) {
            statusMsg.innerHTML = `<span class="text-success fw-bold">✔ Data berhasil dikirim!</span>`;
            form.reset();
        } else {
            statusMsg.innerHTML = `<span class="text-danger">❌ Gagal mengirim data.</span>`;
        }

        btn.innerHTML = 'Submit';
        btn.disabled = false;
        inputs.forEach(input => input.disabled = false);

    }, 2000);
});