document.addEventListener('DOMContentLoaded', () => {

  // Utilities
  const $ = sel => document.querySelector(sel);
  const $$ = sel => document.querySelectorAll(sel);

  // Year in footer
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  /* -------------------------
     CUSTOMER DATA (localStorage)
     ------------------------- */
  const STORAGE_KEY = 'travel_customers_v1';
  const loadCustomers = () => {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      return raw ? JSON.parse(raw) : [];
    } catch(e) { return []; }
  };
  const saveCustomers = (arr) => localStorage.setItem(STORAGE_KEY, JSON.stringify(arr));

  // Ubah warna header saat scroll
  window.addEventListener('scroll', () => {
  const navbar = document.querySelector('.navbar');
    if (window.scrollY > 80) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
  });

  // Elements
  const form = document.getElementById('customerForm');
  const tableBody = document.querySelector('#customerTable tbody');

  // Render table
  function renderTable(){
    if (!tableBody) return;
    const data = loadCustomers();
    tableBody.innerHTML = '';
    if (data.length === 0) {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td colspan="5" class="text-center text-muted">Belum ada data pelanggan.</td>`;
      tableBody.appendChild(tr);
      return;
    }
    data.forEach((c, idx) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${escapeHtml(c.name)}</td>
        <td>${escapeHtml(c.phone)}</td>
        <td>${escapeHtml(c.origin)} → ${escapeHtml(c.destination)}</td>
        <td>${escapeHtml(c.service)}</td>
        <td>
          <button class="btn btn-sm btn-danger btn-delete" data-idx="${idx}"><i class="bi bi-trash"></i></button>
        </td>
      `;
      tableBody.appendChild(tr);
    });
  }

  // Escape HTML
  function escapeHtml(str = '') {
    return String(str).replace(/[&<>"'`=\/]/g, function (s) {
      return ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;', '/': '&#x2F;', '`': '&#x60;', '=': '&#x3D;'
      })[s];
    });
  }

  // Add customer
  if (form) {
    // bootstrap validation
    form.addEventListener('submit', function(e){
      e.preventDefault();
      e.stopPropagation();
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }
      const customer = {
        name: document.getElementById('name').value.trim(),
        phone: document.getElementById('phone').value.trim(),
        origin: document.getElementById('origin').value.trim(),
        destination: document.getElementById('destination').value.trim(),
        service: document.getElementById('service').value
      };
      const arr = loadCustomers();
      arr.push(customer);
      saveCustomers(arr);
      renderTable();
      form.reset();
      form.classList.remove('was-validated');
      // small visual feedback
      if (window.bootstrap) {
        const toastEl = document.createElement('div');
        toastEl.className = 'toast align-items-center text-bg-success border-0 position-fixed bottom-0 end-0 m-3';
        toastEl.setAttribute('role','alert');
        toastEl.innerHTML = `<div class="d-flex"><div class="toast-body">Data tersimpan</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>`;
        document.body.appendChild(toastEl);
        const t = new bootstrap.Toast(toastEl);
        t.show();
        toastEl.addEventListener('hidden.bs.toast', () => toastEl.remove());
      }
    });
  }

  // Delete row
  if (tableBody) {
    tableBody.addEventListener('click', (e) => {
      const btn = e.target.closest('.btn-delete');
      if (!btn) return;
      const idx = parseInt(btn.getAttribute('data-idx'));
      if (isNaN(idx)) return;
      let arr = loadCustomers();
      arr.splice(idx, 1);
      saveCustomers(arr);
      renderTable();
    });
  }

  // Clear all
  const clearAllBtn = document.getElementById('clearAll');
  if (clearAllBtn) {
    clearAllBtn.addEventListener('click', () => {
      if (!confirm('Yakin ingin menghapus semua data pelanggan?')) return;
      localStorage.removeItem(STORAGE_KEY);
      renderTable();
    });
  }

  // Export CSV
  const exportBtn = document.getElementById('exportCsv');
  if (exportBtn) {
    exportBtn.addEventListener('click', () => {
      const data = loadCustomers();
      if (data.length === 0) {
        alert('Tidak ada data untuk diexport.');
        return;
      }
      const header = ['Nama','Telepon','Origin','Destination','Service'];
      const rows = data.map(r => [r.name, r.phone, r.origin, r.destination, r.service]);
      const csv = [header, ...rows].map(r => r.map(cell => `"${String(cell).replace(/"/g,'""')}"`).join(',')).join('\n');
      const blob = new Blob([csv], {type: 'text/csv'});
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'customers.csv';
      document.body.appendChild(a);
      a.click();
      a.remove();
      URL.revokeObjectURL(url);
    });
  }

  // Quick contact form (kontak.html)
  const qc = document.getElementById('quickContact');
  if (qc) {
    qc.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Terima kasih! Pesan akan kami tindak lanjuti.');
      qc.reset();
    });
  }

  // Initial render
  renderTable();

  // Small helper: mark active nav link based on current path
  (function markActiveNav(){
    const links = document.querySelectorAll('.navbar .nav-link');
    if (!links) return;
    const path = window.location.pathname.split('/').pop();
    links.forEach(a => {
      const href = a.getAttribute('href');
      if (href === path || (href === 'index.html' && (path === '' || path === 'index.html'))) {
        a.classList.add('active');
      }
    });
  })();

});
